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
class CreateAddressObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function(Blueprint $table) {
            $table->string('AOID', 255);
            $table->string('AOGUID', 255);
            $table->string('PARENTGUID', 255);
            $table->string('NEXTID', 255);
            $table->string('FORMALNAME', 255);
            $table->string('OFFNAME', 255);
            $table->string('SHORTNAME', 255);
            $table->integer('AOLEVEL')->unsigned();
            $table->string('REGIONCODE', 255);
            $table->string('AREACODE', 255);
            $table->string('AUTOCODE', 255);
            $table->string('CITYCODE', 255);
            $table->string('CTARCODE', 255);
            $table->string('PLACECODE', 255);
            $table->string('PLANCODE', 255);
            $table->string('STREETCODE', 255);
            $table->string('EXTRCODE', 255);
            $table->string('SEXTCODE', 255);
            $table->string('PLAINCODE', 255);
            $table->string('CURRSTATUS', 255);
            $table->string('ACTSTATUS', 255);
            $table->string('LIVESTATUS', 255);
            $table->string('CENTSTATUS', 255);
            $table->string('OPERSTATUS', 255);
            $table->string('IFNSFL', 255);
            $table->string('IFNSUL', 255);
            $table->string('TERRIFNSFL', 255);
            $table->string('TERRIFNSUL', 255);
            $table->string('OKATO', 255);
            $table->string('OKTMO', 255);
            $table->string('POSTALCODE', 255);
            $table->date('STARTDATE');
            $table->date('ENDDATE');
            $table->date('UPDATEDATE');
            $table->string('DIVTYPE', 255);
            $table->primary('AOID');
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
        return config('fias.table_prefix').'address_objects';
    }
}
