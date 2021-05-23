<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function index()
    {
        return Account::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        return Account::find($id)->transactions;
    }

    public function edit($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
