<?php

// -------
$connect = mysqli_connect("localhost", "root", "", "simonell");

// Syntax Query for Data Sumbu X
$tanggal = mysqli_query($connect, "SELECT created_at FROM pzem_data ORDER BY ID ASC");

// -------
$now = new DateTime();
$tgl_real = $now->format('Y-m-d');

// Syntax Query for Data Sumbu Y 
if (!isset($_POST['submit'])) {
    $voltageA = mysqli_query($connect, "SELECT voltageA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $currentA = mysqli_query($connect, "SELECT currentA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $dayasemuA = mysqli_query($connect, "SELECT dayasemuA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $dayanyataA = mysqli_query($connect, "SELECT dayanyataA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $dayareaktifA = mysqli_query($connect, "SELECT dayareaktifA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    // -----------------------------------------------------------------------------------
    $voltageB = mysqli_query($connect, "SELECT voltageB FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $currentB = mysqli_query($connect, "SELECT currentB FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $dayasemuB = mysqli_query($connect, "SELECT dayasemuB FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $dayanyataB = mysqli_query($connect, "SELECT dayanyataB FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    $dayareaktifB = mysqli_query($connect, "SELECT dayareaktifB FROM pzem_data WHERE DATE(created_at) = '$tgl_real' ORDER BY ID ASC");
    // -----------------------------------------------------------------------------------

    // SYNTAX FOR MICRO A
    // Higher Voltage A
    $result_hgh_ta = mysqli_query($connect, "SELECT MAX(voltageA) as max_teg_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_ta = mysqli_fetch_array($result_hgh_ta);
    $max_teg_a = $higher_ta['max_teg_a'];
    $max_teg_a_formatted = number_format($max_teg_a, 1);
    // Average Voltage A
    $result_avg_ta = mysqli_query($connect, "SELECT AVG(voltageA) as avg_teg_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_ta = mysqli_fetch_array($result_avg_ta);
    $avg_teg_a = $avg_ta["avg_teg_a"];
    $avg_teg_a_formatted = number_format($avg_teg_a, 1);

    // ----------------

    // Higher Current A
    $result_ca = mysqli_query($connect, "SELECT MAX(currentA) as max_curr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_ca = mysqli_fetch_array($result_ca);
    $max_curr_a = $higher_ca['max_curr_a'];
    $max_curr_a_formatted = number_format($max_curr_a, 1);
    // Average Current A
    $result_aa = mysqli_query($connect, "SELECT AVG(currentA) as avg_curr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_ca = mysqli_fetch_array($result_aa);
    $avg_curr_a = $avg_ca["avg_curr_a"];
    $avg_curr_a_formatted = number_format($avg_curr_a, 1);

    // ---------
    // Higher Daya Semu A
    $result_hgh_ds_a = mysqli_query($connect, "SELECT MAX(dayasemuA) as max_ds_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_ds_a = mysqli_fetch_array($result_hgh_ds_a);
    $max_ds_a = $higher_ds_a['max_ds_a'];
    $max_ds_a_formatted = number_format($max_ds_a, 1);
    // Average Daya Semu A
    $result_avg_ds_a = mysqli_query($connect, "SELECT AVG(dayasemuA) as avg_ds_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_dsa = mysqli_fetch_array($result_avg_ds_a);
    $avg_ds_a = $avg_dsa["avg_ds_a"];
    $avg_ds_a_formatted = number_format($avg_ds_a, 1);

    // ---------
    // Higher Daya Nyata A
    $result_hgh_dn_a = mysqli_query($connect, "SELECT MAX(dayanyataA) as max_dn_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_dn_a = mysqli_fetch_array($result_hgh_dn_a);
    $max_dn_a = $higher_dn_a['max_dn_a'];
    $max_dn_a_formatted = number_format($max_dn_a, 1);
    // Average Daya Nyata A
    $result_avg_dn_a = mysqli_query($connect, "SELECT AVG(dayanyataA) as avg_dn_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_dna = mysqli_fetch_array($result_avg_dn_a);
    $avg_dn_a = $avg_dna["avg_dn_a"];
    $avg_dn_a_formatted = number_format($avg_dn_a, 1);

    // ---------
    // Higher Daya Reaktif A
    $result_hgh_dr_a = mysqli_query($connect, "SELECT MAX(dayareaktifA) as max_dr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_dr_a = mysqli_fetch_array($result_hgh_dr_a);
    $max_dr_a = $higher_dr_a['max_dr_a'];
    $max_dr_a_formatted = number_format($max_dr_a, 1);
    // Average Daya Reaktif A
    $result_avg_dr_a = mysqli_query($connect, "SELECT AVG(dayareaktifA) as avg_dr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_dra = mysqli_fetch_array($result_avg_dr_a);
    $avg_dr_a = $avg_dra["avg_dr_a"];
    $avg_dr_a_formatted = number_format($avg_dr_a, 1);

    // ---------
    // SYNTAX FOR MICRO B
    // Higher Voltage B
    $result_hgh_tb = mysqli_query($connect, "SELECT MAX(voltageB) as max_teg_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_tb = mysqli_fetch_array($result_hgh_tb);
    $max_teg_b = $higher_tb['max_teg_b'];
    $max_teg_b_formatted = number_format($max_teg_b, 1);
    // Average Voltage B
    $result_avg_tb = mysqli_query($connect, "SELECT AVG(voltageA) as avg_teg_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_tb = mysqli_fetch_array($result_avg_tb);
    $avg_teg_b = $avg_tb["avg_teg_b"];
    $avg_teg_b_formatted = number_format($avg_teg_b, 1);

    // ----------------

    // Higher Current B
    $result_cb = mysqli_query($connect, "SELECT MAX(currentB) as max_curr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_cb = mysqli_fetch_array($result_cb);
    $max_curr_b = $higher_cb['max_curr_b'];
    $max_curr_b_formatted = number_format($max_curr_b, 1);
    // Average Current B
    $result_ab = mysqli_query($connect, "SELECT AVG(currentB) as avg_curr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_cb = mysqli_fetch_array($result_ab);
    $avg_curr_b = $avg_cb["avg_curr_b"];
    $avg_curr_b_formatted = number_format($avg_curr_b, 1);

    // ---------
    // Higher Daya Semu B
    $result_hgh_ds_b = mysqli_query($connect, "SELECT MAX(dayasemuB) as max_ds_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_ds_b = mysqli_fetch_array($result_hgh_ds_b);
    $max_ds_b = $higher_ds_b['max_ds_b'];
    $max_ds_b_formatted = number_format($max_ds_b, 1);
    // Average Daya Semu B
    $result_avg_ds_b = mysqli_query($connect, "SELECT AVG(dayasemuB) as avg_ds_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_dsb = mysqli_fetch_array($result_avg_ds_b);
    $avg_ds_b = $avg_dsb["avg_ds_b"];
    $avg_ds_b_formatted = number_format($avg_ds_b, 1);

    // ---------
    // Higher Daya Nyata B
    $result_hgh_dn_b = mysqli_query($connect, "SELECT MAX(dayanyataB) as max_dn_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_dn_b = mysqli_fetch_array($result_hgh_dn_b);
    $max_dn_b = $higher_dn_b['max_dn_b'];
    $max_dn_b_formatted = number_format($max_dn_b, 1);
    // Average Daya Nyata B
    $result_avg_dn_b = mysqli_query($connect, "SELECT AVG(dayanyataB) as avg_dn_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_dnb = mysqli_fetch_array($result_avg_dn_b);
    $avg_dn_b = $avg_dnb["avg_dn_b"];
    $avg_dn_b_formatted = number_format($avg_dn_b, 1);

    // ---------
    // Higher Daya Reaktif B
    $result_hgh_dr_b = mysqli_query($connect, "SELECT MAX(dayareaktifB) as max_dr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher_dr_b = mysqli_fetch_array($result_hgh_dr_b);
    $max_dr_b = $higher_dr_b['max_dr_b'];
    $max_dr_b_formatted = number_format($max_dr_b, 1);
    // Average Daya Reaktif B
    $result_avg_dr_b = mysqli_query($connect, "SELECT AVG(dayareaktifB) as avg_dr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg_drb = mysqli_fetch_array($result_avg_dr_b);
    $avg_dr_b = $avg_drb["avg_dr_b"];
    $avg_dr_b_formatted = number_format($avg_dr_b, 1);

    // ---------














    // syntax for the scroll
    $query_data = mysqli_query($connect, "SELECT voltageA FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");

    // -----
    $int_tgl = $tgl_real;
    $tgl_arr = explode('-', $int_tgl);
    $tgl_ = $tgl_arr[0];
    $bln_ = $tgl_arr[1];
    $thn_ = $tgl_arr[2];

    // -----
    $tgl_tgl = strtotime("$thn_-$bln_-$tgl_");
    $tgl_bln = date('d-m', $tgl_tgl);
    $tgl_bln_thn = date('Y-m-d', $tgl_tgl);
} else {
    $tgl_awal = $_POST['date_start'];

    // CONDITION
    // -----------------------------------------------------------------------------------
    $voltageA = mysqli_query($connect, "SELECT voltageA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $currentA = mysqli_query($connect, "SELECT currentA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $dayasemuA = mysqli_query($connect, "SELECT dayasemuA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $dayanyataA = mysqli_query($connect, "SELECT dayanyataA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $dayareaktifA = mysqli_query($connect, "SELECT dayareaktifA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    // -----------------------------------------------------------------------------------
    $voltageB = mysqli_query($connect, "SELECT voltageB FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $currentB = mysqli_query($connect, "SELECT currentB FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $dayasemuB = mysqli_query($connect, "SELECT dayasemuB FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $dayanyataB = mysqli_query($connect, "SELECT dayanyataB FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    $dayareaktifB = mysqli_query($connect, "SELECT dayareaktifB FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' ORDER BY ID ASC");
    // -----------------------------------------------------------------------------------

    // SYNTAX FOR MICRO A
    // Higher Voltage A
    $result_hgh_ta = mysqli_query($connect, "SELECT MAX(voltageA) as max_teg_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_ta = mysqli_fetch_array($result_hgh_ta);
    $max_teg_a = $higher_ta['max_teg_a'];
    $max_teg_a_formatted = number_format($max_teg_a, 1);
    // Average Voltage A
    $result_avg_ta = mysqli_query($connect, "SELECT AVG(voltageA) as avg_teg_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_ta = mysqli_fetch_array($result_avg_ta);
    $avg_teg_a = $avg_ta["avg_teg_a"];
    $avg_teg_a_formatted = number_format($avg_teg_a, 1);

    // ----------------

    // Higher Current A
    $result_ca = mysqli_query($connect, "SELECT MAX(currentA) as max_curr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_ca = mysqli_fetch_array($result_ca);
    $max_curr_a = $higher_ca['max_curr_a'];
    $max_curr_a_formatted = number_format($max_curr_a, 1);
    // Average Current A
    $result_aa = mysqli_query($connect, "SELECT AVG(currentA) as avg_curr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_ca = mysqli_fetch_array($result_aa);
    $avg_curr_a = $avg_ca["avg_curr_a"];
    $avg_curr_a_formatted = number_format($avg_curr_a, 1);

    // ---------
    // Higher Daya Semu A
    $result_hgh_ds_a = mysqli_query($connect, "SELECT MAX(dayasemuA) as max_ds_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_ds_a = mysqli_fetch_array($result_hgh_ds_a);
    $max_ds_a = $higher_ds_a['max_ds_a'];
    $max_ds_a_formatted = number_format($max_ds_a, 1);
    // Average Daya Semu A
    $result_avg_ds_a = mysqli_query($connect, "SELECT AVG(dayasemuA) as avg_ds_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_dsa = mysqli_fetch_array($result_avg_ds_a);
    $avg_ds_a = $avg_dsa["avg_ds_a"];
    $avg_ds_a_formatted = number_format($avg_ds_a, 1);

    // ---------
    // Higher Daya Nyata A
    $result_hgh_dn_a = mysqli_query($connect, "SELECT MAX(dayanyataA) as max_dn_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_dn_a = mysqli_fetch_array($result_hgh_dn_a);
    $max_dn_a = $higher_dn_a['max_dn_a'];
    $max_dn_a_formatted = number_format($max_dn_a, 1);
    // Average Daya Nyata A
    $result_avg_dn_a = mysqli_query($connect, "SELECT AVG(dayanyataA) as avg_dn_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_dna = mysqli_fetch_array($result_avg_dn_a);
    $avg_dn_a = $avg_dna["avg_dn_a"];
    $avg_dn_a_formatted = number_format($avg_dn_a, 1);

    // ---------
    // Higher Daya Reaktif A
    $result_hgh_dr_a = mysqli_query($connect, "SELECT MAX(dayareaktifA) as max_dr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_dr_a = mysqli_fetch_array($result_hgh_dr_a);
    $max_dr_a = $higher_dr_a['max_dr_a'];
    $max_dr_a_formatted = number_format($max_dr_a, 1);
    // Average Daya Reaktif A
    $result_avg_dr_a = mysqli_query($connect, "SELECT AVG(dayareaktifA) as avg_dr_a FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_dra = mysqli_fetch_array($result_avg_dr_a);
    $avg_dr_a = $avg_dra["avg_dr_a"];
    $avg_dr_a_formatted = number_format($avg_dr_a, 1);

    // ---------
    // SYNTAX FOR MICRO B
    // Higher Voltage B
    $result_hgh_tb = mysqli_query($connect, "SELECT MAX(voltageB) as max_teg_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_tb = mysqli_fetch_array($result_hgh_tb);
    $max_teg_b = $higher_tb['max_teg_b'];
    $max_teg_b_formatted = number_format($max_teg_b, 1);
    // Average Voltage B
    $result_avg_tb = mysqli_query($connect, "SELECT AVG(voltageA) as avg_teg_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_tb = mysqli_fetch_array($result_avg_tb);
    $avg_teg_b = $avg_tb["avg_teg_b"];
    $avg_teg_b_formatted = number_format($avg_teg_b, 1);

    // ----------------

    // Higher Current B
    $result_cb = mysqli_query($connect, "SELECT MAX(currentB) as max_curr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_cb = mysqli_fetch_array($result_cb);
    $max_curr_b = $higher_cb['max_curr_b'];
    $max_curr_b_formatted = number_format($max_curr_b, 1);
    // Average Current B
    $result_ab = mysqli_query($connect, "SELECT AVG(currentB) as avg_curr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_cb = mysqli_fetch_array($result_ab);
    $avg_curr_b = $avg_cb["avg_curr_b"];
    $avg_curr_b_formatted = number_format($avg_curr_b, 1);

    // ---------
    // Higher Daya Semu B
    $result_hgh_ds_b = mysqli_query($connect, "SELECT MAX(dayasemuB) as max_ds_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_ds_b = mysqli_fetch_array($result_hgh_ds_b);
    $max_ds_b = $higher_ds_b['max_ds_b'];
    $max_ds_b_formatted = number_format($max_ds_b, 1);
    // Average Daya Semu B
    $result_avg_ds_b = mysqli_query($connect, "SELECT AVG(dayasemuB) as avg_ds_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_dsb = mysqli_fetch_array($result_avg_ds_b);
    $avg_ds_b = $avg_dsb["avg_ds_b"];
    $avg_ds_b_formatted = number_format($avg_ds_b, 1);

    // ---------
    // Higher Daya Nyata B
    $result_hgh_dn_b = mysqli_query($connect, "SELECT MAX(dayanyataB) as max_dn_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_dn_b = mysqli_fetch_array($result_hgh_dn_b);
    $max_dn_b = $higher_dn_b['max_dn_b'];
    $max_dn_b_formatted = number_format($max_dn_b, 1);
    // Average Daya Nyata B
    $result_avg_dn_b = mysqli_query($connect, "SELECT AVG(dayanyataB) as avg_dn_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_dnb = mysqli_fetch_array($result_avg_dn_b);
    $avg_dn_b = $avg_dnb["avg_dn_b"];
    $avg_dn_b_formatted = number_format($avg_dn_b, 1);

    // ---------
    // Higher Daya Reaktif B
    $result_hgh_dr_b = mysqli_query($connect, "SELECT MAX(dayareaktifB) as max_dr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher_dr_b = mysqli_fetch_array($result_hgh_dr_b);
    $max_dr_b = $higher_dr_b['max_dr_b'];
    $max_dr_b_formatted = number_format($max_dr_b, 1);
    // Average Daya Reaktif B
    $result_avg_dr_b = mysqli_query($connect, "SELECT AVG(dayareaktifB) as avg_dr_b FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg_drb = mysqli_fetch_array($result_avg_dr_b);
    $avg_dr_b = $avg_drb["avg_dr_b"];
    $avg_dr_b_formatted = number_format($avg_dr_b, 1);

    // ---------














    // syntax for the scroll
    $query_data = mysqli_query($connect, "SELECT voltageA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");

    // -----
    $int_tgl = $tgl_awal;
    $tgl_arr = explode('-', $int_tgl);
    $tgl_ = $tgl_arr[0];
    $bln_ = $tgl_arr[1];
    $thn_ = $tgl_arr[2];

    // -----
    $tgl_tgl = strtotime("$thn_-$bln_-$tgl_");
    $tgl_bln = date('d-m', $tgl_tgl);
    $tgl_bln_thn = date('Y-m-d', $tgl_tgl);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MONEL</title>
    <!-- Shortcut icon -->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    
    <!-- Swepeereeee -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


    <!-- ----- -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- function graphic -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <script src="assets/js/jquery-3.4.0.min.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="jquery-latest.js"></script>
    <!-- Calling data graphic -->
    <!-- <script>
        var refreshid = setInterval(function() {
            $('#graphicsensor').load('data.php');
        }, 1000);
    </script> -->
</head>

<body>
    <div class="Container">
        <div class="wrapper">
            <div class="brand">
                <img src="img/logo.png" alt="" class="logo">
                <h1 class="brand-nav">MONEL</h1>
                <nav class="menu">
                    <div class="menu-toggle">
                        <input type="checkbox">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </nav>
            </div>
            <div class="h1">
                <h2 class="ttl-nav">DAHSBOARD</h2>
            </div>
        </div>
        <div class="bungkusan">
            <div class="navbar">
                <div class="monitor" id="slide-hilang">
                    <h4 class="ttl-mnt">MONITORING</h4>
                </div>
                <ul class="navigation">
                    <li><a href="index.php" id="active">
                            <i class="fa-solid fa-house" id="icon1"></i>
                            <label class="text3" id="active1">&nbsp;&nbsp;Dashboard</label>
                        </a></li>
                    <li>
                        <a href="#" class="feat-btn">
                            <i class="fa-solid fa-microchip" id="icon2"></i>
                            <label class="text3">&nbsp;&nbsp;Microinventer A</label>
                            <span class="fas fa-caret-down first" id="sp1"></span>
                        </a>
                        <ul class="dropdown1">
                            <li class="icn"><a href="microA/microA-V.php"><i class="fa-regular fa-v"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tegangan</label></a></li>
                            <li class="icn"><a href=" microA/microA-A.php"><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arus</label></a>
                            </li>
                            <li class="icn"><a href=" microA/microA-VA.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;Daya Semu</label></a>
                            </li>
                            <li class="icn"><a href=" microA/microA-W.php"><i class="fa-regular fa-w"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daya Nyata</label></a>
                            </li>
                            <li class="icn"><a href=" microA/microA-VAR.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i><i class="fa-regular fa-r"></i>
                                    <label class="text-dp">&nbsp;&nbsp;Daya Reaktif</label></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="feat1-btn">
                            <i class="fa-solid fa-microchip" id="icon3"></i>
                            <label class="text3">&nbsp;&nbsp;Microinventer B</label>
                            <span class="fas fa-caret-down second" id="sp2"></span>
                        </a>
                        <ul class="dropdown2">
                            <li><a href="microB/microB-V.php"><i class="fa-regular fa-v"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tegangan</label></a></li>
                            <li><a href="microB/microB-A.php"><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arus</label></a></li>
                            <li><a href="microB/microB-VA.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;Daya Semu</label></a></li>
                            <li><a href="microB/microB-W.php"><i class="fa-regular fa-w"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daya Nyata</label></a></li>
                            <li><a href="microB/microB-VAR.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i><i class="fa-regular fa-r"></i>
                                    <label class="text-dp">&nbsp;&nbsp;Daya Reaktif</label></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="content">
                <div class="header-content">
                    <div class="calendar">
                        <form action="" method="POST">
                            <input type="date" name="date_start" class="date1" required value="<?php echo $tgl_bln_thn; ?>">
                            <button type="submit" name="submit" class="submitBtn">SEARCH</button>
                        </form>
                    </div>
                    <div class="sapa">
                        <h3 class="welcome">SELAMAT DATANG DI MONEL</h3>
                    </div>
                </div>
                <div class="title_ab">
                    <div class="mc-a">Microinventer A</div>
                    <div class="mc-b">Microinventer B</div>
                </div>
                <div class="body-content">
                    <div class="microinventer-v">
                        <div class="microA">
                            <div class="contentbar">
                                <div class="titlebar1v">TEGANGAN</div>
                                <div class="titlebar2v">
                                    <div class="inpo_higherv">
                                        <p>Tegangan Tertinggi</p>
                                        <?php echo $max_teg_a_formatted; ?>V
                                    </div>
                                    <div class="inpo_averagev">
                                        <p>Tegangan Rata-Rata</p>
                                        <?php echo $avg_teg_a_formatted; ?>V
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(1px); border-radius:10px;">
                                <path fill="#FFD600" fill-opacity="1" d="M0,64L18.5,64C36.9,64,74,64,111,106.7C147.7,149,185,235,222,229.3C258.5,224,295,128,332,112C369.2,96,406,160,443,186.7C480,213,517,203,554,208C590.8,213,628,235,665,245.3C701.5,256,738,256,775,250.7C812.3,245,849,235,886,213.3C923.1,192,960,160,997,154.7C1033.8,149,1071,171,1108,176C1144.6,181,1182,171,1218,186.7C1255.4,203,1292,245,1329,234.7C1366.2,224,1403,160,1422,128L1440,96L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                        <div class="microB">
                            <div class="contentbar">
                                <div class="titlebar1v">TEGANGAN</div>
                                <div class="titlebar2v">
                                    <div class="inpo_higherv">
                                        <p>Tegangan Tertinggi</p>
                                        <?php echo $max_teg_b_formatted; ?>V
                                    </div>
                                    <div class="inpo_averagev">
                                        <p>Tegangan Rata-Rata</p>
                                        <?php echo $avg_teg_b_formatted; ?>V
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(1px); border-radius:10px;">
                                <path fill="#FFD600" fill-opacity="1" d="M0,64L18.5,64C36.9,64,74,64,111,106.7C147.7,149,185,235,222,229.3C258.5,224,295,128,332,112C369.2,96,406,160,443,186.7C480,213,517,203,554,208C590.8,213,628,235,665,245.3C701.5,256,738,256,775,250.7C812.3,245,849,235,886,213.3C923.1,192,960,160,997,154.7C1033.8,149,1071,171,1108,176C1144.6,181,1182,171,1218,186.7C1255.4,203,1292,245,1329,234.7C1366.2,224,1403,160,1422,128L1440,96L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                    </div>
                    <div class="microinventer-a">
                        <div class="microA">
                            <div class="contentbar">
                                <div class="titlebar1a">ARUS</div>
                                <div class="titlebar2a">
                                    <div class="inpo_highera">
                                        <p>Arus Tertinggi</p>
                                        <?php echo $max_curr_a_formatted; ?>A
                                    </div>
                                    <div class="inpo_averagea">
                                        <p>Arus Rata-Rata</p>
                                        <?php echo $avg_curr_a_formatted; ?>A
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(1px); border-radius:10px;">
                                <path fill="#62D6C1" fill-opacity="1" d="M0,256L18.5,245.3C36.9,235,74,213,111,181.3C147.7,149,185,107,222,85.3C258.5,64,295,64,332,74.7C369.2,85,406,107,443,128C480,149,517,171,554,197.3C590.8,224,628,256,665,224C701.5,192,738,96,775,74.7C812.3,53,849,107,886,160C923.1,213,960,267,997,261.3C1033.8,256,1071,192,1108,192C1144.6,192,1182,256,1218,256C1255.4,256,1292,192,1329,160C1366.2,128,1403,128,1422,128L1440,128L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                        <div class="microB">
                            <div class="contentbar">
                                <div class="titlebar1a">ARUS</div>
                                <div class="titlebar2a">
                                    <div class="inpo_highera">
                                        <p>Arus Tertinggi</p>
                                        <?php echo $max_curr_b_formatted; ?>A
                                    </div>
                                    <div class="inpo_averagea">
                                        <p>Arus Rata-Rata</p>
                                        <?php echo $avg_curr_b_formatted; ?>A
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(1px); border-radius:10px;">
                                <path fill="#62D6C1" fill-opacity="1" d="M0,256L18.5,245.3C36.9,235,74,213,111,181.3C147.7,149,185,107,222,85.3C258.5,64,295,64,332,74.7C369.2,85,406,107,443,128C480,149,517,171,554,197.3C590.8,224,628,256,665,224C701.5,192,738,96,775,74.7C812.3,53,849,107,886,160C923.1,213,960,267,997,261.3C1033.8,256,1071,192,1108,192C1144.6,192,1182,256,1218,256C1255.4,256,1292,192,1329,160C1366.2,128,1403,128,1422,128L1440,128L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                    </div>
                    <div class="microinventer-va">
                        <div class="microA">
                            <div class="contentbar">
                                <div class="titlebar1va">DAYA SEMU</div>
                                <div class="titlebar2va">
                                    <div class="inpo_higherva">
                                        <p>Daya Semu Tertinggi</p>
                                        <?php echo $max_ds_a_formatted; ?>VA
                                    </div>
                                    <div class="inpo_averageva">
                                        <p>Daya Semu Rata-Rata</p>
                                        <?php echo $avg_ds_a_formatted; ?>VA
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(1px); border-radius:10px;">
                                <path fill="#B961FF" fill-opacity="1" d="M0,160L18.5,170.7C36.9,181,74,203,111,218.7C147.7,235,185,245,222,240C258.5,235,295,213,332,176C369.2,139,406,85,443,106.7C480,128,517,224,554,250.7C590.8,277,628,235,665,224C701.5,213,738,235,775,213.3C812.3,192,849,128,886,133.3C923.1,139,960,213,997,245.3C1033.8,277,1071,267,1108,229.3C1144.6,192,1182,128,1218,112C1255.4,96,1292,128,1329,122.7C1366.2,117,1403,75,1422,53.3L1440,32L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                        <div class="microB">
                            <div class="contentbar">
                                <div class="titlebar1va">DAYA SEMU</div>
                                <div class="titlebar2va">
                                    <div class="inpo_higherva">
                                        <p>Daya Semu Tertinggi</p>
                                        <?php echo $max_ds_b_formatted; ?>VA
                                    </div>
                                    <div class="inpo_averageva">
                                        <p>Daya Semu Rata-Rata</p>
                                        <?php echo $avg_ds_b_formatted; ?>VA
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(1px); border-radius:10px;">
                                <path fill="#B961FF" fill-opacity="1" d="M0,160L18.5,170.7C36.9,181,74,203,111,218.7C147.7,235,185,245,222,240C258.5,235,295,213,332,176C369.2,139,406,85,443,106.7C480,128,517,224,554,250.7C590.8,277,628,235,665,224C701.5,213,738,235,775,213.3C812.3,192,849,128,886,133.3C923.1,139,960,213,997,245.3C1033.8,277,1071,267,1108,229.3C1144.6,192,1182,128,1218,112C1255.4,96,1292,128,1329,122.7C1366.2,117,1403,75,1422,53.3L1440,32L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                    </div>
                    <div class="microinventer-w">
                        <div class="microA">
                            <div class="contentbar">
                                <div class="titlebar1w">DAYA NYATA</div>
                                <div class="titlebar2w">
                                    <div class="inpo_higherw">
                                        <p>Daya Nyata Tertinggi</p>
                                        <?php echo $max_dn_a_formatted; ?>W
                                    </div>
                                    <div class="inpo_averagew">
                                        <p>Daya Nyata Rata-Rata</p>
                                        <?php echo $avg_dn_a_formatted; ?>W
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(2px); border-radius:10px;">
                                <path fill="#FF5C5C" fill-opacity="1" d="M0,256L26.7,229.3C53.3,203,107,149,160,128C213.3,107,267,117,320,149.3C373.3,181,427,235,480,229.3C533.3,224,587,160,640,149.3C693.3,139,747,181,800,186.7C853.3,192,907,160,960,165.3C1013.3,171,1067,213,1120,234.7C1173.3,256,1227,256,1280,234.7C1333.3,213,1387,171,1413,149.3L1440,128L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
                            </svg> -->
                        </div>
                        <div class="microB">
                            <div class="contentbar">
                                <div class="titlebar1w">DAYA NYATA</div>
                                <div class="titlebar2w">
                                    <div class="inpo_higherw">
                                        <p>Daya Nyata Tertinggi</p>
                                        <?php echo $max_dn_b_formatted; ?>W
                                    </div>
                                    <div class="inpo_averagew">
                                        <p>Daya Nyata Rata-Rata</p>
                                        <?php echo $avg_dn_b_formatted; ?>W
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(2px); border-radius:10px;">
                                <path fill="#FF5C5C" fill-opacity="1" d="M0,256L26.7,229.3C53.3,203,107,149,160,128C213.3,107,267,117,320,149.3C373.3,181,427,235,480,229.3C533.3,224,587,160,640,149.3C693.3,139,747,181,800,186.7C853.3,192,907,160,960,165.3C1013.3,171,1067,213,1120,234.7C1173.3,256,1227,256,1280,234.7C1333.3,213,1387,171,1413,149.3L1440,128L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
                            </svg> -->
                        </div>
                    </div>
                    <div class="microinventer-var">
                        <div class="microA">
                            <div class="contentbar">
                                <div class="titlebar1var">DAYA REAKTIF</div>
                                <div class="titlebar2var">
                                    <div class="inpo_highervar">
                                        <p>Daya Reaktif Tertinggi</p>
                                        <?php echo $max_dr_a_formatted; ?>VAR
                                    </div>
                                    <div class="inpo_averagevar">
                                        <p>Daya Reaktif Rata-Rata</p>
                                        <?php echo $avg_dr_a_formatted; ?>VAR
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(2px); border-radius:10px;">
                                <path fill="#A9B5D4" fill-opacity="1" d="M0,224L17.1,218.7C34.3,213,69,203,103,197.3C137.1,192,171,192,206,208C240,224,274,256,309,229.3C342.9,203,377,117,411,90.7C445.7,64,480,96,514,128C548.6,160,583,192,617,176C651.4,160,686,96,720,96C754.3,96,789,160,823,192C857.1,224,891,224,926,213.3C960,203,994,181,1029,186.7C1062.9,192,1097,224,1131,229.3C1165.7,235,1200,213,1234,186.7C1268.6,160,1303,128,1337,122.7C1371.4,117,1406,139,1423,149.3L1440,160L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z"></path>
                            </svg> -->
                        </div>
                        <div class="microB">
                            <div class="contentbar">
                                <div class="titlebar1var">DAYA REAKTIF</div>
                                <div class="titlebar2var">
                                    <div class="inpo_highervar">
                                        <p>Daya Reaktif Tertinggi</p>
                                        <?php echo $max_dr_b_formatted; ?>VAR
                                    </div>
                                    <div class="inpo_averagevar">
                                        <p>Daya Reaktif Rata-Rata</p>
                                        <?php echo $avg_dr_b_formatted; ?>VAR
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(2px); border-radius:10px;">
                                <path fill="#A9B5D4" fill-opacity="1" d="M0,224L17.1,218.7C34.3,213,69,203,103,197.3C137.1,192,171,192,206,208C240,224,274,256,309,229.3C342.9,203,377,117,411,90.7C445.7,64,480,96,514,128C548.6,160,583,192,617,176C651.4,160,686,96,720,96C754.3,96,789,160,823,192C857.1,224,891,224,926,213.3C960,203,994,181,1029,186.7C1062.9,192,1097,224,1131,229.3C1165.7,235,1200,213,1234,186.7C1268.6,160,1303,128,1337,122.7C1371.4,117,1406,139,1423,149.3L1440,160L1440,320L1422.9,320C1405.7,320,1371,320,1337,320C1302.9,320,1269,320,1234,320C1200,320,1166,320,1131,320C1097.1,320,1063,320,1029,320C994.3,320,960,320,926,320C891.4,320,857,320,823,320C788.6,320,754,320,720,320C685.7,320,651,320,617,320C582.9,320,549,320,514,320C480,320,446,320,411,320C377.1,320,343,320,309,320C274.3,320,240,320,206,320C171.4,320,137,320,103,320C68.6,320,34,320,17,320L0,320Z"></path>
                            </svg> -->
                        </div>
                    </div>
                </div>
                <div class="body-content-duo">
                    <!-- Swiper -->
                    <!-- <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" sty>Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                            <div class="swiper-slide">Slide 5</div>
                            <div class="swiper-slide">Slide 6</div>
                            <div class="swiper-slide">Slide 7</div>
                            <div class="swiper-slide">Slide 8</div>
                            <div class="swiper-slide">Slide 9</div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div> -->
                    <div class="hero">
                        <div class="titlehero">MICROINVENTER A</div>
                        <div class="contenair">
                            <!-- <div class="indicator">
                                <span class="btn aktiv"></span>
                                <span class="btn"></span>
                                <span class="btn"></span>
                                <span class="btn"></span>
                                <span class="btn"></span>
                            </div> -->
                            <div class="slide-row" id="sliding">
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1v">TEGANGAN</div>
                                            <div class="titlebar2v">
                                                <div class="inpo_higherv">
                                                    <p>Tegangan Tertinggi</p>
                                                    <?php echo $max_teg_a_formatted; ?>V
                                                </div>
                                                <div class="inpo_averagev">
                                                    <p>Tegangan Rata-Rata</p>
                                                    <?php echo $avg_teg_a_formatted; ?>V
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1a">ARUS</div>
                                            <div class="titlebar2a">
                                                <div class="inpo_highera">
                                                    <p>Arus Tertinggi</p>
                                                    <?php echo $max_curr_a_formatted; ?>A
                                                </div>
                                                <div class="inpo_averagea">
                                                    <p>Arus Rata-Rata</p>
                                                    <?php echo $avg_curr_a_formatted; ?>A
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1va">DAYA SEMU</div>
                                            <div class="titlebar2va">
                                                <div class="inpo_higherva">
                                                    <p>Daya Semu Tertinggi</p>
                                                    <?php echo $max_ds_a_formatted; ?>VA
                                                </div>
                                                <div class="inpo_averageva">
                                                    <p>Daya Semu Rata-Rata</p>
                                                    <?php echo $avg_ds_a_formatted; ?>VA
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1w">DAYA NYATA</div>
                                            <div class="titlebar2w">
                                                <div class="inpo_higherw">
                                                    <p>Daya Nyata Tertinggi</p>
                                                    <?php echo $max_dn_a_formatted; ?>W
                                                </div>
                                                <div class="inpo_averageva">
                                                    <p>Daya Nyata Rata-Rata</p>
                                                    <?php echo $avg_dn_a_formatted; ?>W
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1var">DAYA REAKTIF</div>
                                            <div class="titlebar2var">
                                                <div class="inpo_highervar">
                                                    <p>Daya Reaktif Tertinggi</p>
                                                    <?php echo $max_dr_a_formatted; ?>VAR
                                                </div>
                                                <div class="inpo_averagevar">
                                                    <p>Daya Reaktif Rata-Rata</p>
                                                    <?php echo $avg_dr_a_formatted; ?>VAR
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hoe">
                            <button class="scroll-left-btn">
                                < </button>
                                    <button class="scroll-right-btn">></button>
                        </div>
                    </div>
                    <!-- -------------------------------- -->
                    <div class="hero">
                        <div class="titlehero">MICROINVENTER B</div>
                        <div class="contenair">
                            <!-- <div class="indicator">
                                <span class="btn aktiv"></span>
                                <span class="btn"></span>
                                <span class="btn"></span>
                                <span class="btn"></span>
                                <span class="btn"></span>
                            </div> -->
                            <div class="slide-row1" id="sliding">
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1v">TEGANGAN</div>
                                            <div class="titlebar2v">
                                                <div class="inpo_higherv">
                                                    <p>Tegangan Tertinggi</p>
                                                    <?php echo $max_teg_b_formatted; ?>V
                                                </div>
                                                <div class="inpo_averagev">
                                                    <p>Tegangan Rata-Rata</p>
                                                    <?php echo $avg_teg_b_formatted; ?>V
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1a">ARUS</div>
                                            <div class="titlebar2a">
                                                <div class="inpo_highera">
                                                    <p>Arus Tertinggi</p>
                                                    <?php echo $max_curr_b_formatted; ?>A
                                                </div>
                                                <div class="inpo_averagea">
                                                    <p>Arus Rata-Rata</p>
                                                    <?php echo $avg_curr_b_formatted; ?>A
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1va">DAYA SEMU</div>
                                            <div class="titlebar2va">
                                                <div class="inpo_higherva">
                                                    <p>Daya Semu Tertinggi</p>
                                                    <?php echo $max_ds_b_formatted; ?>VA
                                                </div>
                                                <div class="inpo_averageva">
                                                    <p>Daya Semu Rata-Rata</p>
                                                    <?php echo $avg_ds_b_formatted; ?>VA
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1w">DAYA NYATA</div>
                                            <div class="titlebar2w">
                                                <div class="inpo_higherw">
                                                    <p>Daya Nyata Tertinggi</p>
                                                    <?php echo $max_dn_b_formatted; ?>W
                                                </div>
                                                <div class="inpo_averageva">
                                                    <p>Daya Nyata Rata-Rata</p>
                                                    <?php echo $avg_dn_b_formatted; ?>W
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-col fade">
                                    <div class="content-scroll">
                                        <div class="contentbar">
                                            <div class="titlebar1var">DAYA REAKTIF</div>
                                            <div class="titlebar2var">
                                                <div class="inpo_highervar">
                                                    <p>Daya Reaktif Tertinggi</p>
                                                    <?php echo $max_dr_b_formatted; ?>VAR
                                                </div>
                                                <div class="inpo_averagevar">
                                                    <p>Daya Reaktif Rata-Rata</p>
                                                    <?php echo $avg_dr_b_formatted; ?>VAR
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hoe">
                            <button class="scroll-left-btn1">
                                < </button>
                                    <button class="scroll-right-btn1">></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footerbrand">MONEL PROJECT</div>
        </div>
        <div class="overlay"></div>
    </div>

    <!-- AWAL JAVA SCRIPT -->
    <script>
        $('.feat-btn').click(function() {
            $('.navbar .navigation .dropdown1').toggleClass("dropdown");
            $('.navbar .navigation li .first').toggleClass("balik");
        });
        $('.feat1-btn').click(function() {
            $('.navbar .navigation .dropdown2').toggleClass("dropdewn");
            $('.navbar .navigation li .second').toggleClass("balek");
        });
        $('.menu-toggle input').click(function() {
            // $('.side-icn').toggleClass('slide');
            $('.brand-nav').toggleClass('slide');
            $('.menu').toggleClass('slide');
            $('.navbar').toggleClass('slide');
            $('#icon1').toggleClass('slide');
            $('#icon2').toggleClass('slide');
            $('#icon3').toggleClass('slide');
            $('.text3').toggleClass('slide');
            $('span').toggleClass('slide');
            $('span').toggleClass('slide');
            $('h4').toggleClass('slide');
            $('.navbar .navigation li .dropdown1 .text-dp').toggleClass("dp1");
            $('.navbar .navigation li .dropdown2 .text-dp').toggleClass("dp2");
            $('.microinventer-v').toggleClass('modot');
            $('.microinventer-a').toggleClass('modot');
            $('.microinventer-va').toggleClass('modot');
            $('.microinventer-var').toggleClass('modot');
            $('.microinventer-w').toggleClass('modot');
            $('.microA').toggleClass('modot');
            $('.microB').toggleClass('modot');
            $('.contentbar .titlebar1v').toggleClass('modot');
            $('.contentbar .titlebar2v').toggleClass('modot');
            $('.overlay').toggleClass('muncul');
            $('.overlay.muncul').toggleClass('hilang');

            // $('.navbar1').toggleClass('slide');
        });
        // $('.overlay').click(function() {
        //     $('.navbar.slide').toggleClass('sliders');
        //     $('.overlay').toggleClass('ilang');
        //     $('.navbar').toggleClass('slide');
        //     const overlay_modif = document.querySelector('.navbar');
        //     //     // ---------------
        //     overlay_modif.classList.remove('slide');
        //     overlay_modif.classList.remove('sliders');
        //     const mnm = document.querySelector('.overlay');
        //     // ------------------
        //     mnm.classList.remove('.muncul');
        //     mnm.classList.remove('.hilang');
        //     mnm.classList.remove('.ilang');
        // });
        // ambil elemen navbar dan div sampingnya
        const navbar = document.querySelector('.navbar');
        const divSamping = document.querySelector('.overlay');

        // tambahkan event listener pada elemen div samping
        divSamping.addEventListener('click', () => {
            // tutup navbar
            navbar.classList.remove('slide');
            divSamping.classList.remove('muncul');
            divSamping.classList.remove('hilang');
        });
        // const overlayT = document.querySelector('.overlay');
        // overlayT.addEventListener('click', function() {
        //     const overlay_modif = document.querySelector('.navbar');
        //     // ---------------
        //     overlay_modif.classList.remove('slide');
        //     overlay_modif.classList.remove('sliders');
        // });
        // var btn = document.getElementsByClassName("btn");
        // var sliding = document.getElementById("sliding");

        // btn[0].onclick = function() {
        //     sliding.style.right = "0px";
        // }
        // btn[1].onclick = function() {
        //     sliding.style.right = "345px";
        // }
        // btn[2].onclick = function() {
        //     sliding.style.right = "690px";
        // }
        // btn[3].onclick = function() {
        //     sliding.style.right = "1035px";
        // }
        // btn[4].onclick = function() {
        //     sliding.style.right = "1380px";
        // }
        const scrollContainer = document.querySelector('.slide-row');
        const scrollLeftBtn = document.querySelector('.scroll-left-btn');
        const scrollRightBtn = document.querySelector('.scroll-right-btn');

        scrollLeftBtn.addEventListener('click', () => {
            scrollContainer.scrollLeft -= 360;
        });

        scrollRightBtn.addEventListener('click', () => {
            scrollContainer.scrollLeft += 360;
        });

        const scrollContainer1 = document.querySelector('.slide-row1');
        const scrollLeftBtn1 = document.querySelector('.scroll-left-btn1');
        const scrollRightBtn1 = document.querySelector('.scroll-right-btn1');

        scrollLeftBtn1.addEventListener('click', () => {
            scrollContainer1.scrollLeft -= 360;
        });

        scrollRightBtn1.addEventListener('click', () => {
            scrollContainer1.scrollLeft += 360;
        });
        // var swiper = new Swiper(".mySwiper", {
        //     slidesPerView: 1,
        //     spaceBetween: 30,
        //     loop: true,
        //     pagination: {
        //         el: ".swiper-pagination",
        //         clickable: true,
        //     },
        //     navigation: {
        //         nextEl: ".swiper-button-next",
        //         prevEl: ".swiper-button-prev",
        //     },
        // });
        // const menuToggle = document.querySelector(".menu-toggle input");
        // const navbar = document.querySelector("navbar");

        // menuToggle.addEventListener("click", function () {
        //   navbar.classList.toggle("slide");
        // });
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->

    <!-- AKHIR JAVA SCRIPT -->

</body>

</html>