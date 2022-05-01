<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankUserAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'user_id',
    ];

    public $timestamps = false;

}
