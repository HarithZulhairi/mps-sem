<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $primaryKey = 'S_ID';

    protected $fillable = [
        'user_id', 
        'S_name', 
        'S_IC', 
        'S_gender', 
        'S_address', 
        'S_phoneNum', 
        'S_email'
    ];
}
