			<div class="card-box pd-20 height-90-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="vendors/images/banner-img.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							Selamat Datang!<div class="weight-600 font-30 text-blue"><a href="http://localhost/webadmin/" target="_blank">RuangArief!</a></div>
						</h4>
						<p class="font-18 max-width-600">ini adalah aplikasi sekolah virtual RuangArief untuk sarana belajar para siswa dan siswi Jurusan Teknik Komputer dan Jaringan, dan Analis Kesehatan. Dengan ini para guru dapat memberikan materi, modul pembelajaran, ujian, quiz, dsb dengan cara online yang dapat diakses oleh para siswa dan siswi dengan smartphone ataupun laptop mereka.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">2</div>
								<div class="weight-600 font-14">Siswa</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">3</div>
								<div class="weight-600 font-14">Materi</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">2</div>
								<div class="weight-600 font-14">Evaluasi</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">85</div>
								<div class="weight-600 font-14">Nilai</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activitas</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Rating Web</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
			
			
					
			
			
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">No</th>
									<th scope="col">Nama siswa</th>
									<th scope="col">Email</th>
									<th scope="col">Jurusan</th>
									<th scope="col">Telepon</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$sql = "select * from `$tbsiswa`  order by `id_siswa` desc";
								$jum = getJum($conn, $sql);
								if ($jum > 0) {
									$no=1;
											$arr = getData($conn, $sql);
									foreach ($arr as $d) {
										$id_siswa = $d["id_siswa"];
										$nama_siswa = ucwords($d["nama_siswa"]);
										$email = $d["email"];
										$jurusan = $d["jurusan"];
										$telepon = $d["telepon"];
										$username = $d["username"];
										$password = $d["password"];
										$status = $d["status"];
										$keterangan = $d["keterangan"];
										
										
										
								echo" 
								<tr>
									<td>$no</td>
									<td>$nama_siswa</td>
									<td>$email</td>
									<td>$jurusan</td>
									<td>$telepon</td>	
								</tr>";
										$no++;
									} //for dalam
								} //if
								else {
									echo "<tr><td colspan='6'><blink>Maaf, Data siswa belum tersedia...</blink></td></tr>";
								}
								?>
												
							</tbody>
						</table>
					</div>