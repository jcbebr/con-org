<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PainelController extends Controller
{
    private $users;
    
    public function index (Request $request) 
    {
        $users = User::all();
        return view('painel', compact('users'));
    }
}
