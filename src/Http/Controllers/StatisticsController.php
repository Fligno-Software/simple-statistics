<?php

namespace Fligno\SimpleStatistics\Http\Controllers;

use App\Http\Controllers\Controller;
use Fligno\SimpleStatistics\Repositories\StatisticsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

// Model
use Fligno\SimpleStatistics\Models\Statistics;

// Requests
use Fligno\SimpleStatistics\Http\Requests\Statistics\IndexStatisticsRequest;
use Fligno\SimpleStatistics\Http\Requests\Statistics\StoreStatisticsRequest;
use Fligno\SimpleStatistics\Http\Requests\Statistics\ShowStatisticsRequest;
use Fligno\SimpleStatistics\Http\Requests\Statistics\UpdateStatisticsRequest;
use Fligno\SimpleStatistics\Http\Requests\Statistics\DeleteStatisticsRequest;
use Fligno\SimpleStatistics\Http\Requests\Statistics\RestoreStatisticsRequest;

// Events
use Fligno\SimpleStatistics\Events\Statistics\StatisticsCollectedEvent;
use Fligno\SimpleStatistics\Events\Statistics\StatisticsCreatedEvent;
use Fligno\SimpleStatistics\Events\Statistics\StatisticsShownEvent;
use Fligno\SimpleStatistics\Events\Statistics\StatisticsUpdatedEvent;
use Fligno\SimpleStatistics\Events\Statistics\StatisticsArchivedEvent;
use Fligno\SimpleStatistics\Events\Statistics\StatisticsRestoredEvent;

/**
 * Class StatisticsController
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class StatisticsController extends Controller
{
    /**
     * PHP 5 allows developers to declare constructor methods for classes.
     * Classes which have a constructor method call this method on each newly-created object,
     * so it is suitable for any initialization that the object may need before it is used.
     *
     * Note: Parent constructors are not called implicitly if the child class defines a constructor.
     * In order to run a parent constructor, a call to parent::__construct() within the child constructor is required.
     *
     * param [ mixed $args [, $... ]]
     * @link https://php.net/manual/en/language.oop5.decon.php
     */
    public function __construct(public StatisticsRepository $statisticsRepository)
    {}

    /**
     * Statistics List
     *
     * @group Statistics Management
     *
     * @param IndexStatisticsRequest $request
     * @return JsonResponse
     */
    public function index(IndexStatisticsRequest $request): JsonResponse
    {
        $data = $this->statisticsRepository->builder();

        if ($request->has('full_data') === TRUE) {
            $data = $data->get();
        } else {
            $data = $data->simplePaginate($request->get('per_page', 15));
        }

        event(new StatisticsCollectedEvent($data));

        return customResponse()
            ->data($data)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Create Statistics
     *
     * @group Statistics Management
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $data = $request->all();

        $model = $this->statisticsRepository->create($data)?->fresh();

        event(new StatisticsCreatedEvent($model));

        return customResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Store Statistics
     *
     * @group Statistics Management
     *
     * @param StoreStatisticsRequest $request
     * @return JsonResponse
     */
    public function store(StoreStatisticsRequest $request): JsonResponse
    {
        $data = $request->all();

        $model = Statistics::create($data)->fresh();

        event(new StatisticsCreatedEvent($model));

        return customResponse()
            ->data($model)
            ->message('Successfully created record.')
            ->success()
            ->generate();
    }

    /**
     * Show Statistics
     *
     * @group Statistics Management
     *
     * @param ShowStatisticsRequest $request
     * @param Statistics $statistics
     * @return JsonResponse
     */
    public function show(ShowStatisticsRequest $request, Statistics $statistics): JsonResponse
    {
        event(new StatisticsShownEvent($statistics));

        return customResponse()
            ->data($statistics)
            ->message('Successfully collected record.')
            ->success()
            ->generate();
    }

    /**
     * Edit Statistics
     *
     * @group Statistics Management
     *
     * @param Request $request
     * @param Statistics $statistics
     * @return JsonResponse
     */
    public function edit(Request $request, Statistics $statistics): JsonResponse
    {
        // Logic here...

        event(new StatisticsUpdatedEvent($statistics));

        return customResponse()
            ->data($statistics)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Update Statistics
     *
     * @group Statistics Management
     *
     * @param UpdateStatisticsRequest $request
     * @param Statistics $statistics
     * @return JsonResponse
     */
    public function update(UpdateStatisticsRequest $request, Statistics $statistics): JsonResponse
    {
        // Logic here...

        event(new StatisticsUpdatedEvent($statistics));

        return customResponse()
            ->data($statistics)
            ->message('Successfully updated record.')
            ->success()
            ->generate();
    }

    /**
     * Archive Statistics
     *
     * @group Statistics Management
     *
     * @param DeleteStatisticsRequest $request
     * @param Statistics $statistics
     * @return JsonResponse
     */
    public function destroy(DeleteStatisticsRequest $request, Statistics $statistics): JsonResponse
    {
        $statistics->delete();

        event(new StatisticsArchivedEvent($statistics));

        return customResponse()
            ->data($statistics)
            ->message('Successfully archived record.')
            ->success()
            ->generate();
    }

    /**
     * Restore Statistics
     *
     * @group Statistics Management
     *
     * @param RestoreStatisticsRequest $request
     * @param $statistics
     * @return JsonResponse
     */
    public function restore(RestoreStatisticsRequest $request, $statistics): JsonResponse
    {
        $data = Statistics::withTrashed()->find($statistics)->restore();

        event(new StatisticsRestoredEvent($data));

        return customResponse()
            ->data($data)
            ->message('Successfully restored record.')
            ->success()
            ->generate();
    }
}
