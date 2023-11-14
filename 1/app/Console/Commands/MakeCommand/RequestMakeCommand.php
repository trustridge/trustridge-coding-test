<?php
declare(strict_types=1);

namespace App\Console\Commands\MakeCommand;

use Illuminate\Foundation\Console\RequestMakeCommand as BaseRequestMakeCommand;
use Illuminate\Support\Str;

/**
 * FormRequest作成コマンド
 * php article make:request [ResourceName]@[ActionName]
 */
class RequestMakeCommand extends BaseRequestMakeCommand
{
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

        $name = $resourceName.'/'.$resourceName.$actionName.'Request';

        return parent::qualifyClass($name);
    }
}
