<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UsersInfo extends Model
{
    use HasFactory;
	
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_info';
	
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
        'clientID',
        'accountType',
        'countryPhoneCode',
        'mobileNumber',
        'phoneNumber',
        'country',
        'state',
        'city',
        'address',
        'zonalCode'
    ];
	
	/**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'clientID' => 'string',
        'countryPhoneCode' => 'integer',
        'zonalCode' => 'integer',
    ];
	
	/**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Automatically generate UUID for clientID when creating a new model
        static::creating(function ($model) {
            if (empty($model->clientID)) {
                $model->clientID = (string) Str::uuid();
            }
        });
    }
}
