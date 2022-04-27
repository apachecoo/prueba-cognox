<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BankTransactionController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('bank-transactions.index');
    }
    

    
    public function indexTransferOwnAccount()
    {
        return view('bank-transactions/index-transfer-own-account');
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    
}
