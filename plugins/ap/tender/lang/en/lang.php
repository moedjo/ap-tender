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
        'back' => 'Kembali'
    ],
    'doc' => [
        'appointment' => 'Dokumen Perjanjian',
        'finance' => 'Laporan Keuangan',
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
    'company' => [
        'name' => 'Nama Perusahaan',
        'npwp' => 'NPWP Tahun Terakhir',
        'collaborate' => 'Telah Bekerjasama dengan Angkasa Pura I sebelumnya?',
        'info' => 'Informasi Perusahaan',
        'contact' => 'Kontak Perusahaan',
        'address' => 'Alamat Perusahaan',


        'summary' => 'Kesimpulan',
        'summary_comment' => 'Silahkan cek statement yang telah tersedia pada tabel di bawah ini, kemudian klik SIMPAN untuk menyimpan
        dan dilanjutkan mengusulkan jadwal Verifikasi Dokumen.',



        'contact_full_name' => 'Nama Lengkap',
        'contact_phone_number' => 'Nomor Telepon',
        'contact_position' => 'Jabatan',
        'phone_number' => 'Nomor Telepon',
        'fax_number' => 'Nomor Fax',
        'email' => 'Email',
    ],
    'finance' => [
        'year' => 'Tahun',
        'total_income' => 'Total Penghasilan (Rp.)'
    ]
];
