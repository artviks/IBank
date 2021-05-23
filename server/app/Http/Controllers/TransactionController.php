<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index()
    {
        //calls all transactions for auth user
        return Transaction::all();
    }

    public function store(Request $request)
    {
        //store
    }

    public function show($id)
    {
        //detailed view of transaction
        return Transaction::find($id);
    }
}
