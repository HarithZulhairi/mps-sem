<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications';
    protected $primaryKey = 'Pb_ID';

    protected $fillable = [
        'P_ID',
        'RI_ID',
        'E_ID',
        'Pb_type',
        'Pb_title',
        'Pb_authors',
        'Pb_belongs',
        'Pb_date',
        'Pb_DOI',
        'Pb_abstract',
        'Pb_file_path',
        'Pb_peer',
        'Pb_journalName',
        'Pb_volume',
        'Pb_issue',
        'Pb_page',
        'Pb_conferenceName',
        'Pb_conf_volume',
        'Pb_conf_issue',
        'Pb_conf_location',
        'Pb_existingDOI',
        'Pb_refers'
    ];

    // Define relationships
    public function researchInformation()
    {
        return $this->belongsTo(ResearchInformation::class, 'RI_ID');
    }

    public function platinum()
    {
        return $this->belongsTo(Platinum::class, 'P_ID');
    }

    public function expertDomain()
    {
        return $this->belongsTo(ExpertDomain::class, 'E_ID');
    }
}
