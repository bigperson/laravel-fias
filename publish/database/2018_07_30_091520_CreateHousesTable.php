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
 * Class CreateAddressObjects
 */
class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function(Blueprint $table) {
            $table->string('HOUSEID', 255);
            $table->string('HOUSEGUID', 255);
            $table->string('AOGUID', 255);
            $table->string('HOUSENUM', 255);
            $table->string('STRSTATUS', 255);
            $table->string('ESTSTATUS', 255);
            $table->string('STATSTATUS', 255);
            $table->string('IFNSFL', 255);
            $table->string('IFNSUL', 255);
            $table->string('OKATO', 255);
            $table->string('OKTMO', 255);
            $table->string('POSTALCODE', 255);
            $table->string('STARTDATE', 255);
            $table->string('ENDDATE', 255);
            $table->string('UPDATEDATE', 255);
            $table->string('COUNTER', 255);
            $table->string('DIVTYPE', 255);
            $table->primary('HOUSEID');
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
        return config('fias.table_prefix').'houses';
    }
}
