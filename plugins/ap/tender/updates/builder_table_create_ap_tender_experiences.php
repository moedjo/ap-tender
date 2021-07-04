<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderExperiences extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_experiences', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
            $table->string('name');

            $table->time('operational_hour_start')->nullable();
            $table->time('operational_hour_end')->nullable();

            $table->date('cooperation_period_start')->nullable();
            $table->date('cooperation_period_end')->nullable();

            $table->unsignedDecimal('total_income',15,0)->nullable();


            
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')
                ->on('ap_tender_companies');

            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_experiences');
    }
}
