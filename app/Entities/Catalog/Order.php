<?php

namespace App\Entities\Catalog;

use App\Entities\User;
use Carbon\Carbon;
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
 * @property Carbon $created_at
 */
class Order extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function createOrder(array $data): self
    {
        /** @var Order $order */
        $order = Order::make([
            'customer_name' => $data['st_nsp'],
            'customer_company' => $data['st_company'],
            'customer_email' => $data['st_email'],
            'customer_phone' => $data['st_phone'],
            'lang' => $data['lang'],
        ]);

        $order->machine()->associate(Machine::findOrFail($data['st_id']));

        $order->save();

        return $order;
    }

    public static function isAlreadyOrdered(array $data): bool
    {
        /** @var Order $order */
        $order = Order::where('machine_id', $data['st_id'])
            ->where('customer_email', $data['st_email'])
            ->where('viewed', false)
            ->orderBy('created_at', 'desc')
            ->first();

        if (! empty($order)) {
            return $order->isNotExpired();
        }

        return false;
    }

    private function isNotExpired(): bool
    {
        return $this->created_at->diffInMinutes(Carbon::now()) < config('site.user.order.interval');
    }

    public function makeViewed(User $user): void
    {
        if ( ! $this->viewed) {
            $this->viewed = true;
            $this->user()->associate($user);
            $this->save();
        }
    }
}
