<?php

namespace App\Classes;

use Illuminate\Routing\Router as BaseRouter;
use Illuminate\Support\Str;

class Router extends BaseRouter
{
    public array $customApiResourceMethods = ['restore', 'forceDelete', 'migrate'];
    public array $customResourceMethods = [];

    public function customApiResource($name, $controller, array $options = [])
    {
        $model = Str::singular($name); // this is optional, i need it for Route Model Binding

        foreach ($this->customApiResourceMethods as $v) {
            $this->get( // set the http methods
                $name . '/{' . $model . '}/'.Str::snake($v, '-'),
                $controller . '@'.$v
            )->name($name . '.'.$v);
        }

        return $this->apiResource($name, $controller, $options);
    }

    public function customResource($name, $controller, array $options = [])
    {
        $model = Str::singular($name); // this is optional, i need it for Route Model Binding

        $this
            ->get( // set the http methods
                $name . '/{' . $model . '}/audit',
                $controller . '@audit'
            )->name($name . '.audit');

        return $this->resource($name, $controller, $options);
    }
}
