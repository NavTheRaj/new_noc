<nav class="navbar grey lighten-2">
		<ul class="nav ">
				<li class="nav-item">
				<a class="nav-link navbar-brand" href="index.php">
						<img src="img/subisu_logo.png" alt="Subisu Logo" class="navbar_logo">
				</a>
				</li>
		</ul>
		<ul class="nav ml-auto">
				<li class="nav-item"> 
				<a class="nav-link" href="">
						Welcome <?php echo $_SESSION['username'] ?>
				</a> 
				</li>
				<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink"
						data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-cog"></i>
				</a>
						<div class="dropdown-menu dropdown-primary dropdown-menu-right"
						aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="includes/logout.inc.php" name="logout">Logout</a>
				</div>
				</li>

		</ul>
</nav>
<div class="dropdown-menu">
		<a class="dropdown-item" href="#">Action</a>
		<a class="dropdown-item" href="#">Another action</a>
		<a class="dropdown-item" href="#">Something else here</a>
		<div class="dropdown-divider"></div>
		<a class="dropdown-item" href="#">Separated link</a>
</div>
