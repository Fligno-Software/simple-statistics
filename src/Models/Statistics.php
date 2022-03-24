<?php

namespace Fligno\SimpleStatistics\Models;

use Fligno\SimpleStatistics\Traits\HasStatisticsFactoryTrait;
use Fligno\StarterKit\Traits\UsesUUIDTrait;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Statistics
 *
 * Note:
 * By default, models and factories inside a package need to explicitly connect with each other.
 * Thanks to `fligno/boilerplate-generator` package, once you create a factory file, it will also create a trait.
 * The trait then should be used inside the concerned model.
 *
 * @author James Carlo Luchavez <jamescarlo.luchavez@fligno.com>
 */
class Statistics extends Model
{
    use UsesUUIDTrait, SoftDeletes, HasStatisticsFactoryTrait;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'sub_type',
        'description',
        'data',
        'start_at',
        'end_at',
        'deleted_at',
    ];

    protected $casts = [
        'data' => AsCollection::class,
        'start_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    /******** RELATIONSHIPS ********/

    //

    /***** ACCESSORS & MUTATORS *****/

    //

    /******** OTHER METHODS ********/

    //
}
