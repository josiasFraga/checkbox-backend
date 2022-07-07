<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class CincoEssesController  extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        //$this->Authentication->allowUnauthenticated(['index']);
    }

    public function index()
    {
        $this->request->allowMethod(['get']);
        $cinco_esses = $this->CincoEsses->newEmptyEntity();
        $this->Authorization->authorize($cinco_esses);
        $user = $this->Authentication->getIdentity();

        $items = $this->CincoEsses->find('all', [
            'conditions' => [
                'or' => [
                    'Empresas.id' => $user->empresa_id,
                    'Empresas.matriz_id' => $user->empresa_id,
                ]
            ],
            'contain' => ['Empresas', 'EmpresaLocais']
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
        $this->loadModel('CincoEsses');
        $cinco_esses = $this->CincoEsses->newEmptyEntity();
        $this->Authorization->authorize($cinco_esses);
        $dados = $this->request->getData();

        $checkBusinessIsOwner = $this->checkBusinessIsOwner($this->request->getAttribute('identity')->empresa_id, $dados['empresa_id']);
    
        if ( !$checkBusinessIsOwner ) {
            
            $this->response = $this->response->withStatus(403);
            $json = [
                'message' => 'Sem permissao de cadastro nesta empresa'
            ];
            $this->set(compact('json'));
            $this->viewBuilder()->setOption('serialize', 'json');
            return null;
        }

        //verifico se o usuário selecionou os locais
        if ( !isset($dados['locais_ids']) || count($dados['locais_ids']) == 0 ) {
            
            $this->response = $this->response->withStatus(403);
            $json = [
                'message' => 'Local(is) não informado(s)'
            ];
            $this->set(compact('json'));
            $this->viewBuilder()->setOption('serialize', 'json');
            return null;

        }

        $dados_salvar = [];

        //verifico se os locais existem na empresa selecionada
        $this->loadModel('EmpresaLocais');
        foreach( $dados['locais_ids'] as $key => $local_id ){
            $local_dados = $this->EmpresaLocais->find('all',[
                'conditions' => [
                    'EmpresaLocais.id' => $local_id,
                    'Empresas.id' => $dados['empresa_id'],
 
                ],
                'contain' => ['Empresas']
            ])->first();

            if ( !$local_dados || $local_dados == null ) {

                $this->response = $this->response->withStatus(403);
                $json = [
                    'message' => 'Um dos locais selecionados não pertence a emprea selecionada.'
                ];
                $this->set(compact('json'));
                $this->viewBuilder()->setOption('serialize', 'json');
                return null;

            }

            $dados['local_id'] = $local_id;
            $dados_salvar[$key] = $dados;
            unset($dados_salvar[$key]['locais_ids']);
        }

        $dados_salvar = $this->CincoEsses->newEntities($dados_salvar);
        $dados = $this->CincoEsses->saveMany($dados_salvar);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro efetuado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $dados_salvar->hasErrors() ) {
                $json = array_values($dados_salvar->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao efetuar o cadastro do cinco_esses'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function edit($item_id = null)
    {
        $this->request->allowMethod(['post']);

        $cinco_esses = $this->CincoEsses->get($item_id);
        $empresa_registro = $cinco_esses->empresa_id;
        $data_to_update = $this->request->getData();
        unset($data_to_update['empresa_id']);
        $cinco_esses = $this->CincoEsses->patchEntity($cinco_esses, $data_to_update);
        $this->Authorization->authorize($cinco_esses);

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

        $dados = $this->CincoEsses->save($cinco_esses);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro alterado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $cinco_esses->hasErrors() ) {
                $json = array_values($cinco_esses->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao alterar o item'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function delete($item_id = null)
    {
        $this->request->allowMethod(['delete']);

        $cinco_esses = $this->CincoEsses->get($item_id);
        $empresa_registro = $cinco_esses->empresa_id;
        $this->Authorization->authorize($cinco_esses);

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

        $result = $this->CincoEsses->delete($cinco_esses);

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
                    'message' => 'Ocorreu um erro ao ecluir o item'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }
    
}
