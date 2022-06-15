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
<head>
	<title>Membuat Grafik Pie Chart Menggunakan Chart JS</title> <!--Judul HTML-->
	<script type="text/javascript" src="Chart.js"></script> <!--Menghubungkan ke file Chart.js-->
</head>
<body>
	<div class="container" align="center"> <!--class container-->
		<div id="canvas-holder" style="width:60%"> <!--ukuran canvas-->
			<h2 style="font-family: cursive;">Grafik Pie Chart Total Kasus Covid 19 di 10 Negara</h2> <!--judul-->
			<canvas id="chart-area"></canvas> <!--memberikan id chart-area-->
		</div>
		<script>
			var config = {
				type: 'pie', //membuat tipe pie chart
				data: { 
					datasets: [{ //fungsi json yaitu mengembalikan json (javascript object notion) dari suatu nilai. Jadi digunakan untuk pertukaran dan penyimpanan data
						data:<?php echo json_encode($total_case);
						?>, //mengambil data total_case untuk ditampilkan menjadi pie chart
						backgroundColor: [ //pengaturan warna untuk background pie chart
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
						borderColor:[ //pengaturan warna untuk border pie chart
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
					labels:<?php echo json_encode($nama_negara);?>}, //labels sama dengan variabel nama negara->country
					options: {
						responsive: true
					}
				}; //menggunakan fungsi onload ketika halaman website di refresh akan menampilkan chart pie dengan memanggil id chart-area
				window.onload = function(){ 
					var ctx = document.getElementById('chart-area').getContext('2d'); //membuat grafik 2d berdasarkan id chart-area
					window.myPie = new Chart (ctx, config);
				}; //fungsi dibawah ini digunakan ketika ingin mengubah isi dataset (data yang ada di dalam chart) secara acak atau random
				document.getElementById('randomizeData').addEventListener('click', function(){
					config.data.datasets.forEach(function(dataset){
						dataset.data = dataset.data.map(function(){
							return randomScalingFactor();
						});
					});
					window.myPie.update();
				}); //fungsi dibawah ini digunakan ketika ingin menambahkan dataset (data yang ada di dalam chart)
				var colorNames = Object.keys(window.chartColors);
				document.getElementById('addDataset').addEventListener('click', function(){
					var newDataset ={
						backgroundColor: [],
						data: [],
						label: 'New dataset ' + config.data.datasets.length,};
						for (var index = 0; index < config.data.labels.length; ++index){
							newDataset.data.push(randomScalingFactor());
							var colorName = colorNames[index %colorNames.length];
							var newColor = window.chartColors[colorName];
							newDataset.backgroundColor.push(newColor);
						}
						config.data.datasets.push(newDataset);
						window.myPie.update();
					}); //fungsi dibawah ini digunakan ketika ingin menghapus dataset (data yang ada di dalam chart)
				document.getElementById('removeDataset').addEventListener('click', function(){
					config.data.datasets.splice(0, 1);
					window.myPie.update();
				});
		</script> <!--tag penutup script-->
	</div> <!--tag penutup div container-->
</body> <!--tag penutup body-->
</html><!--tag penutup HTML-->