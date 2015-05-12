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
namespace App\Controller\Adm;

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
            'className' => 'Bootstrap3.BootstrapForm',
            'useCustomFileInput' => true
        ],
        'Modal' => [
            'className' => 'Bootstrap3.BootstrapModal'
        ]
    ];
    
    public $sidemenuItems = [
        'Principal' => [
            [
                'text' => 'Artigos',
                'icon' => 'rss',
                'url' => [
                    'controller' => 'Articles',
                    'action' => 'index',
                    'plugin' => false
                ],
                'quickAdd' => true,
            ]
        ],
        'Configurações Gerais' => [
            [
                'text' => 'Usuários do sistema',
                'icon' => 'user',
                'url' => [
                    'controller' => 'Users',
                    'action' => 'index',
                    'plugin' => 'MyAdm',
                    'prefix' => false
                ],
                'quickAdd' => false
            ]
        ]
    ];

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

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',
                'plugin' => 'MyAdm',
                'prefix' => false
            ],
            'authError' => 'Você não pode acessar esta área',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email'],
                    'scope' => [
                        'is_active' => 1
                    ],
                    'userModel' => 'MyAdm.Users',
                    'contain' => ['Permissions']
                ]
            ],
            'unauthorizedRedirect' => [
                'controller' => 'Errors',
                'action' => 'notAuthorized',
                'plugin' => 'MyAdm',
                'prefix' => false
            ],
            'authorize' => ['controller']
        ]);

        $this->Auth->allow(['add']);

        // Debug($this->Auth->user());
        // exit();
        if ($this->Auth->user()) {
            $this->set('loggedInUser', $this->Auth->user());
        }

        $this->_generateSidemenuClean();
        $this->set([
            'appName' => $this->appName,
            'logoLink' => $this->logoLink,
            'sidemenuItems' => $this->sidemenuItems,
            'sidemenuItemsClean' => $this->sidemenuItemsClean,
            'hasQuickAddMenu' => $this->_hasQuickAddMenu()
        ]);
    }

    public function _hasQuickAddMenu()
    {
        foreach ($this->sidemenuItemsClean as $key => $value) {
            foreach ($value as $key => $item) {
                if (isset($item['quickAdd']) && $item['quickAdd']) {
                    return true;
                }
            }
        }
        return false;
    }

    public function _generateSidemenuClean()
    {
        $sidemenuItems = $this->sidemenuItems;
        $permissions = [];
        if ($this->Auth->user()) {
            foreach ($this->Auth->user('permissions') as $key => $value) {
                $permissions[] = $value['controller'];
            }
        }

        $sidemenuItemsClean = $sidemenuItems;

        foreach ($sidemenuItemsClean as $key => $value) {
            foreach ($value as $keyItem => $item) {
                if (!in_array($item['url']['controller'], $permissions)) {
                    unset($sidemenuItemsClean[$key][$keyItem]);
                }
            }
        }

        foreach ($sidemenuItemsClean as $key => $value) {
            if (empty($value)) {
                unset($sidemenuItemsClean[$key]);
            }
        }

        $this->sidemenuItemsClean = $sidemenuItemsClean;
    }

    public function isAuthorized($user = null)
    {
        
        if ($this->request->params['controller'] == 'Errors') {
            return true;
        }
        
        foreach ($user['permissions'] as $value) {
            if ($value['controller'] == $this->request->params['controller']) {
                return true;
            }
        }
        return false;
    }

}
