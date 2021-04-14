<?php
namespace App\Adapters;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\ArticleData;
use Package\BrokenProvider\BrokenProvider;

class BrokenProviderAdapter implements NewsAggregatorInterface
{
    /** @var BrokenProvider */
    private BrokenProvider $brokenProvider;

    public function __construct ()
    {
        $this->brokenProvider = new BrokenProvider();
    }

    public function fetch (): array
    {
        return ArticleData::allFromDataSource($this->brokenProvider->getNews());
    }
}