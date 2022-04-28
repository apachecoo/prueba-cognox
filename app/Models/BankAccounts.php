<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'identification_document',
        'balance',
        'active'
    ];

    public $timestamps = false;

    public function getBankAccountsByIdentificationDocument($identificationDocument){

                     $data= $this->selectRaw('ba.account_number,ba.active,ba.identification_document,bp.names,bp.surnames')
                     ->from('bank_accounts as ba')
                     ->leftjoin('bank_person as bp', 'ba.identification_document', '=', 'bp.identification_document')
                     ->where('ba.identification_document',$identificationDocument)
                     ->where('ba.active','1')
                     ->get();

        return $data ? $data: [];

    }

    public function getBankAccountsByIdentificationDocumentAll($identificationDocument){

        $data= $this->selectRaw('ba.account_number,ba.active,ba.balance,ba.identification_document,bp.names,bp.surnames')
        ->from('bank_accounts as ba')
        ->leftjoin('bank_person as bp', 'ba.identification_document', '=', 'bp.identification_document')
        ->where('ba.identification_document',$identificationDocument)
        ->get();

        return $data ? $data: [];

    }

    public function getBankAccountsByAccountNumber($accountNumber,$status=1){

        $data= $this->selectRaw('ba.account_number,ba.balance,ba.active,ba.identification_document,bp.names,bp.surnames')
        ->from('bank_accounts as ba')
        ->leftjoin('bank_person as bp', 'ba.identification_document', '=', 'bp.identification_document')
        ->where('ba.account_number',$accountNumber)
        ->where('ba.active',$status)
        ->first();

    return $data ? $data: [];

    }


}
