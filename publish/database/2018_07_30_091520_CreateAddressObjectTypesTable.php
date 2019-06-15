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
 * Class CreateAddressObjectTypesTable
 */
class CreateAddressObjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function(Blueprint $table) {
            $table->integer('KOD_T_ST')->unsigned();
            $table->integer('LEVEL')->unsigned();
            $table->string('SOCRNAME', 255);
            $table->string('SCNAME', 255);
            $table->primary('KOD_T_ST');
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
        return config('fias.table_prefix').'address_object_types';
    }
}
