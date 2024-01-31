# Integrasi Aplikasi dengan Sign Universitas Negeri Gorontalo menggunakan PHP

## Instalasi

Instalasi menggunakan composer :

```
composer require ung/sign-client
```

## Cara Menggunakan

### Membuat Permohonan Dokumen

```php
require(__DIR__ . "/vendor/autoload.php");

use SignClient\Config;
use SignClient\SignRequest;

Config::$isProduction = false;
Config::$clientKey = "client";
Config::$secretKey = "secret";

try {
    $params = array(
        'client_id'       => 'client_app',
        'document_id'     => 'uuid', // Dokumen ID (* disarankan UUID)
        'category'        => 'ijazah , transkrip, sertifikat, surat',
        'title'           => 'judul dokumen', // Judul Dokumen
        'assign_to'       => ['7571*****', '7572*****'], // NIK Penandatangan (* Dalam Array, Isikan Siapa saja yang akan TTE
        'document_url'    => 'https://www.africau.edu/images/default/sample.pdf', // URL File Dokumen (* Wajib Https)
        'document_status' => ['1', '2'], // Status Dokumen Yang dikirim (* Jumlah Statusnya dalam array
        'sign_symbol'     => ['#', '@'], // Simbol untuk untuk koordinat lokasi tanda tangan (ex. *,@,#,|,^,$)
        'sign_category'   => ['visible', 'invisible'], // Kategori Tanda tangan (* Visible atau Invisible
        'page_visualize'   => ['1', '2'], // Lokasi Halaman Berapa untuk visualisasi TTE (* Jika Visible
        'sign_reason'     => ['Paraf Dekan secara Elektronik', 'Tanda Tangan secara Elektronik'], // Alasan Penandatanganan
        'sign_type'       => ['image', 'image'], // Wajib isi jika category "visible"
        'sign_image'      => ['', 'https://www.africau.edu/images/default/sample.png'], // url image TTE jika type image
        'sign_width'      => ['10', '20'], // ukuran lebar qrcode/image dalam pixel
        'sign_height'     => ['10', '10'], // ukuran tinggi qrcode/image dalam pixel
    );

    $request = SignRequest::create($params);
    echo $request->message;
} catch (\Exception $e) {
    echo $e->getMessage();
}




```

### Response Callback Dari NeoSign (\*Webhook

#### Buat Satu Route Callback untuk memproses response setelah Dokumen Berhasil atau ditolak dari NeoSign

```php
require(__DIR__ . "/vendor/autoload.php");

use SignClient\Config;
use SignClient\SignResponse;

Config::$isProduction = false;
Config::$clientKey = "client";
Config::$secretKey = "secret";

try {
    $response = new SignResponse->getResponse();
}
catch (\Exception $e) {
    echo $e->getMessage();
}
```
