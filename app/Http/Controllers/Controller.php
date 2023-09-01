<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Aborts using 404 if the result is null
     * @param object|null $result
     * @return object $result
     */
    protected function findOrfail($result): object {
        if(is_null($result)) abort('404');

        return $result;
    }
}
