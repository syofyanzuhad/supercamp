<?php


return [
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut ini berisi standar pesan kesalahan yang digunakan oleh
    | kelas validasi. Beberapa aturan mempunyai multi versi seperti aturan 'size'.
    | Jangan ragu untuk mengoptimalkan setiap pesan yang ada di sini.
    |
    */
    'accepted' => 'Kolom :attribute harus diterima !',
    'active_url' => 'Kolom :attribute bukan URL yang valid !',
    'after' => 'Kolom :attribute harus tanggal setelah :date !',
    'after_or_equal' => 'Kolom :attribute harus berupa tanggal setelah atau sama dengan tanggal :date !',
    'alpha' => 'Kolom :attribute hanya boleh berisi huruf !',
    'alpha_dash' => 'Kolom :attribute hanya boleh berisi huruf, angka, dan strip !',
    'alpha_num' => 'Kolom :attribute hanya boleh berisi huruf dan angka !',
    'array' => 'Kolom :attribute harus berupa sebuah array !',
    'before' => 'Kolom :attribute harus tanggal sebelum :date !',
    'before_or_equal' => 'Kolom :attribute harus berupa tanggal sebelum atau sama dengan tanggal :date !',
    'between' => [
        'numeric' => 'Kolom :attribute harus antara :min dan :max !',
        'file' => 'Kolom :attribute harus antara :min dan :max kilobytes !',
        'string' => 'Kolom :attribute harus antara :min dan :max karakter !',
        'array' => 'Kolom :attribute harus antara :min dan :max item !',
    ],
    'boolean' => 'Kolom :attribute harus berupa true atau false',
    'confirmed' => 'Konfirmasi :attribute tidak cocok !',
    'date' => 'Kolom :attribute bukan tanggal yang valid !',
    'date_format' => 'Kolom :attribute tidak cocok dengan format :format !',
    'different' => 'Kolom :attribute dan :other harus berbeda !',
    'digits' => 'Kolom :attribute harus berupa angka :digits !',
    'digits_between' => 'Kolom :attribute harus antara angka :min dan :max !',
    'dimensions' => 'Kolom :attribute tidak memiliki dimensi gambar yang valid !',
    'distinct' => 'Kolom input :attribute memiliki nilai yang duplikat !',
    'email' => 'Kolom :attribute harus berupa alamat surel yang valid !',
    'exists' => 'Kolom :attribute yang dipilih tidak valid !',
    'file' => 'Kolom :attribute harus berupa sebuah berkas !',
    'filled' => 'Kolom :attribute harus memiliki nilai !',
    'image' => 'Kolom :attribute harus berupa gambar !',
    'in' => 'Kolom :attribute yang dipilih tidak valid !',
    'in_array' => 'Kolom input :attribute tidak terdapat dalam :other !',
    'integer' => 'Kolom :attribute harus merupakan bilangan bulat !',
    'ip' => 'Kolom :attribute harus berupa alamat IP yang valid !',
    'ipv4' => 'Kolom :attribute harus berupa alamat IPv4 yang valid !',
    'ipv6' => 'Kolom :attribute harus berupa alamat IPv6 yang valid !',
    'json' => 'Kolom :attribute harus berupa JSON string yang valid !',
    'max' => [
        'numeric' => 'Kolom :attribute seharusnya tidak lebih dari :max !',
        'file' => 'Kolom :attribute seharusnya tidak lebih dari :max kilobytes !',
        'string' => 'Kolom :attribute seharusnya tidak lebih dari :max karakter !',
        'array' => 'Kolom :attribute seharusnya tidak lebih dari :max item !',
    ],
    'mimes' => 'Kolom :attribute harus dokumen berjenis : :values !',
    'mimetypes' => 'Kolom :attribute harus dokumen berjenis : :values !',
    'min' => [
        'numeric' => 'Kolom :attribute harus minimal :min !',
        'file' => 'Kolom :attribute harus minimal :min kilobytes !',
        'string' => 'Kolom :attribute harus minimal :min karakter !',
        'array' => 'Kolom :attribute harus minimal :min item !',
    ],
    'not_in' => 'Kolom :attribute yang dipilih tidak valid !',
    'numeric' => 'Kolom :attribute harus berupa angka !',
    'present' => 'Kolom input :attribute wajib ada !',
    'regex' => 'Format input :attribute tidak valid !',
    'required' => 'Kolom input :attribute wajib diisi !',
    'required_if' => 'Kolom input :attribute wajib diisi bila :other adalah :value !',
    'required_unless' => 'Kolom input :attribute wajib diisi kecuali :other memiliki nilai :values !',
    'required_with' => 'Kolom input :attribute wajib diisi bila terdapat :values !',
    'required_with_all' => 'Kolom input :attribute wajib diisi bila terdapat :values !',
    'required_without' => 'Kolom input :attribute wajib diisi bila tidak terdapat :values !',
    'required_without_all' => 'Kolom input :attribute wajib diisi bila tidak terdapat ada :values !',
    'same' => 'Kolom :attribute dan :other harus sama !',
    'size' => [
        'numeric' => 'Kolom :attribute harus berukuran :size !',
        'file' => 'Kolom :attribute harus berukuran :size kilobyte !',
        'string' => 'Kolom :attribute harus berukuran :size karakter !',
        'array' => 'Kolom :attribute harus mengandung :size item !',
    ],
    'string' => 'Kolom :attribute harus berupa string !',
    'timezone' => 'Kolom :attribute harus berupa zona waktu yang valid !',
    'unique' => 'Kolom :attribute sudah ada sebelumnya !',
    'uploaded' => 'Kolom :attribute gagal diunggah !',
    'url' => 'Format input :attribute tidak valid !',
    /*
    |---------------------------------------------------------------------------------------
    | Baris Bahasa untuk Validasi Kustom
    |---------------------------------------------------------------------------------------
    |
    | Di sini Anda dapat menentukan pesan validasi kustom untuk atribut dengan menggunakan
    | konvensi "attribute.rule" dalam penamaan baris. Hal ini membuat cepat dalam
    | menentukan spesifik baris bahasa kustom untuk aturan atribut yang diberikan.
    |
    */
    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
    /*
    |---------------------------------------------------------------------------------------
    | Kustom Validasi Atribut
    |---------------------------------------------------------------------------------------
    |
    | Baris bahasa berikut digunakan untuk menukar atribut 'place-holders'
    | dengan sesuatu yang lebih bersahabat dengan pembaca seperti Alamat Surel daripada
    | "surel" saja. Ini benar-benar membantu kita membuat pesan sedikit bersih.
    |
    */
    'attributes' => [
    ],
];