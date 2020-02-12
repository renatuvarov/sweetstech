<?php

namespace App\Entities\Catalog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Entities\Catalog
 *
 * @property integer $id
 * @property integer $machine_id
 * @property string $customer_name
 * @property string $customer_company
 * @property string $customer_phone
 * @property string $customer_email
 */
class Order extends Model
{
    protected $guarded = ['id'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
