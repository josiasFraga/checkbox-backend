<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class  AgendamentosController  extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        //$this->Authentication->allowUnauthenticated(['index']);
    }

    public function index()
    {
        $this->request->allowMethod(['get']);
        $agendamento = $this->Agendamentos->newEmptyEntity();
        $this->Authorization->authorize($agendamento);
        $user = $this->Authentication->getIdentity();

        $items = $this->Agendamentos->find('all', [
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

        //debug($user->id);
    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $this->loadModel('Agendamentos');
        $agendamento = $this->Agendamentos->newEmptyEntity();
        $this->Authorization->authorize($agendamento);
        $dados = $this->request->getData();

        if ( !isset($dados['empresas_ids']) || count($dados['empresas_ids']) == 0 ) {
            
            $this->response = $this->response->withStatus(403);
            $json = [
                'message' => 'Empresa(s) não informada(s)'
            ];
            $this->set(compact('json'));
            $this->viewBuilder()->setOption('serialize', 'json');
            return null;

        }

        $dados_salvar = [];

        foreach( $dados['empresas_ids'] as $key => $empresa_id ){

            $checkBusinessIsOwner = $this->checkBusinessIsOwner($this->request->getAttribute('identity')->empresa_id, $empresa_id);
    
            if ( !$checkBusinessIsOwner ) {
                
                $this->response = $this->response->withStatus(403);
                $json = [
                    'message' => 'Sem permissao de cadastro nesta empresa'
                ];
                $this->set(compact('json'));
                $this->viewBuilder()->setOption('serialize', 'json');
                return null;
            }

            $dados['empresa_id'] = $empresa_id;
            $dados_salvar[$key] = $dados;
            unset($dados_salvar[$key]['empresas_ids']);

        }

        $dados_salvar = $this->Agendamentos->newEntities($dados_salvar);
        $dados = $this->Agendamentos->saveMany($dados_salvar);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro efetuado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $agendamento->hasErrors() ) {
                $json = array_values($agendamento->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao efetuar o cadastro do agendamento'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function edit($item_id = null)
    {
        $this->request->allowMethod(['post']);

        $agendamento = $this->Agendamentos->get($item_id);
        $empresa_registro = $agendamento->empresa_id;
        $data_to_update = $this->request->getData();
        unset($data_to_update['empresa_id']);
        $agendamento = $this->Agendamentos->patchEntity($agendamento, $data_to_update);
        $this->Authorization->authorize($agendamento);

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

        $dados = $this->Agendamentos->save($agendamento);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro alterado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $agendamento->hasErrors() ) {
                $json = array_values($agendamento->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao alterar o agendamento'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function delete($item_id = null)
    {
        $this->request->allowMethod(['delete']);

        $agendamento = $this->Agendamentos->get($item_id);
        $empresa_registro = $agendamento->empresa_id;
        $this->Authorization->authorize($agendamento);

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

        $result = $this->Agendamentos->delete($agendamento);

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
                    'message' => 'Ocorreu um erro ao ecluir o agendamento'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }
    
}
