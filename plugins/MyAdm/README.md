# MyAdm plugin for CakePHP

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

```
composer require your-name-here/MyAdm
```

##Conteúdo

Elements - Breadcrumb, Paginator e Header
Módulos - Gerenciamento de usuários

##Dependencias
Plugin Bootstrap

## Auth
colocar este código no AppController do prefixo Adm

	public $layout = 'MyAdm.default'; //Diz que todos os templates devem usar o layout do plugin
    
    public $appName = 'interagir'; //O nome que vai no header
    public $logoLink = []; //A URL de quando se clica no nome do header

	//Declara que quer usar os helpers do plugin do Bootstrap
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

	//Conteúdo do sidemenu
    public $sidemenuItems = [
        'Principal' => [
            [
                'text' => 'Artigos',
                'icon' => 'rss',
                'url' => ['controller' => 'Articles', 'action' => 'index', 'plugin' => false, 'prefix' => 'Adm'],
                'quickAdd' => true,
            ],
            [
                'text' => 'Tags',
                'icon' => 'tags',
                'quickAdd' => true,
                'url' => ['controller' => 'Tags', 'action' => 'index', 'plugin' => false, 'prefix' => 'Adm'],
            ]
        ],
        'Configurações Gerais' => [
            [
                'text' => 'Usuários do sistema',
                'icon' => 'user',
                'url' => ['controller' => 'Users', 'action' => 'index', 'plugin' => 'MyAdm', 'prefix' => false],
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

        $this->set([
            'appName' => $this->appName,
            'logoLink' => $this->logoLink,
            'sidemenuItems' => $this->sidemenuItems
        ]);

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

        if ($this->Auth->user()) {
            $this->set('loggedInUser', $this->Auth->user());
        }
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