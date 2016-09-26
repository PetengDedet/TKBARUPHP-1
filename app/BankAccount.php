<?php
namespace App;

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
        'account_number', 'bank_id', 'customer_id', 'status', 'remarks'
    ];

    public function bank()
    {
    	return $this->belongsTo('App\Bank', 'bank_id', 'id');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer', 'id', 'customer_id');
    }

}