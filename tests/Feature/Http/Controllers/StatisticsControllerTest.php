<?php

namespace Fligno\SimpleStatistics\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * Class StatisticsControllerTest
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class StatisticsControllerTest extends TestCase
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
