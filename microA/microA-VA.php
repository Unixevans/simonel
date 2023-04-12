<?php

// -------
$connect = mysqli_connect("localhost", "root", "", "simonell");

// Syntax Query for Data Sumbu X
// -----
$wkt_awl = '06:00:00';
$wkt_akr = '18:00:00';
$tanggal = mysqli_query($connect, "SELECT created_at FROM pzem_data WHERE DATE_FORMAT(created_at, '%H:%s:%s') BETWEEN '$wkt_awl' AND '$wkt_akr'");
// .......
$now = new DateTime();
$tgl_real = $now->format('Y-m-d');
// Syntax Query for Data Sumbu Y 
if (!isset($_POST['submit'])) {


    // Step 1: Create array for x-axis labels
    $labels = array();
    for ($i=6; $i<=18; $i+=1) {
        $labels[] = sprintf('%01d:00', $i);
    }

    // Step 2: Create array for y-axis data
    $data = array();
    for ($i=6; $i<=18; $i+=1) {
        $dayasemuA = mysqli_query($connect, "SELECT AVG(dayasemuA) as avg_dayasemu FROM pzem_data WHERE DATE(created_at) = '$tgl_real' AND TIME(created_at) BETWEEN ADDTIME('$i:00:00', '-1:00:00') AND '$i:00:00'");
        $data_dayasemuA = mysqli_fetch_array($dayasemuA);
        $data[] = round($data_dayasemuA['avg_dayasemu'], 1);
    }

    // Step 4: Combine x-axis and y-axis data into a single array
    $data_v = array(
        'labels' => $labels,
        'datasets' => array(
            array(
                'label' => 'Daya Semu',
                'fill' => true,
                'backgroundColor' => "rgba(185, 97, 255, .7)",
                'borderColor' => "rgba(185, 97, 255, 2)",
                'data' => $data
            )
        )
    );

    $dayasemuA = mysqli_query($connect, "SELECT dayasemuA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' AND  DATE_FORMAT(created_at, '%H:%s:%s') BETWEEN '$wkt_awl' AND '$wkt_akr'");
    // -----------------------------------------------------------------------------------
    // Higher Voltage
    $result1 = mysqli_query($connect, "SELECT MAX(dayasemuA) as max_teg FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $higher = mysqli_fetch_array($result1);
    $max_teg = $higher['max_teg'];
    $max_teg_formatted = number_format($max_teg, 1);

    // Average Voltage
    $result2 = mysqli_query($connect, "SELECT AVG(dayasemuA) as avg_teg FROM pzem_data WHERE DATE(created_at) = '$tgl_real'");
    $avg = mysqli_fetch_array($result2);
    $avg_teg = $avg["avg_teg"];
    $avg_teg_formatted = number_format($avg_teg, 1);
    // ---------

    // syntax for the scroll
    $query_data = mysqli_query($connect, "SELECT dayasemuA FROM pzem_data WHERE DATE(created_at) = '$tgl_real' AND  DATE_FORMAT(created_at, '%H:%s:%s') BETWEEN '$wkt_awl' AND '$wkt_akr' AND HOUR(created_at) % 2 = 0 ORDER BY ID ASC");

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

    // Step 1: Create array for x-axis labels
    $labels = array();
    for ($i=6; $i<=18; $i+=1) {
        $labels[] = sprintf('%01d:00', $i);
    }

    // Step 2: Create array for y-axis data
    $data = array();
    for ($i=6; $i<=18; $i+=1) {
        $dayasemuA = mysqli_query($connect, "SELECT AVG(dayasemuA) as avg_dayasemu FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' AND TIME(created_at) BETWEEN ADDTIME('$i:00:00', '-1:00:00') AND '$i:00:00'");
        $data_dayasemuA = mysqli_fetch_array($dayasemuA);
        $data[] = round($data_dayasemuA['avg_dayasemu'], 1);
    }

    // Step 4: Combine x-axis and y-axis data into a single array
    $data_v = array(
        'labels' => $labels,
        'datasets' => array(
            array(
                'label' => 'Daya Semu',
                'fill' => true,
                'backgroundColor' => "rgba(185, 97, 255, .7)",
                'borderColor' => "rgba(185, 97, 255, 2)",
                'data' => $data
            )
        )
    );


    // CONDITION
    $dayasemuA = mysqli_query($connect, "SELECT dayasemuA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' AND  DATE_FORMAT(created_at, '%H:%s:%s') BETWEEN '$wkt_awl' AND '$wkt_akr' AND HOUR(created_at) % 2 = 0 ORDER BY ID ASC");
    // -----------------------------------------------------------------------------------
    // Higher Voltage
    $result1 = mysqli_query($connect, "SELECT MAX(dayasemuA) as max_teg FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $higher = mysqli_fetch_array($result1);
    $max_teg = $higher['max_teg'];
    $max_teg_formatted = number_format($max_teg, 1);

    // Average Voltage
    $result2 = mysqli_query($connect, "SELECT AVG(dayasemuA) as avg_teg FROM pzem_data WHERE DATE(created_at) = '$tgl_awal'");
    $avg = mysqli_fetch_array($result2);
    $avg_teg = $avg["avg_teg"];
    $avg_teg_formatted = number_format($avg_teg, 1);
    // ---------

    // syntax for the scroll
    $query_data = mysqli_query($connect, "SELECT dayasemuA FROM pzem_data WHERE DATE(created_at) = '$tgl_awal' AND  DATE_FORMAT(created_at, '%H:%s:%s') BETWEEN '$wkt_awl' AND '$wkt_akr' AND HOUR(created_at) % 2 = 0 ORDER BY ID ASC");

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
    <title>Daya Semu - MONEL</title>
    <!-- Shortcut icon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="../css/va.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"> -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <script src="assets/js/jquery-3.4.0.min.js"></script>
    <script src="assets/js/mdb.min.js"></script>
    <script src="/jquery-latest.js"></script>

    <!-- Calling data for graphic -->
    <script>
        // var refreshid = setInterval(function() {
        //     $('#grapikchart').load('data_v.php');
        // }, 1000);
    </script>

</head>

<body>
    <div class="Container">
        <div class="wrapper">
            <div class="brand">
                <img src="../img/logo.png" alt="" class="logo">
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
                <h2>DAYA SEMU</h2>
            </div>
        </div>
        <div class="bungkusan">
            <div class="navbar">
                <div class="monitor" id="slide-hilang">
                    <h4>MONITORING</h4>
                </div>
                <ul class="navigation">
                    <li><a href="../index.php">
                            <i class="fa-solid fa-house" id="icon1"></i>
                            <label class="text3">&nbsp;&nbsp;Dashboard</label>
                        </a></li>
                    <li>
                        <a href="#" class="feat-btn">
                            <i class="fa-solid fa-microchip" id="icon2"></i>
                            <label class="text3">&nbsp;&nbsp;Microinventer A</label>
                            <span class="fas fa-caret-down first" id="sp1"></span>
                        </a>
                        <ul class="dropdown1">
                            <li><a href="microA-V.php"><i class="fa-regular fa-v"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tegangan</label></a></li>
                            <li><a href="microA-A.php"><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arus</label></a></li>
                            <li><a href="microA-VA.php" id="active"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;Daya Semu</label></a></li>
                            <li><a href="microA-W.php"><i class="fa-regular fa-w"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daya Nyata</label></a></li>
                            <li><a href="microA-VAR.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i><i class="fa-regular fa-r"></i>
                                    <label class="text-dp">&nbsp;&nbsp;Daya Reaktif</label></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="feat1-btn">
                            <i class="fa-solid fa-microchip" id="icon3"></i>
                            <label class="text3">&nbsp;&nbsp;Microinventer B</label>
                            <span class="fas fa-caret-down second" id="sp2"></span>
                        </a>
                        <ul class="dropdown2">
                            <li><a href="../microB/microB-V.php"><i class="fa-regular fa-v"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tegangan</label></a></li>
                            <li><a href="../microB/microB-A.php"><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arus</label></a></li>
                            <li><a href="../microB/microB-VA.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;Daya Semu</label></a></li>
                            <li><a href="../microB/microB-W.php"><i class="fa-regular fa-w"></i>
                                    <label class="text-dp">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Daya Nyata</label></a></li>
                            <li><a href="../microB/microB-VAR.php"><i class="fa-regular fa-v"></i><i class="fa-regular fa-a"></i><i class="fa-regular fa-r"></i>
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
                </div>
                <div class="body-content">
                    <div class="microA">
                        <div class="teganganV">
                            <div class="contentbar">
                                <div class="titlebar1">
                                    <div class="ico">
                                        <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
                                        <lord-icon src="https://cdn.lordicon.com/icxqolmx.json" trigger="loop" style="width:40px;height:40px">
                                        </lord-icon>
                                    </div>
                                    <h3 class="brand-t">DAYA SEMU</h3>
                                </div>
                                <div class="titlebar2">
                                    <div class="inpo-higher">
                                        <p class="m-t"><?php echo $max_teg_formatted; ?> VA</p>
                                        <P class="m-t-ttl">Daya Semu Tertinggi</P>
                                    </div>
                                    <div class="inpo-average">
                                        <p class="a-t"><?php echo $avg_teg_formatted; ?> VA</p>
                                        <p class="a-t-ttl">Daya Semu Rata-Rata</p>
                                    </div>
                                </div>
                            </div>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; border-radius:10px;">
                                <path fill="#b961ff" fill-opacity="1" d="M0,160L18.5,154.7C36.9,149,74,139,111,138.7C147.7,139,185,149,222,165.3C258.5,181,295,203,332,186.7C369.2,171,406,117,443,128C480,139,517,213,554,240C590.8,267,628,245,665,208C701.5,171,738,117,775,128C812.3,139,849,213,886,224C923.1,235,960,181,997,176C1033.8,171,1071,213,1108,197.3C1144.6,181,1182,107,1218,117.3C1255.4,128,1292,224,1329,224C1366.2,224,1403,128,1422,80L1440,32L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path>
                            </svg> -->
                        </div>
                        <div class="scrool">
                            <div class="in">
                                <div class="in_inpo"><?php echo $tgl_bln; ?></div>
                                <div class="text_ttl">
                                    <div class="ttl_1" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">12 JAM</div>
                                    <div class="ttl_2">Berikut Statistik Tegangan Microinventer A</div>
                                </div>
                            </div>
                            <div class="scrollbar">
                                <?php foreach($data as $row => $value) : ?>
                                    <div class="item">
                                        <div class="item-content">
                                            <span><?php echo $value; ?> VA</span>
                                            <span><i class="fa-solid fa-bolt"></i></span>
                                            <span><?php echo $labels[$row]; ?></span>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- <div class="tgl">01-31</div> -->
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="z-index: -1; transform:translateY(13px); border-radius:10px;">
                                <path fill="#b961ff" fill-opacity="1" d="M0,64L18.5,64C36.9,64,74,64,111,106.7C147.7,149,185,235,222,229.3C258.5,224,295,128,332,112C369.2,96,406,160,443,186.7C480,213,517,203,554,208C590.8,213,628,235,665,245.3C701.5,256,738,256,775,250.7C812.3,245,849,235,886,213.3C923.1,192,960,160,997,154.7C1033.8,149,1071,171,1108,176C1144.6,181,1182,171,1218,186.7C1255.4,203,1292,245,1329,234.7C1366.2,224,1403,160,1422,128L1440,96L1440,320L1421.5,320C1403.1,320,1366,320,1329,320C1292.3,320,1255,320,1218,320C1181.5,320,1145,320,1108,320C1070.8,320,1034,320,997,320C960,320,923,320,886,320C849.2,320,812,320,775,320C738.5,320,702,320,665,320C627.7,320,591,320,554,320C516.9,320,480,320,443,320C406.2,320,369,320,332,320C295.4,320,258,320,222,320C184.6,320,148,320,111,320C73.8,320,37,320,18,320L0,320Z"></path>
                            </svg> -->
                        </div>
                    </div>

                    <!-- Place for Graphic -->
                    <div class="grafikP">
                        <div class="grafik">
                            <!-- <div class="chartgrap" id="grapikchart"></div> -->
                            <div style="text-align: center;height: 30px; align-items:center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                STATISTIK RATA-RATA PERJAM DAYA SEMU MICROINVENTER A
                            </div>
                            <div class="panel-body">
                                <!-- Prepared canvas for Graphic -->
                                <canvas id="myChart-v"></canvas>
                            </div>
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
    <script>
        $('.feat-btn').click(function() {
            $('.navbar .navigation .dropdown1').toggleClass("dropdown");
            $('.navbar .navigation li .first').toggleClass("balik");
            $('#sp1').toggleClass('drop');
        });
        $('.feat1-btn').click(function() {
            $('.navbar .navigation .dropdown2').toggleClass("dropdewn");
            $('.navbar .navigation li .second').toggleClass("balek");
            $('#sp2').toggleClass('drop');
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
            $('.grafik').toggleClass('ngodot');
            $('.teganganV').toggleClass('ngodot');
            $('.contentbar .titlebar1').toggleClass('ngodot');
            $('.contentbar .titlebar2').toggleClass('ngodot');
            $('.overlay').toggleClass('muncul');
            $('.overlay.muncul').toggleClass('hilang');

            // $('.navbar1').toggleClass('slide');
        });
        const navbar = document.querySelector('.navbar');
        const divSamping = document.querySelector('.overlay');

        // tambahkan event listener pada elemen div samping
        divSamping.addEventListener('click', () => {
            // tutup navbar
            navbar.classList.remove('slide');
            divSamping.classList.remove('muncul');
            divSamping.classList.remove('hilang');
        });
        // const menuToggle = document.querySelector(".menu-toggle input");
        // const navbar = document.quezrySelector("navbar");

        // menuToggle.addEventListener("click", function () {
        //   navbar.classList.toggle("slide");
        // });

        // ------
        // View the graphic

        var canvas_v = document.getElementById('myChart-v');
        // Prepared for the graphic
        var option_v = {
            showLines: true,
            animation: {
                duration: 0
            }
        };
        var myLineChart = new Chart(canvas_v, {
            type: 'line',
            data: <?php echo json_encode($data_v); ?>,
            options: option_v
        });
        // Function for refreshed chart
        // -
        function updateDivContent() {
            const myDiv = document.getElementById("myChart-v");
        }
        const intervalid = setInterval(updateDivContent, 1000);
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>

</html>