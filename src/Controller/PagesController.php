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
        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $paths = getRankingPaths($analytics, $profile);

        $this->loadModel('Categories');
        $this->loadModel('News');

        $categories = $this->Categories->find()->contain(['Diseases'])->toArray();
        $news = $this->News->find()->toArray();
        $newsRanking = $this->ranking($paths, $topic = 'news');

        $this->set(compact('categories', 'news','newsRanking'));
    }

    public function category($id = null)
    {
        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $paths = getRankingPaths($analytics, $profile);

        $this->loadModel('Categories');
        $this->loadModel('Diseases');

        $category = $this->Categories->get($id, [
          'contain' => ['Diseases', 'News']
        ]);
        $disease = $this->Diseases->find()->toArray();
        $diseaseRanking = $this->ranking($paths, $topic = 'disease', $filter = 'category_id', $id = $category->id, $n = 5);

        $this->set(compact('category', 'disease', 'diseaseRanking'));
        $this->set('_serialize', ['category']);
    }

    public function disease($id = null)
    {
        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $paths = getRankingPaths($analytics, $profile);

        $this->loadModel('Diseases');
        $this->loadModel('Categories');
        $this->loadModel('News');

        $disease = $this->Diseases->get($id, [
          'contain' => ['Categories', 'News']
        ]);
        $category = $this->Categories->find()->contain(['Diseases'])->toArray();
        $news = $this->News->find()->toArray();
        $newsRanking = $this->ranking($paths, $topic = 'news');
        $newsRankingD = $this->ranking($paths, $topic = 'news', $filter = 'disease_id', $id = $disease->id, $n = 2);

        $this->set(compact('disease', 'category', 'news', 'newsRanking', 'newsRankingD'));
        $this->set('_serialize', ['disease']);
    }

    public function news($id = null)
    {
        require_once '/home/cwfolgkn/public_html/ishacom.tech/staging/src/View/Helper/ga.php';
        $analytics = initializeAnalytics();
        $profile = getFirstProfileId($analytics);
        $paths = getRankingPaths($analytics, $profile);

        $this->loadModel('News');

        $news = $this->News->get($id, [
            'contain' => ['Categories']
        ]);
        $newsRand = $this->News->find()->where(['category_id' => $news->category_id])->order('rand()')->limit(4)->toArray();
        $newsRanking = $this->ranking($paths, $topic = 'news', $filter = 'category_id', $id = $news->category_id);

        $this->set(compact('news', 'newsRand', 'newsRanking'));
        $this->set('_serialize', ['news']);
    }
}
