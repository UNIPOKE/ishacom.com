<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\Event\Event;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

use App\Controller\AppController;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */

    public function display(...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

    public function index()
    {
        $this->loadModel('Categories');
        $this->loadModel('Departments');
        $this->loadModel('Doctors');
        $this->loadModel('News');
        $this->loadModel('Questions');

        $categories = $this->Categories->find()->contain(['Diseases'])->toArray();
        $departments = $this->Departments->find()->toArray();
        $doctors = $this->Doctors->find()->toArray();
        $news = $this->News->find()->toArray();
        $questions = $this->Questions->find()->toArray();

        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $results = getMonthlyRanking($analytics, $profile);
        $ranking_n = $this->ranking($results, 'news');

        $this->set(compact('categories', 'departments', 'doctors', 'news', 'questions', 'ranking_n'));
    }

    public function category($id = null)
    {
        $this->loadModel('Categories');
        $this->loadModel('Diseases');
        $category = $this->Categories->get($id, [
            'contain' => ['Diseases', 'News', 'Questions']
        ]);
        $disease = $this->Diseases->find()->toArray();

        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $results = getMonthlyRanking($analytics, $profile);
        $ranking_d_c = $this->ranking($results, 'disease', 'category', $category->id);

        $this->set(compact('category', 'disease', 'ranking_d_c'));
        $this->set('_serialize', ['category']);
    }

    public function disease($id = null)
    {
        $this->loadModel('Diseases');
        $this->loadModel('Categories');
        $this->loadModel('News');
        $disease = $this->Diseases->get($id, [
            'contain' => ['Categories', 'News', 'Questions']
        ]);
        $category = $this->Categories->find()->contain(['Diseases'])->toArray();
        $news = $this->News->find()->toArray();

        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $results = getMonthlyRanking($analytics, $profile);
        $ranking_n = $this->ranking($results, 'news');
        $ranking_n_d = $this->ranking($results, 'news', 'disease', $disease->id);

        $this->set(compact('disease', 'category', 'news', 'newsRand', 'ranking_n', 'ranking_n_d'));
        $this->set('_serialize', ['disease']);
    }

    public function news($id = null)
    {
        $this->loadModel('News');
        $news = $this->News->get($id, [
            'contain' => ['Categories']
        ]);
        $newsArray = $this->News->find()->toArray();
        $newsRand = $this->News->find()->where(['category_id' => $news->category_id])->order('rand()')->limit(8)->toArray();

        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $results = getMonthlyRanking($analytics, $profile);
        $ranking_n_c = $this->ranking($results, 'news', 'category', $news->category_id);

        $this->set(compact('news', 'newsArray', 'newsRand', 'ranking_n_c'));
        $this->set('_serialize', ['news']);
    }
}
