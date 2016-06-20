<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

abstract class ModelApp extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Order fields allowed
     * @var array
     */
    protected $order_fields_allowed = ['id', 'created_at', 'updated_at'];

    /**
     * Default field
     * @var string
     */
    protected $order_default = 'id';

    /**
     * Default order direction
     * @var string
     */
    protected $order_default_direction = 'desc';

    /**
     * Get the created date
     *
     * @return string
     */
    public function getCreatedAttribute()
    {
        return Date::parse($this->created_at)->format('d-m-Y');
    }

    /**
     * Scope Order
     *
     * @param  QueryBuilder $query
     * @param  string $sortBy
     * @param  string $direction
     * @return QueryBuilder
     */
    public function scopeOrder($query, $sortBy='id', $direction='ASC')
    {
        if (in_array($sortBy, $this->order_fields_allowed)) {
            return $query->orderBy($sortBy, $direction);
        }

        return $query;
    }

    /**
     * Scope filter for search request
     *
     * @param  QueryBuilder $query
     * @param  string $search
     * @return QueryBuilder
     */
    public function scopeFilterForSearch($query, $search)
    {
        if (!empty($search)) {
            $query->where(function ($query) use ($search) {
                foreach ($this->filters_for_search as $filter) {
                    $query->orwhere($filter, 'LIKE', '%' . $search . '%');
                }
                return $query;
            });
        }
    }

    /**
     * Scope custom filters
     *
     * @param  QueryBuilder $query
     * @param  Request $request
     * @return QueryBuilder
     */
    public function scopeFilters($query, Request $request)
    {
        $query->filterForSearch($request->get('search'));

        return $query;
    }

    /**
     * Scope Search
     *
     * @param  QueryBuilder $query
     * @param  Request $request
     * @return QueryBuilder
     */
    public function scopeSearch($query, Request $request)
    {
        //Set query Order
        $query->order(
            $request->get('sortBy', $this->order_default),
            $request->get('direction', $this->order_default_direction)
        );

        //Set custom filters
        $query->filters($request);

        return $query;
    }

    /**
     * Scope Search with paginate results
     *
     * @param  QueryBuilder $query
     * @param  Request $request
     * @return QueryBuilder
     */
    public static function scopeResults($query, Request $request)
    {
        return $query
            ->search($request)
            ->paginate($request->get('limit', config('custom.paginate')))
        ;
    }
}