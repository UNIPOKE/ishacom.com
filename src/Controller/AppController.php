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

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        $action = $this->request->action;
        if ($action === 'home') {
            $this->viewBuilder()->layout('default');
        } else {
            $this->viewBuilder()->layout('default_ishacom');
        }

        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        // $this->loadComponent('Security');
        // $this->loadComponent('Csrf');
    }

    public function beforeFilter(Event $event)
    {
      //...
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function ranking($results, $topic, $filter = null, $id = null)
    {
        $this->loadModel('News');
        $this->loadModel('Diseases');
        $this->loadModel('Categories');

        $array = array();
        if ($topic === 'news') $array = $this->News->find()->toArray();
        else if ($topic === 'disease') $array = $this->Diseases->find()->toArray();
        else if ($topic === 'category') $array = $this->Categories->find()->toArray();

      	$ranking = array();
      	$i = 0;
        foreach( $results as $result ){
      		$path = $result['url'];
      		if(strpos($path, $topic) !== false){
    				preg_match('/[0-9]+/', $path, $match);
            if($filter === null ||
              ($filter === 'category' && $array[$match[0] - 1]->category_id == $id) ||
              ($filter === 'disease'  && $array[$match[0] - 1]->disease_id  == $id)) {
              $ranking[$i] = $match[0];
      				$i++;
      				if( $i === 8) break;
            }
      		}
        }
      	return $ranking;
    }
}
