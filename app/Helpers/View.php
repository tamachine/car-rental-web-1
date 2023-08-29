<?php

/**
 * Gathering place for any little helper functions focused on the app frontend.
 * This file is autoloaded by composer.json
 */

 if (!function_exists('selectedCurrency')) {
    /**
     * Returns the selected currency
     *
     * @return     string
     */
    function selectedCurrency()
    {
        return session('currency') !== null ? session('currency') : config('settings.default_currency');
    }
 }

 if (!function_exists('getBreadcrumb')) {

    function getBreadcrumb($routes = []) {
        $breadcrumbs = new App\Services\Breadcrumbs\Breadcrumbs();
        $breadcrumb = [];

        foreach($routes as $route) {            
            $currentBreadcrumb = $breadcrumbs->getBreadcrumbByRoute($route);
            
            if (!$currentBreadcrumb) {
                $currentBreadcrumb = new App\Services\Breadcrumbs\Breadcrumb();
                $currentBreadcrumb->setText($route);
                $currentBreadcrumb->setLink('#');
            }

            $breadcrumb[] = $currentBreadcrumb;
        }

        return $breadcrumb;
    }
}
