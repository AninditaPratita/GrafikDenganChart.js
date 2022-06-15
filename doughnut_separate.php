<?php
//menghubungkan ke file koneksi.php yang berisi baris perintah untuk menghubungkan ke database
include('koneksi.php');
//deklarasi variabel covid untuk melakukan koneksi ke database dan menjalankan query select
$covid = mysqli_query($conn, "select * from tb_covid");
while ($row = mysqli_fetch_array($covid)){//proses pengambilan data di database
	$nama_negara[] = $row['country'];//deklarasi variabel country = nama negara
	$query=mysqli_query($conn, "select total_case, new_case, total_death, new_death, total_recover, new_recover from tb_covid where id='".$row['id']."'"); //melakukan koneksi ke database dan menjalankan query select berdasarkan id
	$row = $query->fetch_array(); //mengambil data dengan hasil array
	$total_case[] = $row['total_case']; //deklarasi varaiabel total case
	$new_case[] = $row['new_case']; //deklarasi varaiabel new case
	$total_death[] = $row['total_death']; //deklarasi varaiabel total death
	$new_death[] = $row['new_death']; //deklarasi varaiabel new death
	$total_recover[] = $row['total_recover']; //deklarasi varaiabel total recover
	$new_recover[] = $row['new_recover'];//deklarasi varaiabel new recover
}
?>
<!DOCTYPE html>
<html> <!--tag pembuka HTML-->
<head>
	<title>Membuat Grafik Doughnut Chart Menggunakan Chart JS</title> <!--Judul HTML-->
	<script type="text/javascript" src="Chart.js"></script> <!--Menghubungkan ke file Chart.js-->
</head>
<body>
	<div class="container" align="center"> <!--class container-->
		<div id="canvas-holder" style="width:60%"> <!--ukuran canvas-->
			<h2 style="font-family: cursive;">Grafik Doughnut Chart 8 Kategori Angka Penderita Covid 19 di 10 Negara</h2> <!--judul-->
			<br><h3>Total Cases</h3> <!--heading total cases-->
			<canvas id="chart-area1"></canvas> <!--membuat objek canvas menggunakan id chart area1-->
			<br><h3>New Cases</h3> <!--heading new cases-->
			<canvas id="chart-area2"></canvas> <!--membuat objek canvas menggunakan id chart area2-->
			<br><h3>Total Death</h3> <!--heading total death-->
			<canvas id="chart-area3"></canvas> <!--membuat objek canvas menggunakan id chart area3-->
			<br><h3>New Death</h3> <!--heading new death-->
			<canvas id="chart-area4"></canvas> <!--membuat objek canvas menggunakan id chart area4-->
			<br><h3>Total Recovered</h3> <!--heading total recovered-->
			<canvas id="chart-area5"></canvas> <!--membuat objek canvas menggunakan id chart area5-->
			<br><h3>New Recovered</h3> <!--heading new recovered-->
			<canvas id="chart-area6"></canvas> <!--membuat objek canvas menggunakan id chart area6-->
		</div>
		<script>
			//baris kode dibawah ini untuk mengatur chart-area 1 yaitu total case
			var ctx = document.getElementById("chart-area1").getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
			var myChart = new Chart(ctx, {
				type: 'doughnut', //membuat tipe doughnut chart
				data: {//fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara); ?>, //label doughnut chart
					datasets: [{
						label: 'Total Cases', //label dataset
						data: <?php echo json_encode($total_case); ?>, //mengambil data total_case untuk ditampilkan menjadi doughnut chart
						backgroundColor: [ //pengaturan warna untuk background doughnut chart
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
						borderColor:[ //pengaturan warna untuk border doughnut chart
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
					responsive: true //untuk mengaktifkan responsivitas dan mengontrol pengubahan ukuran bagan canvas dengan mendeteksi saat ukuran tampilan canvas berubah dan memperbarui ukuran yang sesuai
				}
			});
			//baris kode dibawah ini untuk mengatur chart-area 2 yaitu new case
			var ctx = document.getElementById("chart-area2").getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
			var myChart = new Chart(ctx, {
				type: 'doughnut',//membuat tipe doughnut chart
				data: { //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara); ?>, //label doughnut chart
					datasets: [{ 
						label: 'New Cases', //label dataset
						data: <?php echo json_encode($new_case); ?>, //mengambil data new_case untuk ditampilkan menjadi doughnut chart
						backgroundColor: [ //pengaturan warna untuk background doughnut chart
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
						borderColor:[ //pengaturan warna untuk border doughnut chart
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
					responsive: true //untuk mengaktifkan responsivitas dan mengontrol pengubahan ukuran bagan canvas dengan mendeteksi saat ukuran tampilan canvas berubah dan memperbarui ukuran yang sesuai
				}
			});
			//baris kode dibawah ini untuk mengatur chart-area 3 yaitu total death
			var ctx = document.getElementById("chart-area3").getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
			var myChart = new Chart(ctx, {
				type: 'doughnut', //membuat tipe doughnut chart
				data: { //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara); ?>, //label doughnut chart
					datasets: [{
						label: 'Total Death', //label dataset
						data: <?php echo json_encode($total_death); ?>,//mengambil data total_death untuk ditampilkan menjadi doughnut chart
						backgroundColor: [ //pengaturan warna untuk background doughtnut chart
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
						borderColor:[ //pengaturan warna untuk border doughtnut chart
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
					responsive: true //untuk mengaktifkan responsivitas dan mengontrol pengubahan ukuran bagan canvas dengan mendeteksi saat ukuran tampilan canvas berubah dan memperbarui ukuran yang sesuai
				}
			});
			//baris kode dibawah ini untuk mengatur chart-area 4 yaitu new death
			var ctx = document.getElementById("chart-area4").getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
			var myChart = new Chart(ctx, {
				type: 'doughnut',//membuat tipe doughnut chart
				data: { //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara); ?>, //label doughnut chart
					datasets: [{
						label: 'New Death', //label dataset
						data: <?php echo json_encode($new_death); ?>, //mengambil data new_death untuk ditampilkan menjadi doughnut chart 
						backgroundColor: [ //pengaturan warna untuk background doughnut chart
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
						borderColor:[ //pengaturan warna untuk border doughnut chart
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
					responsive: true //untuk mengaktifkan responsivitas dan mengontrol pengubahan ukuran bagan canvas dengan mendeteksi saat ukuran tampilan canvas berubah dan memperbarui ukuran yang sesuai
				}
			});
			//baris kode dibawah ini untuk mengatur chart-area 5 yaitu total recover
			var ctx = document.getElementById("chart-area5").getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
			var myChart = new Chart(ctx, {
				type: 'doughnut',//membuat tipe doughnut chart
				data: { //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara); ?>, //label doughnut chart
					datasets: [{
						label: 'Total Recover', //label dataset
						data: <?php echo json_encode($total_recover);?>,//mengambil data total_recover untuk ditampilkan menjadi doughnut chart
						backgroundColor: [ //pengaturan warna untuk background doughnut chart
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
						borderColor:[ //pengaturan warna untuk border doughnut chart
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
					responsive: true //untuk mengaktifkan responsivitas dan mengontrol pengubahan ukuran bagan canvas dengan mendeteksi saat ukuran tampilan canvas berubah dan memperbarui ukuran yang sesuai
				}
			});
			//baris kode dibawah ini untuk mengatur chart-area 6 yaitu new recover
			var ctx = document.getElementById("chart-area6").getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
			var myChart = new Chart(ctx, {
				type: 'doughnut', //membuat tipe doughnut chart
				data: { //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara); ?>, //label doughnut chart
					datasets: [{
						label: 'New Recover', //label dataset
						data: <?php echo json_encode($new_recover); ?>,//mengambil data new_recover untuk ditampilkan menjadi doughnut chart
						backgroundColor: [ //pengaturan warna untuk background doughnut chart
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
						borderColor:[ //pengaturan warna untuk border doughnut chart
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
					responsive: true //untuk mengaktifkan responsivitas dan mengontrol pengubahan ukuran bagan canvas dengan mendeteksi saat ukuran tampilan canvas berubah dan memperbarui ukuran yang sesuai
				}
			});
		</script> <!--tag penutup script-->
	</div> <!--tag penutup div container-->
</body> <!--tag penutup body-->
</html><!--tag penutup HTML-->