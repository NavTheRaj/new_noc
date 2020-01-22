<!--Main Navigation-->
<?php
$page = explode(".",explode("/",$_SERVER["SCRIPT_NAME"])[3])[0];
?>
<header>
		<nav class="navbar navbar-expand-lg navbar-dark special-color scrolling-navbar"><div class="container">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
								aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
								<ul class="navbar-nav mr-auto">
										<li class="nav-item <?php echo($page =='index'? 'active':'')?>">
												<a class="nav-link" href="index.php">Nodes <span class="sr-only">(current)</span></a>
										</li>
										<?php
										if($_SESSION['role'] == 'admin'){
												echo '<li class="nav-item ',($page =='departments'? 'active':''),'">
																<a class="nav-link" href="departments.php">Departments</a>
															</li>';

												echo '<li class="nav-item ',($page =='reasons'? 'active':''),'">
																<a class="nav-link" href="reasons.php">Reasons</a>
															</li>';
										}
										?>
										<li class="nav-item <?php echo($page =='nodelist'? 'active':'')?>">
												<a class="nav-link" href="nodelist.php">Report</a>
										</li>
								</ul>
						</div>
				</div>
		</nav>
</header>
