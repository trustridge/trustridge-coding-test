<?php
declare(strict_types=1);

namespace App\Console\Commands\MakeCommand;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

/**
 * Responder作成コマンド
 * php article make:responder [ResourceName]@[ActionName]
 */
class ResponderMakeCommand extends GeneratorCommand
{
    /** @var string */
    protected $name = 'make:responder';

    /** @var string */
    protected $description = 'Create a new responder class';

    /** @var string */
    protected $type = 'Responder';

    /**
     * @return string
     */
    protected function getStub()
    {
        return base_path('/stubs/responder.stub');
    }

    /**
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Http\Responders';
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

        $name = $resourceName.'/'.$resourceName.$actionName.'Responder';

        return parent::qualifyClass($name);
    }
}
