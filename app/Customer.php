<?php
/**
 * Created by PhpStorm.
 * User: GitzJoey
 * Date: 9/7/2016
 * Time: 12:16 AM
 */

namespace App;

use \Illuminate\Database\Eloquent\Model;

/**
 * App\Customer
 *
 * @mixin \Eloquent
 */
class Customer extends Model
{
    protected $table = 'customer';
	protected $fillable = [
        'name', 'address', 'city', 'phone', 'remarks', 'tax_id', 'payment_due_date'
    ];

    public function profile()
    {
        return $this->hasMany('\App\Profile', 'customer_id', 'id');
    }

    public function bankAccount()
    {
        return $this->hasMany('\App\Bank');
    }
}