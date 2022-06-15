<?php
//menghubungkan ke file koneksi.php yang berisi baris perintah untuk menghubungkan ke database
include('koneksi.php'); 
//deklarasi variabel covid untuk melakukan koneksi ke database dan menjalankan query select
$covid = mysqli_query($conn, "select * from tb_covid");
while ($row = mysqli_fetch_array($covid)){ //proses pengambilan data di database
	$nama_negara[] = $row['country']; //deklarasi variabel country = nama negara
	$query=mysqli_query($conn, "select total_case from tb_covid where id='".$row['id']."'"); //melakukan koneksi ke database dan menjalankan query select berdasarkan id
	$row = $query->fetch_array(); //mengambil data dengan hasil array
	$total_case[] = $row['total_case']; //deklarasi varaiabel total case
}
?>
<!DOCTYPE html>
<html> <!--tag pembuka HTML-->
<head>
	<title>Membuat Grafik Bar Chart Menggunakan Chart JS</title> <!--Judul HTML-->
	<script type="text/javascript" src="Chart.js"></script> <!--Menghubungkan ke file Chart.js-->
</head>
<body>
	<div class="container" align="center"> <!--class container-->
		<div style="width: 800px; height: 800px"> <!--ukuran canvas-->
			<br><div><h2 style="font-family: cursive;">Grafik Bar Chart Total Kasus Covid 19 di 10 Negara</h2></div> <!--judul-->
			<canvas id="myChart"></canvas> <!--memberikan id myChart-->
		</div>
		<script>
			var ctx = document.getElementById("myChart").getContext('2d'); //membuat grafik 2d berdasarkan id myChart
			var myChart = new Chart(ctx, {type: 'bar', //membuat tipe bar chart
				data: { //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
					labels: <?php echo json_encode($nama_negara);?>, //labels sama dengan variabel nama negara->country
					datasets: [{
						label: 'Total Cases', //memberi label untuk data pada bar chart
						data: <?php echo json_encode($total_case); //isi data diambil dari field variabel total_case->total cases
						?>,
						backgroundColor: 'rgba(100, 149, 237, 0.2)', //pengaturan warna
						borderColor: 'rgba(100, 149, 237, 1)', //pengaturan warna
						borderWidth: 1 //pengaturan tebal border
					}]
				},
				options: {
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero:true}
							}]
						}
					}
				});
		</script> <!--tag penutup script-->
	</div> <!--tag penutup div container-->
</body> <!--tag penutup body-->
</html><!--tag penutup HTML-->