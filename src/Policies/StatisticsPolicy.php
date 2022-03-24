<?php

namespace Fligno\SimpleStatistics\Policies;

use App\Models\User;
use Fligno\SimpleStatistics\Models\Statistics;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

/**
 * Class StatisticsPolicy
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class StatisticsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Statistics $statistics
     * @return Response|bool
     */
    public function view(User $user, Statistics $statistics): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Statistics $statistics
     * @return Response|bool
     */
    public function update(User $user, Statistics $statistics): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Statistics $statistics
     * @return Response|bool
     */
    public function delete(User $user, Statistics $statistics): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Statistics $statistics
     * @return Response|bool
     */
    public function restore(User $user, Statistics $statistics): Response|bool
    {
        return Response::allow();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Statistics $statistics
     * @return Response|bool
     */
    public function forceDelete(User $user, Statistics $statistics): Response|bool
    {
        return Response::allow();
    }
}
