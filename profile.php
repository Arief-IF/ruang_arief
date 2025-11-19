<div class="main-container">
	<div class="pd-ltr-20 xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="title">
							<h4>Profile</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="?mnu=home">Home</a></li>
								<li class="breadcrumb-item"><a href="?mnu=profile1">Profile</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
					<div class="pd-20 card-box height-100-p">
						<div class="profile-photo">
							<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
							<img src="vendors/images/foto1.jpg" alt="" class="avatar-photo">
							<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content">
										<div class="modal-body pd-5">
											<div class="img-container">
												<img id="image" src="vendors/images/foto1.jpg" alt="Picture">
											</div>
										</div>
										<div class="modal-footer">
											<input type="submit" value="Update" class="btn btn-primary">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
						</div>
							<?php
								$id_admin = $_SESSION["cid"];
								$sql = "select * from `$tbadmin` where `id_admin`='$id_admin'";
								$d = getField($conn, $sql);
								$id_admin = $d["id_admin"];
								$nama_admin = $d["nama_admin"];
								$username = $d["username"];
								$password = $d["password"];
								$telepon = $d["telepon"];
								$email = $d["email"];
								$status = $d["status"];
								$keterangan = $d["keterangan"];
							?>
							<h5 class="text-center h5 mb-0"><?php echo $_SESSION["cnama"]; ?></h5>
							<p class="text-center text-muted font-14"><?php echo $_SESSION["cstatus"]; ?></p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Informasi Kontak</h5>
								<ul>
									<li>
										<span>Email Address:</span>
										<?php echo $email; ?>
									</li>
									<li>
										<span>Phone Number:</span>
										<?php echo $telepon; ?>
									</li>
									<li>
										<span>Negara:</span>
										Indonesia
									</li>
								</ul>
							</div>
							<div class="profile-social">
								<h5 class="mb-20 h5 text-blue">Social Media Links</h5>
								<ul class="clearfix">
									<li><a href="https://www.facebook.com/arief.i.fanani.1/" target="new" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
									<li><a href="https://twitter.com/FananiIchwan" target="new" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
									<li><a href="https://www.instagram.com/arief_ichwan.f/?hl=id" target="new" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
								</ul>
							</div>
							
						<div class="profile-skills">
							<h5 class="mb-20 h5 text-blue">Key Skills</h5>
							<h6 class="mb-5 font-14">HTML</h6>
							<div class="progress mb-20" style="height: 6px;">
								<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<h6 class="mb-5 font-14">CSS</h6>
							<div class="progress mb-20" style="height: 6px;">
								<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<h6 class="mb-5 font-14">PHP</h6>
							<div class="progress mb-20" style="height: 6px;">
								<div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<h6 class="mb-5 font-14">Bootstrap</h6>
							<div class="progress mb-20" style="height: 6px;">
								<div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
							<h6 class="mb-5 font-14">JavaScript</h6>
							<div class="progress mb-20" style="height: 6px;">
								<div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
					<div class="card-box height-100-p overflow-hidden">
						<div class="profile-tab height-100-p">
							<div class="tab height-100-p">
								<ul class="nav nav-tabs customtab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Ubah Akun</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active height-100-p" id="setting" role="tabpanel">
										<div class="profile-setting">
											<form method="post">
												<ul class="profile-edit-list row">
													<li class="weight-500 col-md-6">
														<h4 class="text-blue h5 mb-20">Ubah Akun</h4>
															<div class="form-group">
																<label>Nama Lengkap</label>
																<input class="form-control form-control-lg" type="text" name="nama_admin" value="<?php echo $nama_admin; ?>">
															</div>
															<div class="form-group">
																<label>Email</label>
																<input class="form-control form-control-lg" type="email" name="email" value="<?php echo $email; ?>">
															</div>
															<div class="form-group">
																<label>Telepon</label>
																<input class="form-control form-control-lg " type="text" name="telepon" value="<?php echo $telepon; ?>">
															</div>
															<div class="form-group">
																<label>Username</label>
																<input class="form-control form-control-lg " type="text" name="username" value="<?php echo $username; ?>">
															</div>
															<div class="form-group">
																<label>Password</label>
																<input class="form-control form-control-lg " type="text" name="password" value="<?php echo $password; ?>">
															</div>
															
															<div class="form-group">
																<div class="custom-control custom-checkbox mb-5">
																	<input type="checkbox" class="custom-control-input" id="customCheck1-1">
																	<label class="custom-control-label weight-400" for="customCheck1-1">Saya setuju untuk menerima email pemberitahuan</label>
																</div>
															</div>
															<div class="form-group mb-0">
																<input type="submit" name="Update" class="btn btn-primary" value="Update Information">
																<input name="id_admin" type="hidden" id="id_admin" value="<?php echo $id_admin; ?>" />
						
															</div>
													</li>
												</ul>
											</form>
										</div>
									</div>
										

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php
		if (isset($_POST["Update"])) {
			$id_admin = strip_tags($_POST["id_admin"]);
			$username = strip_tags($_POST["username"]);
			$nama_admin = strip_tags($_POST["nama_admin"]);
			$password = strip_tags($_POST["password"]);
			$telepon = strip_tags($_POST["telepon"]);
			$email = strip_tags($_POST["email"]);
			$status = strip_tags($_POST["status"]);
			$keterangan = strip_tags($_POST["keterangan"]);

				$sql = "update `$tbadmin` set 
					`nama_admin`='$nama_admin',
					`username`='$username',
					`password`='$password',
					`telepon`='$telepon' ,
					`email`='$email'
					 where `id_admin`='$id_admin'";
					 
				$ubah = process($conn, $sql);
				if ($ubah) {
					echo "<script>alert('Data $nama_admin berhasil diubah !');document.location.href='?mnu=profile';</script>";
				} else {
					echo "<script>alert('Data $nama_admin gagal diubah...');document.location.href='?mnu=profile';</script>";
				}
			} //else simpan
		?>