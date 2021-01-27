<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">

	<nav id="compactSidebar">

		<div class="theme-logo">
			<a href="index.html">
				<img src="<?php echo base_url(); ?>assets/assets/img/90x90.jpg" class="navbar-logo" alt="logo">
			</a>
		</div>

		<ul class="menu-categories">
			<li class="menu active">
				<a href="#dashboard" data-active="true" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Dashboard</span></div>
			</li>

			<li class="menu">
				<a href="#app" data-active="false" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Settings</span></div>
			</li>


			<li class="menu">
				<a href="#users" data-active="false" class="menu-toggle">
					<div class="base-menu">
						<div class="base-icons">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
						</div>
					</div>
				</a>
				<div class="tooltip"><span>Users</span></div>
			</li>



		</ul>

	</nav>

	<div id="compact_submenuSidebar" class="submenu-sidebar">

		<div class="theme-brand-name">
			<a href="index.html">Suprema</a>
		</div>

		<div class="submenu" id="dashboard">
			<div class="category-info">
			</div>

			<ul class="submenu-list" data-parent-element="#dashboard">
				<li class="active">
					<a href="index.html"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg> Home </a>
				</li>

			</ul>
		</div>

		<div class="submenu" id="app">
			<div class="category-info">
			</div>
			<ul class="submenu-list" data-parent-element="#app">

				<li>
					<a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
									 class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
							<polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Reports Settings</a>
				</li>

			</ul>
		</div>

		<div class="submenu" id="users">
			<div class="category-info">

			</div>
			<ul class="submenu-list" data-parent-element="#users">
				<li>
					<a href="#"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Profile </a>
				</li>
				<li>
					<a href="#"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg></span> Account Settings </a>
				</li>
			</ul>
		</div>



	</div>

</div>
<!--  END SIDEBAR  -->
