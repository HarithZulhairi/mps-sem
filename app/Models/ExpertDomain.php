<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpertDomain extends Model
{
    use HasFactory;

    protected $table = 'expert_domain';

    protected $primaryKey = 'E_ID';


    protected $fillable = [
        'P_ID',
        'E_Name',
        'E_Title',
        'E_Email',
        'E_Position',
        'E_Workplace',
        'E_Qualification',
        'E_Photo',
        'E_CategoryExpertise',
        'E_GroupExpertise',
        'E_AreaExpertise',
        'E_ResearchTitle',
        'E_DurationStart',
        'E_DurationEnd',
        'E_Agent',
        'E_Role',
        'E_Cost',
        'E_Status',
        'E_PublicationTitle',
        'E_Authors',
        'E_PublicationDate',
        'E_Source',
        'E_Volume',
        'E_Pages',
        'E_Publisher',
        'E_Link'
    ];

    protected $casts = [
        'E_Qualification' => 'array',
        'E_GroupExpertise' => 'array',
        'E_AreaExpertise' => 'array',
        'E_ResearchTitle' => 'array',
        'E_DurationStart' => 'array',
        'E_DurationEnd' => 'array',
        'E_Agent' => 'array',
        'E_Role' => 'array',
        'E_Cost' => 'array',
        'E_Status' => 'array',
        'E_PublicationTitle' => 'array',
        'E_Authors' => 'array',
        'E_PublicationDate' => 'array',
        'E_Source' => 'array',
        'E_Volume' => 'array',
        'E_Pages' => 'array',
        'E_Publisher' => 'array',
        'E_Link' => 'array'
    ];

    public function getEQualificationAttribute($value)
    {
        return json_decode($value);
    }

    public function getEGroupExpertiseAttribute($value)
    {
        return json_decode($value);
    }

    public function getEAreaExpertiseAttribute($value)
    {
        return json_decode($value);
    }

    public function getEResearchTitleAttribute($value)
    {
        return json_decode($value);
    }

    public function getEDurationStartAttribute($value)
    {
        return json_decode($value);
    }

    public function getEDurationEndAttribute($value)
    {
        return json_decode($value);
    }

    public function getEAgentAttribute($value)
    {
        return json_decode($value);
    }

    public function getERoleAttribute($value)
    {
        return json_decode($value);
    }

    public function getECostAttribute($value)
    {
        return json_decode($value);
    }

    public function getEStatusAttribute($value)
    {
        return json_decode($value);
    }

    public function getEPublicationTitleAttribute($value)
    {
        return json_decode($value);
    }

    public function getEAuthorsAttribute($value)
    {
        return json_decode($value);
    }

    public function getEPublicationDateAttribute($value)
    {
        return json_decode($value);
    }

    public function getESourceAttribute($value)
    {
        return json_decode($value);
    }

    public function getEVolumeAttribute($value)
    {
        return json_decode($value);
    }

    public function getEPagesAttribute($value)
    {
        return json_decode($value);
    }

    public function getEPublisherAttribute($value)
    {
        return json_decode($value);
    }

    public function getELinkAttribute($value)
    {
        return json_decode($value);
    }
}
