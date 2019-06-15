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
 * Class CreateSteadsTable
 */
class CreateSteadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->getTable(), function(Blueprint $table) {
            $table->string('STEADGUID', 255);
            $table->string('NUMBER', 255);
            $table->string('REGIONCODE', 255);
            $table->string('POSTALCODE', 255);
            $table->string('IFNSFL', 255);
            $table->string('IFNSUL', 255);
            $table->string('OKATO', 255);
            $table->string('UPDATEDATE', 255);
            $table->string('PARENTGUID', 255);
            $table->string('STEADID', 255);
            $table->string('OPERSTATUS', 255);
            $table->string('STARTDATE', 255);
            $table->string('ENDDATE', 255);
            $table->string('OKTMO', 255);
            $table->string('LIVESTATUS', 255);
            $table->string('DIVTYPE', 255);
            $table->string('NORMDOC', 255);
            $table->primary('STEADGUID');
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
        return config('fias.table_prefix').'steads';
    }
}
