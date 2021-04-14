<?php
namespace App;

use App\Factories\NewsAggregatorFactory;
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

final class NewsAggregator
{

    /** @var array */
    private array $news = [];

    public function __construct ()
    {
        foreach (NewsAggregatorFactory::newsAggregatorsList() as $key => $newsAggregator) {

            try {
                 $this->news = array_merge(NewsAggregatorFactory::create($key)
                     ->fetch(), $this->news);

            } catch (Exception $e) {
                (new Logger('errors'))
                    ->pushHandler(new StreamHandler(__DIR__ . '/logs/app-errors.log'))
                    ->error($e->getMessage());
            }
        }
    }

    public function get(): array
    {
        return $this->news;
    }
}
