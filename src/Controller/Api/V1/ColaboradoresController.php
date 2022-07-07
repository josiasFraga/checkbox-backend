<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\AppController;


class  ColaboradoresController  extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
    }

    public function index()
    {
        $this->request->allowMethod(['get']);

        $colaborador = $this->Colaboradores->newEmptyEntity();
        $this->Authorization->authorize($colaborador);
        $user = $this->Authentication->getIdentity();

        $items = $this->Colaboradores->find('all', [
            'conditions' => [
                'or' => [
                    'Empresas.id' => $user->empresa_id,
                    'Empresas.matriz_id' => $user->empresa_id,
                ]
            ],
            'contain' => ['Empresas']
        ])->toArray();

        $this->set([
            'items' => $items,
            '_serialize' => ['items']
        ]);

    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Colaboradores');
        $colaborador = $this->Colaboradores->newEmptyEntity();
        $this->Authorization->authorize($colaborador);
        $colaborador = $this->Colaboradores->patchEntity($colaborador, $this->request->getData());
        $checkBusinessIsOwner = $this->checkBusinessIsOwner($this->request->getAttribute('identity')->empresa_id, $this->request->getData('empresa_id'));

        if ( !$checkBusinessIsOwner ) {
            
            $this->response = $this->response->withStatus(403);
            $json = [
                'message' => 'Sem permissao de cadastro nesta empresa'
            ];
            $this->set(compact('json'));
            $this->viewBuilder()->setOption('serialize', 'json');
            return null;
        }

        $dados = $this->Colaboradores->save($colaborador);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro efetuado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $colaborador->hasErrors() ) {
                $json = array_values($colaborador->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao efetuar o cadastro do colaborador'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function edit($item_id = null)
    {
        $this->request->allowMethod(['post']);

        $colaborador = $this->Colaboradores->get($item_id);
        $empresa_registro = $colaborador->empresa_id;
        $data_to_update = $this->request->getData();
        unset($data_to_update['empresa_id']);
        $colaborador = $this->Colaboradores->patchEntity($colaborador, $data_to_update);
        $this->Authorization->authorize($colaborador);

        $checkBusinessIsOwner = $this->checkBusinessIsOwner($this->request->getAttribute('identity')->empresa_id, $empresa_registro);

        if ( !$checkBusinessIsOwner ) {
            
            $this->response = $this->response->withStatus(403);
            $json = [
                'message' => 'Sem permissao de cadastro nesta empresa'
            ];
            $this->set(compact('json'));
            $this->viewBuilder()->setOption('serialize', 'json');
            return null;
        }

        $dados = $this->Colaboradores->save($colaborador);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro alterado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $colaborador->hasErrors() ) {
                $json = array_values($colaborador->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao alterar do colaborador'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function delete($item_id = null)
    {
        $this->request->allowMethod(['delete']);

        $colaborador = $this->Colaboradores->get($item_id);
        $empresa_registro = $colaborador->empresa_id;
        $this->Authorization->authorize($colaborador);

        $checkBusinessIsOwner = $this->checkBusinessIsOwner($this->request->getAttribute('identity')->empresa_id, $empresa_registro);

        if ( !$checkBusinessIsOwner ) {
            
            $this->response = $this->response->withStatus(403);
            $json = [
                'message' => 'Sem permissao de exclusao nesta empresa'
            ];

            $this->set(compact('json'));
            $this->viewBuilder()->setOption('serialize', 'json');
            return null;
        }

        $result = $this->Colaboradores->delete($colaborador);

        if ( $result ) {
            $json = [
                'message' => 'Exluido com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $result->hasErrors() ) {
                $json = array_values($result->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao ecluir do colaborador'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }
    
}
