<?php

namespace Bhavingajjar\LaravelApiGenerator;

use Illuminate\Support\Str;

class LaravelApiGenerator
{
    const STUB_DIR = __DIR__ . '/resources/stubs/';
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
        self::generate();
    }

    public function generate()
    {
        self::directoryCreate();
        self::generateResource();
        self::generateCollection();
        self::generateController();
        self::generateRoute();
    }

    public function generateResource()
    {
        $template = file_get_contents(self::STUB_DIR . 'resource.stub');
        $template = str_replace('{{modelName}}', $this->model, $template);
        file_put_contents(base_path('app/Http/Resources/' . $this->model . 'Resource.php'), $template);
    }

    public function generateCollection()
    {
        $template = file_get_contents(self::STUB_DIR . 'collection.stub');
        $template = str_replace('{{modelName}}', $this->model, $template);
        file_put_contents(base_path('app/Http/Resources/' . $this->model . 'Collection.php'), $template);
    }

    public function generateController()
    {
        $template = file_get_contents(self::STUB_DIR . 'controller.stub');
        $template = str_replace('{{modelName}}', $this->model, $template);
        $template = str_replace('{{modelNameLower}}', strtolower($this->model), $template);
        file_put_contents(base_path('app/Http/Controllers/Api/' . $this->model . 'Controller.php'), $template);
    }

    public function generateRoute()
    {
        $template = "Route::apiResource('{{modelNameLower}}', 'Api\{{modelName}}Controller');";
        $route = str_replace('{{modelNameLower}}', strtolower(Str::plural($this->model)), $template);
        $route = str_replace('{{modelName}}', $this->model, $route);
        file_put_contents(base_path('routes/api.php'), $route, FILE_APPEND);
    }

    public function directoryCreate()
    {
        if (!file_exists(base_path('app/Http/Controllers/Api'))) {
            mkdir(base_path('app/Http/Controllers/Api'));
        }
        if (!file_exists(base_path('app/Http/Resources'))) {
            mkdir(base_path('app/Http/Resources'));
        }
    }
}
