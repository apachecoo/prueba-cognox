<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAccounts;
use App\Models\BankTransaction;
use Log;

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

        $ownAccounts =  $this->ownAccounts= $this->getBankAccountsModel()
                                                 ->getBankAccountsByIdentificationDocument(auth()->user()->identification_document);
    
        return view('bank-transactions/index-transfer-own-account',compact('ownAccounts'));
    }

    
    public function saveTransferOwnAccount(Request $request)
    {
        
        //  dd($request->all());

        $validated = $request->validate([
            'root_account' => ['required', 'numeric'],
            'destination_account' => ['required','numeric','different:root_account'],
            'amount' => ['required'],
        ]);


        $validated['user_id']=auth()->user()->id;

        try{

            $transaction=BankTransaction::create($validated);

            return redirect()->route("transfer-own-account.index")
                            ->with("mensaje", "Transaccion numero ".$transaction->id."   exitosa")
                            ->with("tipo", "exitoso");

            

        }catch(\Exception $e){
            Log::error('Error al guardar transaccion'.__LINE__.' del archivo '.__FILE__.'.Error: '.$e->getMessage());
            return back()->withErrors([
                'amount' => 'Error inesperado por favor contactarse con el administrador',
            ]);
        }

    }

    
    public function listTransfer()
    {
    
        $banksTransactions = BankTransaction::paginate(2);

        return view('bank-transactions/list-transfer',compact('banksTransactions'));
        
    }

    public function getBankAccountsModel(){
        return new BankAccounts;
    }

    
    
}
