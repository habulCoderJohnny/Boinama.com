<?php
use Illuminate\Support\Facades\Route;

if (!function_exists('hasAnyPermission')) {
    function hasAnyPermissions($permissions): bool
    {

        return auth()->user()->hasPermission($permissions);
    }
}
if (!function_exists('getAllRoutesInArray')) {
    function getAllRoutesInArray(): array
    {
        $data = [];
        $routes = Route::getRoutes();
        foreach ($routes as $key => $route) {
            if ($route->getName() != '' && $route->getPrefix() != '' && $route->getPrefix() != '_ignition') {
                $data[$key] = [
                    "name" => $route->getName(),
                    "prefix" => $route->getPrefix(),
                ];
            }
        }
        $arr = array();
        foreach ($data as $key => $item) {
            $arr[$item['prefix']][$key] = $item;
        }
        ksort($arr, SORT_NUMERIC);

        return $arr;
    }
}