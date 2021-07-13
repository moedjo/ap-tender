<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderFieldsSummaries extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_companies_fields', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('company_id')->unsigned();
            $table->integer('field_id')->unsigned();
            $table->primary(['company_id', 'field_id'], 'company_field');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_companies_fields');
    }
}
