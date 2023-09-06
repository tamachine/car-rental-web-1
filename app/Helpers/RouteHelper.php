<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper {
    public static function getAllRouteNames() {
        $allRoutes = Route::getRoutes();

        $routeNames = [];

        foreach ($allRoutes as $route) {
            if ($routeName = $route->getName()) {
                $routeNames[] = $routeName;
            }
        }

        return $routeNames;
    }
}