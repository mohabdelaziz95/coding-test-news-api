<?php
namespace App\Factories;

use App\Adapters\BrokenProviderAdapter;
use App\Adapters\FoxNewsAdapter;
use App\Adapters\NewYorkTimesAdapter;
use App\Contracts\NewsAggregatorInterface;

final class NewsAggregatorFactory
{
    public static function create (string $aggregator): NewsAggregatorInterface
    {
        $newsAggregatorAdapter = self::newsAggregatorsList()[$aggregator];
        return new $newsAggregatorAdapter;
    }

    public static function newsAggregatorsList (): array
    {
        return [
            "FoxNewsAdapter" => FoxNewsAdapter::class,
            "NewYorkTimes" => NewYorkTimesAdapter::class,
            "BrokenProvider" => BrokenProviderAdapter::class,
        ];
    }
}