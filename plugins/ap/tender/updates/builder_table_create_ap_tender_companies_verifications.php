<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderCompaniesVerifications extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_companies_verifications', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('company_id')->unsigned();
            $table->integer('verification_id')->unsigned();

            $table->string('on_legal_note')->nullable();
            $table->string('on_finance_note')->nullable();
            $table->string('on_commercial_note')->nullable();
            $table->string('on_last_note')->nullable();

            $table->boolean('on_legal_check')->default(false);
            $table->boolean('on_finance_check')->default(false);
            $table->boolean('on_commercial_check')->default(false);
            $table->boolean('on_last_check')->default(false);

            $table->string('off_legal_note')->nullable();
            $table->string('off_finance_note')->nullable();
            $table->string('off_commercial_note')->nullable();
            $table->string('off_last_note')->nullable();

            $table->boolean('off_legal_check')->default(false);
            $table->boolean('off_finance_check')->default(false);
            $table->boolean('off_commercial_check')->default(false);
            $table->boolean('off_last_check')->default(false);


            $table->primary(['company_id', 'verification_id'], 'company_verification');
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_companies_verifications');
    }
}
