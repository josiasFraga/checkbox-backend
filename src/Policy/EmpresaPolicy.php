<?php
namespace App\Policy;

use App\Model\Entity\Empresa;
use Authorization\IdentityInterface;

class EmpresaPolicy
{
    public function canAdd(IdentityInterface $user, Empresa $empresa)
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    public function canEdit(IdentityInterface $user, Empresa $empresa)
    {
        if ($user->role == 'admin') {
            if ( $empresa->admin_id != $user->id ) {
                return false;
            }
            return true;
        }

        return false;
    }

    public function canDelete(IdentityInterface $user, Empresa $empresa)
    {
        if ($user->role == 'admin') {
            if ( $empresa->admin_id != $user->id ) {
                return false;
            }
            return true;
        }

        return false;
    }
}