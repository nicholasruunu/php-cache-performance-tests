<?php

use Cache\Adapter\Predis\PredisCachePool;
use Predis\Client;

class PredisBench
{
    private $predisCachePool;

    public function __construct()
    {
        $this->predisCachePool = new PredisCachePool(
          new Client('tcp://redis:6379')
        );
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     */
    public function benchGetItem()
    {
        $cacheItem = $this->predisCachePool->getItem('|foo|bar!tagHash');
        $cacheItem->set('baz');
        $this->predisCachePool->save($cacheItem);
        $this->predisCachePool->deleteItem('|foo|bar!tagHash');
    }
}
