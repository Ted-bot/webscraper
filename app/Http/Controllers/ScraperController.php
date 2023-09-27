<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spiders\AlbertHeijnSpider;
use App\Models\ScrapedAlbertHeijnProduct;
use RoachPHP\Roach;

class ScraperController extends Controller
{

    public function index()
    {
        Roach::collectSpider(AlbertHeijnSpider::class);

        return redirect()->route('products');

    }

    public function scrapedProducts()
    {
        $ah_products = ScrapedAlbertHeijnProduct::paginate(6);

        return view('components.products',compact('ah_products'));
    }
}
