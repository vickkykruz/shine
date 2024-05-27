<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecruiterInfo;
use App\Models\User;


class RecruiterSkills extends Model
{
    use HasFactory;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'recruiter_skills';
	
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
        'bind_id',
        'table_type',
        'job_id',
        'skill',
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
     * Get the job type associated with the skill table.
     */
	public function job()
    {
        return $this->morphTo(null, 'table_type', 'job_id');
    }
	
	
	/**
     * Get the user associated with the selected job country.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'bind_id', 'bind_id');
    }
}
