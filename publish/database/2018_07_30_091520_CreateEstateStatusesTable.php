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
class CreateEstateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function(Blueprint $table) {
            $table->integer('ESTSTATID')->unsigned();
            $table->string('NAME', 255);
            $table->primary('ESTSTATID');
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
        return config('fias.table_prefix').'estate_statuses';
    }
}
