<?php
namespace App\Controller\Adm;

use App\Controller\Adm\AppController;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 */
class PermissionsController extends AppController
{


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $conditions = [];
        $q = $this->request->query('q');
        if ($q) {
            $conditions[] = ['Permissions.title LIKE' => "%{$q}%"];
        }

        $this->set('permissions', $this->paginate($this->Permissions->find('all', ['conditions' => $conditions])));
        $this->set('_serialize', ['permissions']);
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('permission', $permission);
        $this->set('_serialize', ['permission']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success('O permission foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O permission não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $users = $this->Permissions->Users->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'users'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->data);
            if ($this->Permissions->save($permission)) {
                $this->Flash->success('O permission foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O permission não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $users = $this->Permissions->Users->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'users'));
        $this->set('_serialize', ['permission']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success('O permission foi deletado.');
        } else {
            $this->Flash->error('O permission não pode ser deletado. Por favor, tente novamente.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
