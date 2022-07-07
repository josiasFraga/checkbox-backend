<?php
namespace App\Policy;

use App\Model\Entity\EmpresaLocai;
use Authorization\IdentityInterface;

class EmpresaLocaiPolicy
{
    public function canIndex(IdentityInterface $user, EmpresaLocai $local)
    {
        if ($user->role == 'admin') {
            return true;
        }
        
        return false;
   
    }

    public function canAdd(IdentityInterface $user, EmpresaLocai $local)
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    public function canEdit(IdentityInterface $user, EmpresaLocai $local)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }

    public function canDelete(IdentityInterface $user, EmpresaLocai $local)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }
}