<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;
use App\Spiders\Processors\AHProductScraperProcessor;

class AlbertHeijnSpider extends BasicSpider
{
    public array $startUrls = [
        'https://www.ah.nl/producten/bier-en-aperitieven'
    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        AHProductScraperProcessor::class
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {
        $category = $response->filterXPath('//article[contains(@class, "product-card-portrait_root__ZiRpZ product-grid-lane_gridItems__BBa4h")]')
        ->each(fn($article) => [
            'image' => $article->filterXPath('//div/a/figure/div/img')->attr('src'),
            'size' => getimagesize($article->filterXPath('//div/a/figure/div/img')->attr('src'))[3],
            'product_name' => $article->filter('div > div + a')->text(),
            'product_link' => $article->filter('div > div + a')->link()->getUri(),
            'price' => $article->filterXPath('//div/a/div/div/div[1]')->text(),
            'promotion' => $article->filterXPath('//div/a/div[2]')->text() ?: 'no Promotion',
        ]);

        foreach($category as $item){
            yield $this->item($item);
        };
    }
}
