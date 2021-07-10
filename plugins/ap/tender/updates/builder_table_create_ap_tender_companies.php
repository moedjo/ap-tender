<?php namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderCompanies extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_companies', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            
            $table->string('name');
            $table->string('npwp');

            $table->boolean('collaborate');

            $table->string('address');
            $table->string('phone_number');
            $table->string('fax_number');
            $table->string('email');

            $table->string('contact_full_name');
            $table->string('contact_phone_number');
            $table->string('contact_email');
            $table->integer('contact_position_id')->unsigned()->nullable();
            $table->foreign('contact_position_id')->references('id')
                ->on('ap_tender_positions');


            $table->string('pic_full_name')->nullable();
            $table->string('pic_phone_number')->nullable();
            $table->string('pic_email')->nullable();
            $table->string('pic_ktp')->nullable();
            $table->integer('pic_position_id')->unsigned()->nullable();
            $table->foreign('pic_position_id')->references('id')
                ->on('ap_tender_positions');

            
            $table->json('qualification')->nullable();

            $table->json('commissioner')->nullable();
            $table->json('director')->nullable();

            $table->string('website')->nullable();

            $table->boolean('konsorsium')->default(false);


            $table->string('status')->nullable();
            $table->string('token')->nullable();
            $table->string('token_url')->nullable();



            $table->integer('business_entity_id')->unsigned()->nullable();
            $table->foreign('business_entity_id')->references('id')
                ->on('ap_tender_business_entities');

          

            $table->integer('verification_office_id')->unsigned()->nullable();
            $table->foreign('verification_office_id')->references('id')
                ->on('ap_tender_offices');

            $table->integer('region_id')->unsigned()->nullable();
            $table->foreign('region_id')->references('id')
                ->on('ap_tender_regions');

                // TODO see backend user

            
            // $table->integer('region_id')->unsigned()->nullable();
            // $table->foreign('region_id')->references('id')
            //     ->on('ap_tender_regions');
                
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('ap_tender_companies');
    }
}
