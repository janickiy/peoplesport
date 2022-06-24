<?php

namespace App\Nova;

use Illuminate\Support\Str;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Resource as NovaResource;

abstract class Resource extends NovaResource
{
    public static $relatableEdits = [];

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a Scout search query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Laravel\Scout\Builder  $query
     * @return \Laravel\Scout\Builder
     */
    public static function scoutQuery(NovaRequest $request, $query)
    {
        return $query;
    }

    /**
     * Build a "detail" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function detailQuery(NovaRequest $request, $query)
    {
        return parent::detailQuery($request, $query);
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(NovaRequest $request, $query)
    {
        return parent::relatableQuery($request, $query);
    }

    /**
     * @param NovaRequest $request
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param \Illuminate\Support\Collection $fields
     * @return array
     */
    protected static function fillFields(NovaRequest $request, $model, $fields)
    {
        if (!static::$relatableEdits) {
            return parent::fillFields($request, $model, $fields);
        }

        $count = 0;
        $filters = array_map(function ($relatable) {
            return $relatable . '_';
        }, static::$relatableEdits);
        $relations = [];

        foreach ($filters as $filter) {
            $relations[Str::replaceFirst('_', '', $filter)] = self::rejectAndFlattenRelation($filter, $request);
        }

        $result = parent::fillFields($request, $model, $fields);

        foreach ($relations as $method => $relation) {
            $result[++$count][] = function () use ($relation, $method, $model) {
                $model->{$method}()->updateOrCreate([], $relation);
            };
        }

        return $result;
    }

    /**
     * @param $filter
     * @param $request
     * @return array
     */
    private static function rejectAndFlattenRelation($filter, &$request)
    {
        $input = collect($request->all());

        $relatableFields = $input->reject(function ($item, $key) use ($filter) {
            return strpos($key, $filter) === false;
        });

        $request->except($relatableFields->toArray());

        return $relatableFields->flatMap(function ($item, $key) use ($filter) {
            return [Str::replaceFirst($filter, '', $key) => $item];
        })->toArray();
    }
}
