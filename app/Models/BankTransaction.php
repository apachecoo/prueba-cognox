<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'root_account',
        'destination_account',
        'amount',
        'user_id'
    ];

    public $timestamps = false;
}
