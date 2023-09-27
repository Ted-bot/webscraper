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

        return redirect()->route('webscraper_ah');
    }

    public function scrapedProducts()
    {
        $ah_products = ScrapedAlbertHeijnProduct::all();

        return view('components.products',compact('ah_products'));
    }
}
