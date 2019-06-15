<?php
declare(strict_types=1);
/**
 * This file is part of laravel-fias package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEstateStatusesTable
 */
class CreateHouseStateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function(Blueprint $table) {
            $table->integer('HOUSESTID')->unsigned();
            $table->string('NAME', 255);
            $table->primary('HOUSESTID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->getTable());
    }

    /**
     * @return string
     */
    private function getTable()
    {
        return config('fias.table_prefix').'house_state_statuses';
    }
}
