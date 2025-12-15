<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $table = 'mentor';

    protected $primaryKey = 'M_ID';

    protected $fillable = [
        'user_id',
        'M_name',
        'M_IC',
        'M_gender',
        'M_address',
        'M_phoneNum',
        'M_email',
    ];
}