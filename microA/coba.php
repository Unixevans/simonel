<?php
$connect = mysqli_connect("localhost", "root", "", "simonel");
$wkt_awl = '06:00:00';
$wkt_akr = '18:00:00';

// Step 1: Create array for x-axis labels
$labels = array();
for ($i=6; $i<=18; $i+=1) {
    $labels[] = sprintf('%01d:00', $i);
}

// Step 2: Create array for y-axis data
$data = array();
for ($i=6; $i<=18; $i+=1) {
    $voltageA = mysqli_query($connect, "SELECT AVG(voltageA) as avg_voltage FROM pzem_data WHERE DATE(created_at) = '$tgl_real' AND TIME(created_at) BETWEEN ADDTIME('$i:00:00', '-1:00:00') AND '$i:00:00'");
    $data_currentA = mysqli_fetch_array($voltageA);
    $data[] = round($data_currentA['avg_voltage'], 1);
}

// Step 4: Combine x-axis and y-axis data into a single array
$data_v = array(
    'labels' => $labels,
    'datasets' => array(
        array(
            'label' => 'Voltage',
            'fill' => true,
            'borderColor' => 'rgb(75, 192, 192)',
            'data' => $data
        )
    )
);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="volt.css">
</head>
<body>
    
    <div class="grafikP">
                            <div class="grafik">
                                <!-- <div class="chartgrap" id="grapikchart"></div> -->
                                <div style="text-align: center;height: 30px; align-items:center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                                    STATISTIK TEGANGAN MICROINVENTER A
                                </div>
                                <div class="panel-body">
                                    <!-- Prepared canvas for Graphic -->
                                    <canvas id="myChart-v"></canvas>
                                </div>
                            </div>
                        </div>
    <!-- Step 5: Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Step 6: Create chart using Chart.js -->
    <canvas id="myChart-v"></canvas>
    <script>
        var canvas_v = document.getElementById('myChart-v');
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
    </script>
</body>
</html>
