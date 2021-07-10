<?php return [
    'plugin' => [
        'name' => 'Tender',
        'description' => '',
    ],
    'permission' => [
        'tab' => [
            'default' => 'Tender',
        ],
        'label' => [
            'access_fields' => 'Akses Bidang',
            'access_summaries' => 'Akses Kesimpulan',
            'access_positions' => 'Akses Posisi',
            'access_offices' => 'Akses Kantor',
            'access_business_entities' => 'Akses Bidang Usaha',
            'access_regions' => 'Akses Wilayah',
            'access_experience_categories' => 'Akses Kategori Pengalaman'
        ],
    ],
    'field' => [
        'singular' => 'Bidang',
        'plural' => 'Daftar Bidang',

        'id' => 'Id Bidang',
        'name' => 'Nama Bidang',
        'description' => 'Keterangan',

        'create' => 'Buat Bidang',
        'update' => 'Ubah Bidang',
        'delete' => 'Hapus Bidang',
        'order' => 'Urutan Bidang'
    ],
    'summary' => [
        'singular' => 'Kesimpulan',
        'plural' => 'Daftar Kesimpulan',

        'id' => 'Id Kesimpulan',
        'name' => 'Nama Kesimpulan',
        'description' => 'Keterangan',

        'create' => 'Buat Kesimpulan',
        'update' => 'Ubah Kesimpulan',
        'delete' => 'Hapus Kesimpulan',
        'order' => 'Urutan Kesimpulan'
    ],
    'office' => [
        'singular' => 'Kantor',
        'plural' => 'Daftar Kantor',

        'id' => 'Id Kantor',
        'name' => 'Nama Kantor',
        'description' => 'Keterangan',

        'create' => 'Buat Kantor',
        'update' => 'Ubah Kantor',
        'delete' => 'Hapus Kantor',
        'order' => 'Urutan Kantor'
    ],
    'region' => [
        'singular' => 'Wilayah',
        'plural' => 'Daftar Wilayah',

        'id' => 'Id Wilayah',
        'name' => 'Nama Wilayah',
        'lat' => 'Latitude',
        'long' => 'Longitude',
        'type' => 'Tipe Wilayah',
        'postal_codes'=> 'Kode Pos',
        'parent' => 'Induk Wilayah',

        'create' => 'Buat Wilayah',
        'update' => 'Ubah Wilayah',
        'delete' => 'Hapus Wilayah',

        'province' => 'Provinsi',
        'regency' => 'Kota/Kabupaten',
        'district' => 'Kecamatan'
    ],
    'experience_category' => [
        'singular' => 'Kategori Pengalaman',
        'plural' => 'Daftar Kategori Pengalaman',

        'id' => 'Id Kategori Pengalaman',
        'name' => 'Nama Kategori Pengalaman',
        'description' => 'Keterangan',


        'create' => 'Buat Kategori Pengalaman',
        'update' => 'Ubah Kategori Pengalaman',
        'delete' => 'Hapus Kategori Pengalaman',
        'order' => 'Urutan Kategori Pengalaman'
    ],
    'business_entity' => [
        'singular' => 'Badan Usaha',
        'plural' => 'Daftar Badan Usaha',

        'id' => 'Id Badan Usaha',
        'name' => 'Nama Badan Usaha',
        'description' => 'Keterangan',

        'create' => 'Buat Badan Usaha',
        'update' => 'Ubah Badan Usaha',
        'delete' => 'Hapus Badan Usaha',
        'order' => 'Urutan Badan Usaha'
    ],
    'global' => [
        'id' => 'Id',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'business_entity' => 'Badan Usaha',
        'yes' => 'Ya',
        'no' => 'Tidak',
        'register' => 'Daftar',
        'back' => 'Kembali',
        'doc_comment' => 'File (*pdf - max 50MB)'
    ],
    'position' => [
        'singular' => 'Jabatan',
        'plural' => 'Daftar Jabatan',

        'id' => 'Id Jabatan',
        'name' => 'Nama Jabatan',
        'description' => 'Keterangan',

        'create' => 'Buat Jabatan',
        'update' => 'Ubah Jabatan',
        'delete' => 'Hapus Jabatan',
        'order' => 'Urutan Jabatan'
    ],
    'company_experience' => [

        'singular' => 'Pengalaman Perusahaan',

        'name' => 'Nama Pengalaman',
        'region_area' => 'Luas Area (m2)',
        'region' => 'Wilayah',
        'total_income' => 'Total Pendapatan (Rp.)',
        'cooperation_period' => 'Masa Kerjasama',
        'operational_hour' => 'Jam Operasional',
        'cooperation_period_start' => 'Masa Kerjasama (Awal)',
        'cooperation_period_end' => 'Masa Kerjasama (Akhir)',
        'operational_hour_start' => 'Jam Operasional (Awal)',
        'operational_hour_end' => 'Jam Operasional (Akhir)',
        'doc_experience' => 'Dokumen Perjanjian',

        'create' => 'Buat Pengalaman Perusahaan',
        'update' => 'Ubah Pengalaman Perusahaan',
        'delete' => 'Hapus Pengalaman Perusahaan',
    ],
    'company' => [
        'name' => 'Nama Perusahaan',
        'npwp' => 'NPWP Tahun Terakhir',
        'collaborate' => 'Telah Bekerjasama dengan Angkasa Pura I sebelumnya?',

        'info' => 'Informasi Perusahaan',
        'contact' => 'Kontak Perusahaan',
        'address' => 'Alamat Perusahaan',
        
        'experience' => 'Pengalaman Perusahaan',
        'financial_ability' => 'Kemampuan Keuangan',


        'summary' => 'Kesimpulan',
        'summary_comment' => 'Silahkan cek statement yang telah tersedia pada tabel di bawah ini, kemudian klik SIMPAN untuk menyimpan
        dan dilanjutkan mengusulkan jadwal Verifikasi Dokumen.',
        'verification_office' => 'Lokasi Verifikasi Data',
        'region' => 'Wilayah',



        'contact_full_name' => 'Nama Lengkap',
        'contact_phone_number' => 'Nomor Telepon',
        'contact_position' => 'Jabatan',
        'phone_number' => 'Nomor Telepon',
        'fax_number' => 'Nomor Fax',
        'email' => 'Email',
    ],
    'company_finance' => [
        'singular' => 'Keuangan Perusahaan',

        'year' => 'Tahun',
        'total_income' => 'Total Penghasilan (Rp.)',
        'doc_finance' => 'Dokumen Keuangan',

        'doc_finance_sppkp' => 'Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)',
        'doc_finance_spt' => 'SPT Pajak Tahunan',
        'doc_finance_blp' => 'Bukti Lapor Pajak',
        'doc_finance_bsp' => 'Bukti Setoran Pajak',
        'doc_finance_sklp' => 'Surat Keterangan Kelancaran Pembayaran',
        'doc_finance_other' => 'Lainnya',
    ]
];
