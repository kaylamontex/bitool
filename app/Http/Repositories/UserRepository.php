<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class UserRepository
{
    protected $userModel;

    public function __construct(\App\User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUserByUserId($userId)
    {
        $user = $this->userModel->find($userId);
        if ( $user ) {
            $user = $user->toArray();
        }
        return $user;
    }

    public function updateUserByUserId(array $data, $userId)
    {
        $record = $this->userModel->find($userId);
        return $record->update($data);
    }
}
