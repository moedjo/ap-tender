<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderRegions extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_regions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('name');
            $table->string('description');

        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_regions');
    }
}
