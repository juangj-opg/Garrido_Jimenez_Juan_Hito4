<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;

class UsersController extends Controller
{
    protected $incidencias;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        $users = $this->users->obtenerUsuarios();
        return view('users.listUsers', ['users' => $users]);
    }

    public function infoUser($id)
    {
        $user = $this->users->obtenerUsuarioPorID($id);
        return view('users.infoUser', ['user' => $user]);
    }

    public function wip()
    {
        return view('users.wip');
    }
}
