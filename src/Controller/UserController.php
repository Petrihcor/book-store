<?php

namespace Src\Controller;

use App\Controller;
use Src\User;

class UserController extends Controller
{
    public function execute()
    {
        $users = $this->userService->findAllUsers();

        return $this->view->showPage('user', [
            'userList' => $users
        ]);
    }

}