<?php
declare(strict_types=1);
/**
 * This file is part of laravel-fias package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bigperson\Fias\Commands;

use ATehnix\VkClient\Client;
use Illuminate\Console\Command;

abstract class AbstractCommand extends Command
{
    /**
     * @param string $table
     * @return string
     */
    protected function getTable($table)
    {
        return config('fias.table_prefix').$table;
    }
}
