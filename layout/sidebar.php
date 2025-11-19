<div class="left-side-bar">
		<div class="brand-logo">
			<a href="?mnu=home">
				<img src="vendors/images/deskapp-logo-white.jpg" alt="" class="dark-logo">
				<img src="vendors/images/deskapp-logo-white.jpg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
				
					<li class="dropdown">
						<a href="?mnu=home" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
					</li>
					
					<?php if($_SESSION["cstatus"]=="Siswa"){ ?>
						<li class="dropdown">
							<a href="?mnu=smateri" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-diagram"></span><span class="mtext">Materi</span>
							</a>
						</li>
						<li>
						<a href="?mnu=snilai" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">Nilai</span>
						</a>
					</li>
					<?php } else if($_SESSION["cstatus"]=="Administrator"){ ?>
					
					<li class="dropdown">
							<a href="?mnu=admin" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-browser2"></span><span class="mtext">Admin</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="?mnu=siswa" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-edit2"></span><span class="mtext">Siswa</span>
							</a>
						</li>
						<li class="dropdown">
							<a href="?mnu=materi" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-diagram"></span><span class="mtext">Materi</span>
							</a>
						</li>
						<li>
							<a href="?mnu=evaluasid" class="dropdown-toggle no-arrow">
								<span class="micon dw dw-chat3"></span><span class="mtext">Evaluasi</span>
							</a>
						</li>
						<li>
						<a href="?mnu=nilai" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">Nilai</span>
						</a>
					</li>
					<?php } else {} ?>
					<li>
						<div class="dropdown-divider"></div>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>