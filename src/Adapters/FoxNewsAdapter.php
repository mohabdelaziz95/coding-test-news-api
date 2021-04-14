<?php
namespace App\Adapters;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\ArticleData;
use Package\FoxNews\FoxNews;

final class FoxNewsAdapter implements NewsAggregatorInterface
{
    /** @var FoxNews */
    private FoxNews $foxNews;

    public function __construct ()
    {
        $this->foxNews = new FoxNews();
    }

    public function fetch (): array
    {
        return ArticleData::allFromDataSource($this->foxNews->getNewsFromAPI());
    }
}