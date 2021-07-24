<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderVerifications extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_verifications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('sort_order')->default(0);

            $table->string('type');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();;
            
            $table->json('fields')->nullable();;
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_verifications');
    }
}
