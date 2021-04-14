<?php
namespace App\Adapters;

use App\Contracts\NewsAggregatorInterface;
use App\DTOs\ArticleData;
use Package\NYTimes\NewYorkTimes;

class NewYorkTimesAdapter implements NewsAggregatorInterface
{
    /** @var NewYorkTimes */
    private NewYorkTimes $newYorkTimes;

    public function __construct ()
    {
        $this->newYorkTimes = new NewYorkTimes();
    }

    public function fetch (): array
    {
        return ArticleData::allFromDataSource((array) $this->newYorkTimes->getNews());
    }
}