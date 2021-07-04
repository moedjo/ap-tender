<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderFinances extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_finances', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->unsignedInteger('year');
            $table->unsignedDecimal('total_income',15,0)->nullable();

            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')
                ->on('ap_tender_companies');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_finances');
    }
}
