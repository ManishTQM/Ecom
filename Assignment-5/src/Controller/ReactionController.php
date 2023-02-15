<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reaction Controller
 *
 * @property \App\Model\Table\ReactionTable $Reaction
 * @method \App\Model\Entity\Reaction[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReactionController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Products'],
        ];
        $reaction = $this->paginate($this->Reaction);

        $this->set(compact('reaction'));
    }

    /**
     * View method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reaction = $this->Reaction->get($id, [
            'contain' => ['Users', 'Products'],
        ]);

        $this->set(compact('reaction'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reaction = $this->Reaction->newEmptyEntity();
        if ($this->request->is('post')) {
            $reaction = $this->Reaction->patchEntity($reaction, $this->request->getData());
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
        }
        $users = $this->Reaction->Users->find('list', ['limit' => 200])->all();
        $products = $this->Reaction->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('reaction', 'users', 'products'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reaction = $this->Reaction->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reaction = $this->Reaction->patchEntity($reaction, $this->request->getData());
            if ($this->Reaction->save($reaction)) {
                $this->Flash->success(__('The reaction has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reaction could not be saved. Please, try again.'));
        }
        $users = $this->Reaction->Users->find('list', ['limit' => 200])->all();
        $products = $this->Reaction->Products->find('list', ['limit' => 200])->all();
        $this->set(compact('reaction', 'users', 'products'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reaction id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reaction = $this->Reaction->get($id);
        if ($this->Reaction->delete($reaction)) {
            $this->Flash->success(__('The reaction has been deleted.'));
        } else {
            $this->Flash->error(__('The reaction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
