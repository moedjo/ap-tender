<?php

use Ap\Tender\Models\BusinessEntity;
use Ap\Tender\Models\Position;
use Ap\Tender\Models\Region;
use October\Rain\Database\Updates\Seeder as UpdatesSeeder;

class Seeder extends UpdatesSeeder{


    public function run(){

        BusinessEntity::create([
            'name' => 'PT',
            'description' => 'Perseroan Terbatas'
        ]);

        BusinessEntity::create([
            'name' => 'CV',
            'description' => 'Perseroan Komanditer'
        ]);

        BusinessEntity::create([
            'name' => 'Firma',
            'description' => 'Firma'
        ]);

        Position::create([

            'name' => 'CEO',
            'description' => 'CEO'
        ]);


        Region::create([

            'name' => 'jakarta',
            'description' => 'CEO'
        ]);

        Region::create([

            'name' => 'Bogor',
            'description' => 'CEO'
        ]);

    }

}