<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderOffices extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_offices', function($table)
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
        Schema::dropIfExists('ap_tender_offices');
    }
}