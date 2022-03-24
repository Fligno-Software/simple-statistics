<?php

namespace Database\Factories;

// Model
use Fligno\SimpleStatistics\Models\Statistics;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class Statistics
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class StatisticsFactory extends Factory
{
    protected $model = Statistics::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            //
        ];
    }
}
