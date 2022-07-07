<?php
declare(strict_types=1);

namespace App\Controller\Api\V1;

use App\Controller\AppController;


class  ModulosController  extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

    }

    public function index()
    {
        $this->request->allowMethod(['get']);
        $this->Authorization->skipAuthorization();

        $items = $this->Modulos->find('all')->toArray();

        $this->set([
            'items' => $items,
            '_serialize' => ['items']
        ]);

    }
    
}
