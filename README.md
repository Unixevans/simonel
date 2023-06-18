# SIMONEL (SYSTEM MONITORING PANEL) LATEST VERSION

Repo ini berisi source code dari projek website monitoring solar panel.
Dimana project web monitoring panel ini adalah hasil project kerjasama antara 2 jurusan SMKN 1 NGLEGOK yaitu, TKJ (Teknik Komputer Jaringan) dan TEI (Teknik Elektronika Industri). TEI memegang peran dalam IoT hardware Panel Surya meliputi, transfer data LoRa, ESP32, installasi hardware, software IoT programming dll. Sedangkan TKJ memegang peran sebagai web development yaitu, visualisasi data output yang dihasilkan oleh hardware Panel Surya dalam bentuk sebuah website yang dapat di monitoring dengan mudah kapan saja dan dimana saja.

### Dekstop View
![View On Browser](https://i.postimg.cc/HWNMZ0w2/simonel-dash.png)

### Mobile View
![View On Browser](https://i.postimg.cc/151KmBMM/20230415-135720-COLLAGE.jpg)

## [VIEW THIS WEBSITE](https://simonel.xyz)


## Descriptions

Hal penting yang ditampilkan di website ini adalah data `rata-rata` dan `tertinggi` setiap output dari dua buah `Microinventer`, antara lain output `Tegangan(Voltage)`, `Arus(Ampere)`, `Daya Nyata(Watt)`, `Daya Semu(Voltage Ampere)`, dan `Daya Reaktif(Voltage Ampere Reactive)`.


## Tech

Aplikasi web simonel ini dibangun menggunakan :
- `XAMPP versi 3.3.0`
- `Visual Studio Code`
- `PHP versi 8.2.0`
- `Javascript`
- `JQuery`
- `CanvasJS`
- `Bootstrap`
- `HTML5`
- `CSS3`

## Requirements

- `PHP version 7.3 atau diatasnya`

## Installations

Download file zip repo ini, kemudian ekstrak dan letakkan di folder `htdocs` xampp kalian

```
C:/xampp/htdocs/simonel
```

Kemudian buka xampp control panel dan jalankan server `Apache` dan `MySQL`, kemudian buat database dengan nama `simonel`, dan tabel bernama `pzem_data` dengan SQL Query berikut :

```
CREATE DATABASE simonel;
```
```
USE simonel;
```
```
CREATE TABLE pzem_data (
    id int PRIMARY KEY AUTO_INCREMENT,
    voltageA float,
    currentA float,
    dayanyataA float,
    dayasemuA float,
    dayareaktifA float,
    voltageB float,
    currentB float,
    dayanyataB float,
    dayasemuB float,
    dayareaktifB float,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
 );
```

Kemudian sesuaikan koneksi database pada masing-masing file




## Credits

> Evan Kamalludin | Tegar Dwi Arbiantoro

> Teknolab Caraka Internasional
