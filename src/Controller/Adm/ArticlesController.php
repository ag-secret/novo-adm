<?php
namespace App\Controller\Adm;

use App\Controller\Adm\AppController;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $conditions = [];
        $q = $this->request->query('q');
        if ($q) {
            $conditions[] = ['Articles.title LIKE' => "%{$q}%"];
        }

        $this->set('articles', $this->paginate($this->Articles->find('all', ['conditions' => $conditions])));
        $this->set('_serialize', ['articles']);
    }

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        $this->set('article', $article);
        $this->set('_serialize', ['article']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $article = $this->Articles->newEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success('O article foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O article não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $article = $this->Articles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->data);
            if ($this->Articles->save($article)) {
                $this->Flash->success('O article foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O article não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success('O article foi deletado.');
        } else {
            $this->Flash->error('O article não pode ser deletado. Por favor, tente novamente.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
