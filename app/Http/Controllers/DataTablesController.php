<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Datatables;


class DataTablesController extends Controller
{
    public function getViewUsers(){
    	return view('users.datatables.DT_user');
    }

    public function getUsers(){
    	return Datatables::of(User::query())->make(true);
    }
}
