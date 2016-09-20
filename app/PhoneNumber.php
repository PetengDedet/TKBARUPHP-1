<?php
/**
 * Created by PhpStorm.
 * User: Sugito
 * Date: 9/10/2016
 * Time: 11:05 AM
 */

namespace App;

use \Illuminate\Database\Eloquent\Model;

/**
 * App\PhoneNumber
 *
 * @mixin \Eloquent
 */
class PhoneNumber extends Model
{
	protected $table = 'phone_number';

	protected $fillable = [
		'number', 'profile_id', 'provider_id', 'remarks'
	];

	public function phoneProvider()
	{
		return $this->belongsTo('App\PhoneProvider', 'provider_id', 'id');
	}

	public function profile()
	{
		return $this->belongsTo('App\Profile', 'profile_id', 'id');
	}	
}