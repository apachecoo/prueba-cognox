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
            'amount' => ['required','min:0','not_in:0'],
        ]);
        
        $validated['user_id']=auth()->user()->id;
        $sourceAccountData= $this->getDataBankAccount($validated['root_account']);

        
        if(is_object($sourceAccountData) ){
            if($sourceAccountData->balance < $validated['amount']){
                return back()->withErrors([
                    'amount' => 'La cuenta origen '.$validated['root_account'].' no tiene saldo suficiente. Saldo actual: '.$sourceAccountData->balance,
                ]);       
            }
        }else{
            return back()->withErrors([
                'amount' => 'La cuenta origen no existe o esta inactiva',
            ]);
    
        }
        
        // try{

            $transaction=BankTransaction::create($validated);
            $this->updateBalanceAccount($validated['root_account'],$validated['destination_account'],$validated['amount']);

            return redirect()->route("transfer-own-account.index")
                            ->with("mensaje", "Transaccion numero ".$transaction->id."   exitosa")
                            ->with("tipo", "exitoso");

            

        // }catch(\Exception $e){
        //     Log::error('Error al guardar transaccion'.__LINE__.' del archivo '.__FILE__.'.Error: '.$e->getMessage());
        //     return back()->withErrors([
        //         'amount' => 'Error inesperado por favor contactarse con el administrador',
        //     ]);
        // }

    }

    
    public function listTransfer()
    {
    
        $banksTransactions = BankTransaction::paginate(2);

        return view('bank-transactions/list-transfer',compact('banksTransactions'));
        
    }

    public function getBankAccountsModel(){
        return new BankAccounts;
    }

    public function updateBalanceAccount($accountNumberOrigin,$accountNumberDestination,$value){

        $bankAccountOrigin = BankAccounts::where('account_number', $accountNumberOrigin)->first();
                             BankAccounts::where('account_number', $accountNumberOrigin)
                                           ->update(['balance' => $bankAccountOrigin->balance+$value]);

        $bankAccountDestination = BankAccounts::where('account_number', $accountNumberDestination)->first();
                                  BankAccounts::where('account_number', $accountNumberDestination)
                                                ->update(['balance' => $bankAccountDestination->balance-$value]);


        
    }

    public function getDataBankAccount($bankAccount){

        return $this->getBankAccountsModel()->getBankAccountsByAccountNumber($bankAccount);

    }

    
    
}
