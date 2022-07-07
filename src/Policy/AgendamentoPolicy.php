<?php
namespace App\Policy;

use App\Model\Entity\Agendamento;
use Authorization\IdentityInterface;

class AgendamentoPolicy
{
    public function canIndex(IdentityInterface $user, Agendamento $agendamento)
    {
        if ($user->role == 'admin') {
            return true;
        }
        
        return false;
   
    }

    public function canAdd(IdentityInterface $user, Agendamento $agendamento)
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    public function canEdit(IdentityInterface $user, Agendamento $agendamento)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }

    public function canDelete(IdentityInterface $user, Agendamento $agendamento)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }
}