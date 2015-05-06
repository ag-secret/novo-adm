<?php
namespace App\Controller\Adm;

use App\Controller\Adm\AppController;

/**
 * TestFakeTable Controller
 *
 * @property \App\Model\Table\TestFakeTableTable $TestFakeTable
 */
class TestFakeTableController extends AppController
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
            $conditions[] = ['TestFakeTable.title LIKE' => "%{$q}%"];
        }

        $this->set('testFakeTable', $this->paginate($this->TestFakeTable->find('all', ['conditions' => $conditions])));
        $this->set('_serialize', ['testFakeTable']);
    }

    /**
     * View method
     *
     * @param string|null $id Test Fake Table id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testFakeTable = $this->TestFakeTable->get($id, [
            'contain' => []
        ]);
        $this->set('testFakeTable', $testFakeTable);
        $this->set('_serialize', ['testFakeTable']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testFakeTable = $this->TestFakeTable->newEntity();
        if ($this->request->is('post')) {
            $testFakeTable = $this->TestFakeTable->patchEntity($testFakeTable, $this->request->data);
            if ($this->TestFakeTable->save($testFakeTable)) {
                $this->Flash->success('O test fake table foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O test fake table não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $this->set(compact('testFakeTable'));
        $this->set('_serialize', ['testFakeTable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Test Fake Table id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testFakeTable = $this->TestFakeTable->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testFakeTable = $this->TestFakeTable->patchEntity($testFakeTable, $this->request->data);
            if ($this->TestFakeTable->save($testFakeTable)) {
                $this->Flash->success('O test fake table foi salvo.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('O test fake table não pode ser salvo. Por favor, tente novamente.');
            }
        }
        $this->set(compact('testFakeTable'));
        $this->set('_serialize', ['testFakeTable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Test Fake Table id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testFakeTable = $this->TestFakeTable->get($id);
        if ($this->TestFakeTable->delete($testFakeTable)) {
            $this->Flash->success('O test fake table foi deletado.');
        } else {
            $this->Flash->error('O test fake table não pode ser deletado. Por favor, tente novamente.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
