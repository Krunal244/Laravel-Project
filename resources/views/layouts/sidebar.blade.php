<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="" class="site_title"><strong>Crane App CMS</strong></a>
		</div>
		<div class="clearfix"></div>
		<!-- sidebar menu -->
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<?php if(auth()->user()->isAdmin == 1){?>
				<ul class="nav side-menu">
					<li><a href="{{ url('user') }}"> <i class="fa fa-user"></i> Users</a></li>
				</ul>
				<?php } else {?>
				<ul class="nav side-menu">
					<li><a href="{{ url('profile') }}"> <i class="fa fa-user"></i> Users Profile</a></li>
				</ul>
				<?php }?>
			</div>
		</div>
		<!-- /sidebar menu -->
	</div>
</div>