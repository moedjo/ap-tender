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
        'list' => 'Daftar Jabatan',
        'id' => 'Id Jabatan',
        'name' => 'Nama Jabatan',
    ],
    'region' => [
        'singular' => 'Wilayah',
        'name' => 'Nama Wilayah',
        'id' => 'Id Wilayah',
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
