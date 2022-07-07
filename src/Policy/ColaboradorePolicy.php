<?php
namespace App\Policy;

use App\Model\Entity\Colaboradore;
use Authorization\IdentityInterface;

class ColaboradorePolicy
{
    public function canIndex(IdentityInterface $user, Colaboradore $colaborador)
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    public function canAdd(IdentityInterface $user, Colaboradore $colaborador)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }

    public function canEdit(IdentityInterface $user, Colaboradore $colaborador)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }

    public function canDelete(IdentityInterface $user, Colaboradore $colaborador)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }
}