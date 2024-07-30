<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_id',
        'from_year',
        'to_year',
        'amount',
        'previous_year_rule',
    ];
}
