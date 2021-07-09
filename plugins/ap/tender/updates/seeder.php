<?php

use Ap\Tender\Models\BusinessEntity;
use Ap\Tender\Models\Position;
use Ap\Tender\Models\Region;
use Ap\Tender\Models\Summary;
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

        // Summary
        Summary::create([
            'name' => 'Pajak',
            'description' => 'Tidak memiliki permasalahan hukum terkait pajak dalam 5 (lima) tahun terakhir',
        ]);

        Summary::create([
            'name' => 'Undang-undang tenaga kerja',
            'description' => 'Tidak memiliki permasalahan hukum terkait tindakan yang bertentangan dengan undang-undang tenaga kerja dalam 5 (lima) tahun terakhir',
        ]);

        Summary::create([
            'name' => 'Bangkrut',
            'description' => 'Tidak pernah dinyatakan pailit / bangkrut',
        ]);
        Summary::create([
            'name' => 'Laporan Pajak',
            'description' => 'Memiliki laporan pajak yang benar dan akurat',
        ]);
        Summary::create([
            'name' => 'Legalitas',
            'description' => 'Perusahaan dan Direksi perusahaan peserta tender tidak terlibat dalam permasalahan legal/hukum dalam hal apapun selama 5 (lima) tahun',
        ]);

        Summary::create([
            'name' => 'Permasalahan Hukum',
            'description' => 'Perusahaan peserta tender tidak memiliki catatan permasalahan hukum dan tidak dalam blacklist pada tender sejenis dalam 5 (lima) tahun',
        ]);
    }

}