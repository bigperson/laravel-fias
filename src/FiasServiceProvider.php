<?php
declare(strict_types=1);
/**
 * This file is part of laravel-fias package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bigperson\Fias;

use Bigperson\Fias\Commands\InstallCommand;
use Bigperson\Fias\Commands\UpdateCommand;
use DB;
use Illuminate\Support\ServiceProvider;
use marvin255\fias\Pipe;
use marvin255\fias\ServiceLocator;
use marvin255\fias\service\bag\Bag;
use marvin255\fias\service\console\Logger;
use marvin255\fias\service\database\Mysql;
use marvin255\fias\service\downloader\Curl;
use marvin255\fias\service\fias\UpdateSericeSoap;
use marvin255\fias\service\filesystem\Directory;
use marvin255\fias\service\unpacker\Rar;
use marvin255\fias\service\xml\Reader;

/**
 * Class FiasServiceProvider
 */
class FiasServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../publish/config/fias.php' => config_path('fias.php')], 'config');
        $this->publishes([__DIR__.'/../publish/database/' => database_path('migrations')], 'database');
        $this->bootCommands();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Pipe::class, function ($app) {
            $dir = new Directory($app['config']['fias']['work_dir']);
            $dir->create();
            $serviceLocator = new ServiceLocator;
            $serviceLocator->register(new Logger);
            $serviceLocator->register(new Bag);
            $serviceLocator->register(new UpdateSericeSoap);
            $serviceLocator->register($dir);
            $serviceLocator->register(new Curl);
            $serviceLocator->register(new Rar);
            $serviceLocator->register(new Reader);
            $serviceLocator->register(new Mysql(DB::connection()->getPdo()));
            $pipe = new Pipe($serviceLocator);

            return $pipe;
        });
    }

    /**
     * Booting console commands.
     *
     * @return void
     */
    private function bootCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                UpdateCommand::class,
            ]);
        }
    }
}
