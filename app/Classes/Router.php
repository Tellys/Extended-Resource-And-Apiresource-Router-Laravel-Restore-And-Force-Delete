<?php

namespace App\Classes;

use Illuminate\Routing\Router as BaseRouter;
use Illuminate\Support\Str;

class Router extends BaseRouter
{
    public array $customApiResourceMethods = ['put' => ['restore', true], 'delete' => ['forceDelete', true], 'get' => 'migrate'];
    public array $customResourceMethods = [];

    public function customApiResource($name, $controller, array $options = [])
    {
        $model = Str::singular($name); // this is optional, i need it for Route Model Binding

        foreach ($this->customApiResourceMethods as $k => $v) {
            $modelInUrl = false;
            $setModel = '';

            if (is_array($v)) {
                list($v, $modelInUrl) = $v;
            }

            if ($modelInUrl) {
                $setModel = '{' . str_replace('-', '_', $model) . '}/';
            }

            $this->addRoute(
                strtoupper($k ?? 'get'),
                $name . '/' . $setModel . Str::snake($v, '-'),
                $controller . '@' . $v
            )
                ->name($name . '.' . $v);
        }

        return $this->apiResource($name, $controller, $options);
    }

    public function customResource($name, $controller, array $options = [])
    {
        $model = Str::singular($name); // this is optional, i need it for Route Model Binding

        foreach ($this->customResourceMethods as $k => $v) {
            $modelInUrl = false;
            $setModel = '';

            if (is_array($v)) {
                list($v, $modelInUrl) = $v;
            }

            if ($modelInUrl) {
                $setModel = '{' . str_replace('-', '_', $model) . '}/';
            }

            $this->addRoute(
                strtoupper($k ?? 'get'),
                $name . '/' . $setModel . Str::snake($v, '-'),
                $controller . '@' . $v
            )
                ->name($name . '.' . $v);
        }
    }
}
