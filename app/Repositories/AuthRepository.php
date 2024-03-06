<?php

namespace App\Repositories;


class AuthRepository
{
    private $userId, $password, $role_id, $permissions;

    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

}
