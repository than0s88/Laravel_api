<?php

namespace App\Services;

class CheckoutService
{
    private $pricing_rules;
    public $total = 0;

    public function __construct($pricing_rules)
    {
    $this->pricing_rules = $pricing_rules;
    }

    public function scan(string $item){
        $product = Product::where('product_code', $item)->first();
        if($product){
            //add to cart
            $this->total = 0;
        }
    }
}
