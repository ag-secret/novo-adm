<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    public $layout = 'MyAdm.default';
    
    public $appName = 'interagir';
    public $logoLink = [];

    public $helpers = [
        'Html' => [
            'className' => 'Bootstrap3.BootstrapHtml'
        ],
        'Form' => [
            'className' => 'Bootstrap3.BootstrapForm'
        ],
        'Modal' => [
            'className' => 'Bootstrap3.BootstrapModal'
        ]
    ];

    // public $sidemenuItems = [
    //     'Principal' => [
    //         [
    //             'text' => 'Artigos',
    //             'icon' => 'rss',
    //             'url' => ['controller' => 'Articles', 'action' => 'index', 'plugin' => false],
    //             'quickAdd' => true,
    //         ],
    //         [
    //             'text' => 'Tags',
    //             'icon' => 'tags',
    //             'quickAdd' => true,
    //             'url' => ['controller' => 'Tags', 'action' => 'index'],
    //         ]
    //     ],
    //     'Configurações Gerais' => [
    //         [
    //             'text' => 'Usuários do sistema',
    //             'icon' => 'user',
    //             'url' => ['controller' => 'Users', 'action' => 'index', 'plugin' => 'MyAdm', 'prefix' => false],
    //         ]
    //     ]
    // ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');

        $this->set([
            'appName' => $this->appName,
            'logoLink' => $this->logoLink,
            'sidemenuItems' => $this->sidemenuItems,
            'breadcrumb' => $this->breadcrumb
        ]);

        // $this->loadComponent('Auth', [
        //     'loginAction' => [
        //         'controller' => 'Users',
        //         'action' => 'login',
        //         'plugin' => 'MyAdm',
        //         'prefix' => false
        //     ],
        //     'authError' => 'Você não pode acessar esta área',
        //     'authenticate' => [
        //         'Form' => [
        //             'fields' => ['username' => 'email'],
        //             'scope' => [
        //                 'is_active' => 1
        //             ],
        //             'contain' => ['Permissions']
        //         ]
        //     ],
        //     'unauthorizedRedirect' => [
        //         'controller' => 'Errors',
        //         'action' => 'notAuthorized',
        //         'plugin' => 'MyAdm',
        //         'prefix' => false
        //     ],
        //     'authorize' => ['controller']
        // ]);

        // $this->Auth->allow(['add']);
        // if ($this->Auth->user()) {
        //     $this->set('loggedInUser', $this->Auth->user());
        // }
    }

    public function isAuthorized($user = null)
    {
        // if ($this->request->params['controller'] == 'Errors') {
        //     return true;
        // }

        // foreach ($user['permissions'] as $value) {
        //     if ($value['controller'] == $this->request->params['controller']) {
        //         return true;
        //     }
        // }
        // return false;
    }

}
