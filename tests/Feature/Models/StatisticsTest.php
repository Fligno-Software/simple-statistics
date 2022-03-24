<?php

namespace Fligno\SimpleStatistics\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class StatisticsTest
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class StatisticsTest extends TestCase
{
    /**
     * Example Test
     *
     * @test
     */
    public function example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
