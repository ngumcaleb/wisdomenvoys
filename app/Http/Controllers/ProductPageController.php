<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;

class ProductPageController extends Controller
{
    public function index()
    {
        return view('products', [
            'settings' => Setting::instance(),
            'hero' => [
                'eyebrow' => 'OUR PRODUCTS',
                'title' => 'Kingdom Resources',
                'description' => 'Books, manuals, training materials, and digital resources to equip you for the mandate.',
            ],
            'products' => Product::active()->ordered()->get(),
        ]);
    }
}
