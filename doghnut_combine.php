<?php
include('koneksi.php');
$covid = mysqli_query($conn, "select * from tb_covid");
while ($row = mysqli_fetch_array($covid)){
    $nama_negara[] = $row['country'];
    $query=mysqli_query($conn, "select total_case, new_case, total_death, new_death, total_recover, new_recover from tb_covid where id='".$row['id']."'");
    $row = $query->fetch_array();
    $total_case[] = $row['total_case'];
    $new_case[] = $row['new_case'];
    $total_death[] = $row['total_death'];
    $new_death[] = $row['new_death'];
    $total_recover[] = $row['total_recover'];
    $new_recover[] = $row['new_recover'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Membuat Grafik Doghnut Chart Menggunakan Chart JS</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div class="container" align="center">
        <div style="width: 800px; height: 800px">
            <br><div><h2 style="font-family: cursive;">Grafik Doghnut Chart 8 Kategori Angka Penderita Covid 19 di 10 Negara</h2></div>
            <canvas id="myChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($nama_negara); ?>,
                    datasets: [{
                        label: 'Total Cases',
                        data: <?php echo json_encode($total_case); ?>,
                        backgroundColor: [
                        'rgba(223, 255, 0, 0.2)',
                        'rgba(255, 191, 0, 0.2)',
                        'rgba(255, 127, 80, 0.2)',
                        'rgba(222, 49, 99, 0.2)',
                        'rgba(162, 217, 206, 0.2)',
                        'rgba(64, 224, 208, 0.2)',
                        'rgba(100, 149, 237, 0.2)',
                        'rgba(165, 105, 189, 0.2)',
                        'rgba(169, 204, 227, 0.2)',
                        'rgba(128, 139, 150, 0.2)'],
                        borderColor:[
                        'rgba(223, 255, 0, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(255, 127, 80, 1)',
                        'rgba(222, 49, 99, 1)',
                        'rgba(162, 217, 206, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(165, 105, 189, 1)',
                        'rgba(169, 204, 227, 1)',
                        'rgba(128, 139, 150, 1)'],
                    },
                    {
                        label: 'New Cases',
                        data: <?php echo json_encode($new_case); ?>,
                        backgroundColor: [
                        'rgba(223, 255, 0, 0.2)',
                        'rgba(255, 191, 0, 0.2)',
                        'rgba(255, 127, 80, 0.2)',
                        'rgba(222, 49, 99, 0.2)',
                        'rgba(162, 217, 206, 0.2)',
                        'rgba(64, 224, 208, 0.2)',
                        'rgba(100, 149, 237, 0.2)',
                        'rgba(165, 105, 189, 0.2)',
                        'rgba(169, 204, 227, 0.2)',
                        'rgba(128, 139, 150, 0.2)'],
                        borderColor:[
                        'rgba(223, 255, 0, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(255, 127, 80, 1)',
                        'rgba(222, 49, 99, 1)',
                        'rgba(162, 217, 206, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(165, 105, 189, 1)',
                        'rgba(169, 204, 227, 1)',
                        'rgba(128, 139, 150, 1)'],
                    },
                    {
                        label: 'Total Deaths',
                        data: <?php echo json_encode($total_death); ?>,
                        backgroundColor: [
                        'rgba(223, 255, 0, 0.2)',
                        'rgba(255, 191, 0, 0.2)',
                        'rgba(255, 127, 80, 0.2)',
                        'rgba(222, 49, 99, 0.2)',
                        'rgba(162, 217, 206, 0.2)',
                        'rgba(64, 224, 208, 0.2)',
                        'rgba(100, 149, 237, 0.2)',
                        'rgba(165, 105, 189, 0.2)',
                        'rgba(169, 204, 227, 0.2)',
                        'rgba(128, 139, 150, 0.2)'],
                        borderColor:[
                        'rgba(223, 255, 0, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(255, 127, 80, 1)',
                        'rgba(222, 49, 99, 1)',
                        'rgba(162, 217, 206, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(165, 105, 189, 1)',
                        'rgba(169, 204, 227, 1)',
                        'rgba(128, 139, 150, 1)'],
                    },
                    {
                        label: 'New Death',
                        data: <?php echo json_encode($new_death); ?>,
                        backgroundColor: [
                        'rgba(223, 255, 0, 0.2)',
                        'rgba(255, 191, 0, 0.2)',
                        'rgba(255, 127, 80, 0.2)',
                        'rgba(222, 49, 99, 0.2)',
                        'rgba(162, 217, 206, 0.2)',
                        'rgba(64, 224, 208, 0.2)',
                        'rgba(100, 149, 237, 0.2)',
                        'rgba(165, 105, 189, 0.2)',
                        'rgba(169, 204, 227, 0.2)',
                        'rgba(128, 139, 150, 0.2)'],
                        borderColor:[
                        'rgba(223, 255, 0, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(255, 127, 80, 1)',
                        'rgba(222, 49, 99, 1)',
                        'rgba(162, 217, 206, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(165, 105, 189, 1)',
                        'rgba(169, 204, 227, 1)',
                        'rgba(128, 139, 150, 1)'],
                    },
                    {
                        label: 'Total Recovered',
                        data: <?php echo json_encode($total_recover); ?>,
                        backgroundColor: [
                        'rgba(223, 255, 0, 0.2)',
                        'rgba(255, 191, 0, 0.2)',
                        'rgba(255, 127, 80, 0.2)',
                        'rgba(222, 49, 99, 0.2)',
                        'rgba(162, 217, 206, 0.2)',
                        'rgba(64, 224, 208, 0.2)',
                        'rgba(100, 149, 237, 0.2)',
                        'rgba(165, 105, 189, 0.2)',
                        'rgba(169, 204, 227, 0.2)',
                        'rgba(128, 139, 150, 0.2)'],
                        borderColor:[
                        'rgba(223, 255, 0, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(255, 127, 80, 1)',
                        'rgba(222, 49, 99, 1)',
                        'rgba(162, 217, 206, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(165, 105, 189, 1)',
                        'rgba(169, 204, 227, 1)',
                        'rgba(128, 139, 150, 1)'],
                    },
                    {
                        label: 'New Recovered',
                        data: <?php echo json_encode($new_recover); ?>,
                        backgroundColor: [
                        'rgba(223, 255, 0, 0.2)',
                        'rgba(255, 191, 0, 0.2)',
                        'rgba(255, 127, 80, 0.2)',
                        'rgba(222, 49, 99, 0.2)',
                        'rgba(162, 217, 206, 0.2)',
                        'rgba(64, 224, 208, 0.2)',
                        'rgba(100, 149, 237, 0.2)',
                        'rgba(165, 105, 189, 0.2)',
                        'rgba(169, 204, 227, 0.2)',
                        'rgba(128, 139, 150, 0.2)'],
                        borderColor:[
                        'rgba(223, 255, 0, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(255, 127, 80, 1)',
                        'rgba(222, 49, 99, 1)',
                        'rgba(162, 217, 206, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(165, 105, 189, 1)',
                        'rgba(169, 204, 227, 1)',
                        'rgba(128, 139, 150, 1)'],
                    }],
                },
                options: {
                    scales: {}
                }
            });
        </script>
    </div>
</body>
</html>