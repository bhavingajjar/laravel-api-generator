<?php

namespace Bhavingajjar\LaravelApiGenerator;

use Illuminate\Support\Str;

class LaravelApiGenerator
{
    const STUB_DIR = __DIR__.'/resources/stubs/';
    protected $model;
    protected $result = false;

    public function __construct(string $model)
    {
        $this->model = $model;
        self::generate();
    }

    public function generate()
    {
        self::directoryCreate();
    }

    public function directoryCreate()
    {
        if (! file_exists(base_path('app/Http/Controllers/Api'))) {
            mkdir(base_path('app/Http/Controllers/Api'));
        }
        if (! file_exists(base_path('app/Http/Resources'))) {
            mkdir(base_path('app/Http/Resources'));
        }
    }

    public function generateController()
    {
        if (! file_exists(base_path('app/Http/Controllers/Api/'.$this->model.'Controller.php'))) {
            $template = file_get_contents(self::STUB_DIR.'controller.stub');
            $template = str_replace('{{modelName}}', $this->model, $template);
            $template = str_replace('{{modelNameLower}}', strtolower($this->model), $template);
            $template = str_replace('{{modelNameCamel}}', Str::camel($this->model), $template);
            file_put_contents(base_path('app/Http/Controllers/Api/'.$this->model.'Controller.php'), $template);
            $this->result = true;
        }

        return $this->result;
    }

    public function generateResource()
    {
        if (! file_exists(base_path('app/Http/Resources/'.$this->model.'Resource.php'))) {
            $template = file_get_contents(self::STUB_DIR.'resource.stub');
            $template = str_replace('{{modelName}}', $this->model, $template);
            file_put_contents(base_path('app/Http/Resources/'.$this->model.'Resource.php'), $template);
            $this->result = true;
        }

        return $this->result;
    }

    public function generateCollection()
    {
        if (! file_exists(base_path('app/Http/Resources/'.$this->model.'Collection.php'))) {
            $template = file_get_contents(self::STUB_DIR.'collection.stub');
            $template = str_replace('{{modelName}}', $this->model, $template);
            file_put_contents(base_path('app/Http/Resources/'.$this->model.'Collection.php'), $template);
            $this->result = true;
        }

        return $this->result;
    }

    public function generateRoute()
    {
        $template = "Route::apiResource('{{modelNameLower}}', 'Api\{{modelName}}Controller');"."\n";
        $route = str_replace('{{modelNameLower}}', Str::camel(Str::plural($this->model)), $template);
        $route = str_replace('{{modelName}}', $this->model, $route);
        if (! strpos(file_get_contents(base_path('routes/api.php')), $route)) {
            file_put_contents(base_path('routes/api.php'), $route, FILE_APPEND);
            $this->result = true;
        }

        return $this->result;
    }
}
