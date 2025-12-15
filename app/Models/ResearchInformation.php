<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchInformation extends Model
{
    use HasFactory;

    protected $table = 'research_information';

    protected $primaryKey = 'RI_ID';

    protected $fillable = [
        'P_ID', 
        'RI_title',
        'RI_area',
        'RI_objective',
        'RI_methodology',
        'RI_background',
        'RI_timeline',
        'RI_budget',
        'RI_author', 
        'RI_abstract', 
        'RI_outcome', 
        'RI_reference'
    ];
}
