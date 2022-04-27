<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankPerson extends Model
{
    use HasFactory;

    protected $table='bank_person';

    protected $fillable = [
        'id',
        'identification_document',
        'names',
        'surnames'
    ];

    public $timestamps = false;
}
