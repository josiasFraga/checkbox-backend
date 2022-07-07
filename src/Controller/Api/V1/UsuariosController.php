<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\AppController;
use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class  UsuariosController  extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['index', 'login', 'add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        debug((new DefaultPasswordHasher())->hash('zap123'));
        die();
    }

    public function login()
    {
        $this->request->allowMethod(['post']);
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $user = $result->getData();
            $payload = [
                'iss' => 'checkbox',
                'sub' => $user->id,
                'exp' => time() + 155520000,
            ];
            $json = [
                'token' => JWT::encode($payload, Security::getSalt(), 'HS256'),
            ];
        } else {
            $this->response = $this->response->withStatus(401);
            $json = [
                'message' => 'Usuário ou senha inválidos'
            ];
        }
        $this->set(compact('json'));
        $this->viewBuilder()->setOption('serialize', 'json');
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        $this->Authorization->skipAuthorization();
        $response = [];
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            $response = [
                'message' => 'Deslogado com sucesso!'
            ];
        }
        $this->set('response', $response);
        $this->viewBuilder()->setOption('serialize','user');
    }

}
