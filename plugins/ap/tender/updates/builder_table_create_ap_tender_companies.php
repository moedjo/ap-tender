<?php

namespace Ap\Tender\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateApTenderCompanies extends Migration
{
    public function up()
    {
        Schema::create('ap_tender_companies', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->string('name');
            $table->string('npwp')->nullable();

            $table->boolean('collaborate')->default(false);

            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('fax_number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->string('contact_full_name')->nullable();
            $table->string('contact_phone_number')->nullable();
            $table->string('contact_email')->nullable();
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

            $table->string('kbli')->nullable();
            $table->string('business_activity')->nullable();

            $table->json('commissioners')->nullable();
            $table->json('directors')->nullable();


            $table->boolean('konsorsium')->default(false);
            $table->string('konsorsium_role')->nullable();
            $table->string('konsorsium_total')->nullable();
            $table->string('konsorsium_name')->nullable();
            $table->string('konsorsium_function')->nullable();


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
