<?php

/**
 * Created by PhpStorm.
 * User: GitzJoey
 * Date: 9/7/2016
 * Time: 12:22 AM
 */

use \Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $table = 'bank_account';

    protected $fillable = [
        'account_number', 'bank_id', 'profile_id' , 'status', 'remarks'
    ];

    piblic function bank()
    {
    	return $this->belongsTo('App\Bank', 'id', 'bank_id');
    }
}