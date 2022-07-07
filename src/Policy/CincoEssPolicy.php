<?php
namespace App\Policy;

use App\Model\Entity\CincoEss;
use Authorization\IdentityInterface;

class CincoEssPolicy
{
    public function canIndex(IdentityInterface $user, CincoEss $cinco_esses)
    {
        if ($user->role == 'admin') {
            return true;
        }
        
        return false;
   
    }

    public function canAdd(IdentityInterface $user, CincoEss $cinco_esses)
    {
        if ($user->role == 'admin') {
            return true;
        }
        return false;
    }

    public function canEdit(IdentityInterface $user, CincoEss $cinco_esses)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }

    public function canDelete(IdentityInterface $user, CincoEss $cinco_esses)
    {
        if ($user->role == 'admin') {
            return true;
        }

        return false;
    }
}