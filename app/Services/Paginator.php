<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Paginator
{
    /**
     * Paginate an array or a collection.
     *
     * @param array|Collection $items
     * @param int $perPage
     * @param int|null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate($items, int $page, int $perPage = 15, array $options = []): LengthAwarePaginator
    {        
        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator(
            $items->slice($page * $perPage, $perPage)->values(),
            $items->count(),
            $perPage,
            $page + 1,
            $options
        );
    }
}
