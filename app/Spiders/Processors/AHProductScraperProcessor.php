<?php

namespace App\Spiders\Processors;

use App\Models\ScrapedAlbertHeijnProduct;
use RoachPHP\ItemPipeline\ItemInterface;
use RoachPHP\ItemPipeline\Processors\ItemProcessorInterface;
use RoachPHP\Support\Configurable;

class AHProductScraperProcessor implements ItemProcessorInterface
{
    use Configurable;

    public function processItem(ItemInterface $item): ItemInterface
    {
        ScrapedAlbertHeijnProduct::create([
            'product_name' => $item->get('product_name'),
            'product_price' => $item->get('price'),
            'product_image' => $item->get('image'),
            'product_link' => $item->get('product_link'),
            'product_size' => $item->get('size'),
            'product_promotion' => $item->get('promotion'),
        ]);

        return $item;
    }

}
