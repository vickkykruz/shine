<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecruiterInfo;
use App\Models\User;
use App\Models\RecruiterSkill;

class DesiredJob extends Model
{
    use HasFactory;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'desired_job';
	
	/**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
	
	/**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'int';
	
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recruiterInfoId',
        'bind_id',
		'desired_job_title',
        'job_position',
		'responsibility_level',
		'portfolio_url',
		'linkedIn_url',
    ];
	
	/**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'bind_id' => 'string',
    ];
	
	/**
     * Get the recruiter info associated with the selected job country.
     */
	public function recruiterSkills()
    {
        return $this->morphMany(RecruiterSkill::class, 'job', 'table_type', 'job_id');
    }
	
	/**
     * Get the recruiter info associated with the selected job country.
     */
    public function recruiterInfo()
    {
        return $this->belongsTo(RecruiterInfo::class, 'recruiterInfoId');
    }
	
	/**
     * Get the user associated with the selected job country.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'bind_id', 'bind_id');
    }
}
