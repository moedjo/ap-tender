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

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->string('on_note')->nullable();
            $table->boolean('on_check')->default(false);

            $table->string('off_note')->nullable();
            $table->boolean('off_check')->default(false);

            $table->primary(['company_id', 'verification_id'], 'company_verification');
            
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_companies_verifications');
    }
}
