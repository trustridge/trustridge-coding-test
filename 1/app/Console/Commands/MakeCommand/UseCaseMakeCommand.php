<?php

namespace App\Console\Commands\MakeCommand;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

/**
 * UseCase作成コマンド
 * php article make:usecase [ResourceName]@[ActionName]
 */
class UseCaseMakeCommand extends GeneratorCommand
{
    /** @var string */
    protected $name = 'make:usecase';

    /** @var string */
    protected $description = 'Create a new usecase class';

    /** @var string */
    protected $type = 'UseCase';

    /**
     * @return string
     */
    protected function getStub()
    {
        return base_path('/stubs/usecase.stub');
    }

    /**
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\UseCases';
    }

    /**
     * @param  string  $name
     * @return string
     */
    protected function qualifyClass($name)
    {
        if (strpos($name, '@') === false) {
            return parent::qualifyClass($name);
        }

        [$resourceName, $actionName] = array_map(
            fn ($v) => Str::studly($v),
            explode('@', $name)
        );

        $name = $resourceName.'/'.$resourceName.$actionName.'UseCase';

        return parent::qualifyClass($name);
    }
}
