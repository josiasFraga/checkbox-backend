<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Agendamentos Controller
 *
 * @property \App\Model\Table\AgendamentosTable $Agendamentos
 * @method \App\Model\Entity\Agendamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AgendamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Empresas', 'Modulos'],
        ];
        $agendamentos = $this->paginate($this->Agendamentos);

        $this->set(compact('agendamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Agendamento id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $agendamento = $this->Agendamentos->get($id, [
            'contain' => ['Empresas', 'Modulos', 'CincoEssesAuditoria'],
        ]);

        $this->set(compact('agendamento'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $agendamento = $this->Agendamentos->newEmptyEntity();
        if ($this->request->is('post')) {
            $agendamento = $this->Agendamentos->patchEntity($agendamento, $this->request->getData());
            if ($this->Agendamentos->save($agendamento)) {
                $this->Flash->success(__('The agendamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agendamento could not be saved. Please, try again.'));
        }
        $empresas = $this->Agendamentos->Empresas->find('list', ['limit' => 200])->all();
        $modulos = $this->Agendamentos->Modulos->find('list', ['limit' => 200])->all();
        $this->set(compact('agendamento', 'empresas', 'modulos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Agendamento id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $agendamento = $this->Agendamentos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $agendamento = $this->Agendamentos->patchEntity($agendamento, $this->request->getData());
            if ($this->Agendamentos->save($agendamento)) {
                $this->Flash->success(__('The agendamento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The agendamento could not be saved. Please, try again.'));
        }
        $empresas = $this->Agendamentos->Empresas->find('list', ['limit' => 200])->all();
        $modulos = $this->Agendamentos->Modulos->find('list', ['limit' => 200])->all();
        $this->set(compact('agendamento', 'empresas', 'modulos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Agendamento id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $agendamento = $this->Agendamentos->get($id);
        if ($this->Agendamentos->delete($agendamento)) {
            $this->Flash->success(__('The agendamento has been deleted.'));
        } else {
            $this->Flash->error(__('The agendamento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
