<?php

namespace Fligno\SimpleStatistics\Observers;

use Fligno\SimpleStatistics\Models\Statistics;

/**
 * Class StatisticsObserver
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class StatisticsObserver
{
    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public bool $afterCommit = true;

    /**
     * Handle the Statistics "created" event.
     *
     * @param  Statistics $statistics
     * @return void
     */
    public function created(Statistics $statistics): void
    {
        //
    }

    /**
     * Handle the Statistics "updated" event.
     *
     * @param  Statistics $statistics
     * @return void
     */
    public function updated(Statistics $statistics): void
    {
        //
    }

    /**
     * Handle the Statistics "deleted" event.
     *
     * @param  Statistics $statistics
     * @return void
     */
    public function deleted(Statistics $statistics): void
    {
        //
    }

    /**
     * Handle the Statistics "restored" event.
     *
     * @param  Statistics $statistics
     * @return void
     */
    public function restored(Statistics $statistics): void
    {
        //
    }

    /**
     * Handle the Statistics "force deleted" event.
     *
     * @param  Statistics $statistics
     * @return void
     */
    public function forceDeleted(Statistics $statistics): void
    {
        //
    }
}
