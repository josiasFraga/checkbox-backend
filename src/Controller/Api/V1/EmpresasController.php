<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class  EmpresasController  extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        //$this->Authentication->allowUnauthenticated(['index']);
    }

    public function index()
    {
        $this->request->allowMethod(['get']);
        $this->Authorization->skipAuthorization();
        $user = $this->Authentication->getIdentity();

        $items = $this->Empresas->find('all',[
            'conditions' => [
                'or' => [
                    'Empresas.id' => $user->empresa_id,
                    'Empresas.matriz_id' => $user->empresa_id
                ]
            ]
        ]);
        $this->set([
            'items' => $items,
            '_serialize' => ['items']
        ]);
    }

    public function add()
    {
        $this->request->allowMethod(['post']);
        $user = $this->Authentication->getIdentity();
        $empresa = $this->Empresas->newEmptyEntity();
        $this->Authorization->authorize($empresa);
        $dados_salvar = $this->request->getData();
        $dados_salvar['admin_id'] = $user->id;
        $empresa = $this->Empresas->patchEntity($empresa, $dados_salvar);
        $dados = $this->Empresas->save($empresa);

        if ( $dados ) {
            if ( $user->empresa_id == null && $dados->matriz_id == null ) {
                $this->loadModel('Usuarios');
                $this->Usuarios->query()
                ->update()
                ->set(['empresa_id' => $dados->id])
                ->where(['id' => $user->id])
                ->execute();
            }
            $json = [
                'message' => 'Cadastro efetuado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $empresa->hasErrors() ) {

                $json = array_values($empresa->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao efetuar o cadastro da empresa'
                ];

            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function edit($item_id = null)
    {
        $this->request->allowMethod(['post']);

        $empresa = $this->Empresas->get($item_id);
        $empresa = $this->Empresas->patchEntity($empresa, $this->request->getData());
        $this->Authorization->authorize($empresa);

        $dados = $this->Empresas->save($empresa);

        if ( $dados ) {
            $json = [
                'message' => 'Cadastro alterado com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $empresa->hasErrors() ) {
                $json = array_values($empresa->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao alterar'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }

    public function delete($item_id = null)
    {
        $this->request->allowMethod(['delete']);

        $empresa = $this->Empresas->get($item_id);
        $this->Authorization->authorize($empresa);

        $result = $this->Empresas->delete($empresa);

        if ( $result ) {
            $json = [
                'message' => 'Registro excluido com sucesso!'
            ];
        } else {
            $this->response = $this->response->withStatus(500);

            if ( $empresa->hasErrors() ) {
                $json = array_values($empresa->getErrors());
            } else {
                $json = [
                    'message' => 'Ocorreu um erro ao ecluir'
                ];
            }
        }

        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
        
    }
    
}
