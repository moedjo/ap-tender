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
            $table->integer('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->string('name');
        
            $table->enum('type', ['province', 'regency', 'district']);

            $table->string('postal_codes')->nullable();
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('long', 10, 7)->nullable();

            $table->integer('parent_id')->unsigned()->nullable();

            $table->primary('id');

        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_regions');
    }
}
