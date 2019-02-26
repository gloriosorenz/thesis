<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $fillable = [
        'products_id', 'seasons_id', 'rice_farmers_id', 'orig_quantity','price', 'orig_quantity'
    ];

    public function getNumbers()
    {
        $newSubtotal = (Cart::subtotal());
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal;
        $newTotal = $newSubtotal;

        return collect([
            'newSubtotal' => $newSubtotal,
            'newTotal' => $newTotal,
        ]);
    }    

    public function getNumbers1(){
        $newSubtotal = (Cart::subtotal());
        if ($newSubtotal < 0) {
            $newSubtotal = 0;
        }
        $newTax = $newSubtotal;
        $newTotal = $newSubtotal;

        return $this->newTotal;
    }

    public function presentPrice()
    {
        return '₱'.number_format($this->price / 100 * 100, 2);
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function seasons()
    {
        return $this->belongsTo(Season::class, 'seasons_id');
    }

    public function rice_farmers()
    {
        return $this->belongsTo(RiceFarmer::class, 'rice_farmers_id');
    }
}

