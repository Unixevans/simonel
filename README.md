# SIMONEL (SYSTEM MONITORING PANEL) LATEST VERSION

Repo ini berisi hasil source code dari projek website monitoring solar panel.

![View On Browser](https://i.postimg.cc/151KmBMM/20230415-135720-COLLAGE.jpg)
[VIEW THIS WEBSITE](https://elgaarisprastyo.com)


## Description

Hal penting yang ditampilkan di website ini adalah data `rata-rata` dan `tertinggi` setiap output dari dua buah `Microinventer`, antara lain output `Tegangan(Voltage)`, `Arus(Ampere)`, `Daya Nyata(Watt)`, `Daya Semu(Voltage Ampere)`, dan `Daya Reaktif(Voltage Ampere Reactive)`.


## Tech

Aplikasi web simonel ini dibangun menggunakan :
- `XAMPP`
- `Visual Studio Code`
- `PHP`
- `Javascript`
- `JQuery`
- `CanvasJS`
- `Bootstrap`
- `HTML`
- `CSS`


## Installation

Download file zip repo ini, kemudian ekstrak dan letakkan di folder `htdocs` xampp kalian

```
C:/xampp/htdocs/simonel
```

Kemudian buka xampp control panel dan jalankan server `Apache` dan `MySQL`, kemudian buat database dengan nama `simonel`, dan tabel bernama pzem_data dengan SQL Query berikut :

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




## Credit

> Evan Kamalludin | Tegar Dwi Arbiantoro

> Teknolab Caraka Internasional
