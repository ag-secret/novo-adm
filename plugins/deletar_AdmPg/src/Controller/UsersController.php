<?php

namespace AdmPg\Controller;

use AdmPg\Controller\AppController;

class UsersController extends AppController
{
	public function settings()
	{
		$user = $this->Users->get($this->Auth->user('id'));

        if ($this->request->is(['post', 'put', 'patch'])) {
            if ($this->request->data('new_password')) {
                $this->request->data['password'] = $this->request->data['new_password'];
            }
            // Para não editar a conta do amiguinho
            $user->id = $this->Auth->user('id');
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Alterações da conta foram feitas com sucesso.');
                return $this->redirect(['action' => 'settings']);
            } else {
                $this->Flash->error('Alterações da conta não puderam ser feitas. Por favor, tente novamente.');
            }
        }

        $this->set(compact('user'));
	}

    public function index()
    {
        $this->paginate = [];

        $conditions = [];
        $q = $this->request->query('q');
        if ($q) {
        	$conditions[] = ['Users.name LIKE' => "%{$q}%", 'Users.email LIKE' => "%{$q}%"];
        }
        $this->set('users', $this->paginate($this->Users->find('all', ['conditions' => $conditions])));
        $this->set('_serialize', ['users']);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('O usuário foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O usuário não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Permissions']
        ]);
        // Debug($user);
        // exit();
        if ($this->request->is(['patch', 'post', 'put'])) {

            if (!$this->request->data('new_password')) {
                unset($this->request->data['new_password']);
            } else {
                $this->request->data['password'] = $this->request->data['new_password'];
            }

            if ($this->request->data('new_password')) {
                $this->request->data['password'] = $this->request->data['new_password'];
            }
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                
                // Atualiza os dados do usuário na sessão 'Auth', por exemplo, o header exibe o nome dele
                // baseado nos dados da sessao do usuario logado. Se aqui nao for atualizado
                // ele pode mudar o nome e o header continuara a exibir o nome antigo
                //$this->Auth->setUser($user);

                $this->Flash->success('O usuário foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O usuário não pode ser salvo. Por favor, tente novamente.');
            }
        }

        $this->set(compact('user'));
    }

	public function login()
	{
		$this->layout = 'login';

        if ($this->request->is('post')) {
           $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->default(__('Email e/ou senha estão incorretos.'),'default',[],'auth');
            }
        }
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
}

