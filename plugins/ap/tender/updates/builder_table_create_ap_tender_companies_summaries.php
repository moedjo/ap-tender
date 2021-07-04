<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderCompaniesSummaries extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_companies_summaries', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('company_id')->unsigned();
            $table->integer('summary_id')->unsigned();
            $table->primary(['company_id', 'summary_id'], 'company_summary');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_companies_summaries');
    }
}
