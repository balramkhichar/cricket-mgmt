<html>
<head>
	<title>IPSC</title>

	<!-- <link rel="shortcut icon" href="css/images/favicon.png"> -->
	<link href="<?php base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php base_url();?>assets/css/base.css" rel="stylesheet">
	<!-- <link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet"> -->

</head>
<body>
	<div id="header">
  <div class="top_right">
	<h1>Statistics of International Test Cricket<h1>  
	</div>
</div>

<div id="sidebar">
	<ul id="sidebar_menu" class="span3 navbar nav nav-list sidebar_box">
		<li class="active">
			<a class="widgets"data-parent="#sidebar_menu" href="<?php base_url();?>">
			<img src="<?php base_url();?>assets/img/menu_icons/grid.png">Dashboard</a>
		</li>
		<li>
			<a class="widgets"data-parent="#sidebar_menu" href="<?php base_url();?>index.php/upload">
			<img src="<?php base_url();?>assets/img/menu_icons/gallery.png">Upload</a>
		</li>
		<li>
			<a class="widgets"data-parent="#sidebar_menu" href="<?php base_url();?>index.php/search">
			<img src="<?php base_url();?>assets/img/menu_icons/folder.png">Search</a>
		</li>
	</ul>
</div>

<div id="main">
  <div class="container">
    <div id="errors"></div>
    <!-- End container_top -->
	<div class="row-fluid">
		<h1>Statistics of International Test Cricket</h1>
			<p>*Data available for following players only.</p>

			<!-- Load this list dynamically based on the data available in the database -->

			<table class="span3 central table table-striped">
				<thead>
					<tr>
						<th>Player Name</th>
					</tr>
				</thead>
				<tbody>
                <?php 
				if(count($players)==0)
				{
					echo '<tr><td>No data ! Upload Players Data.</td></tr>';	
				}
				else
				{
				foreach($players as $player){?>
					<tr><td><?php echo $player->player_name;?></td></tr>
                <?php } }?>
				</tbody>
			</table>
	</div>
  </div> <!-- End .container -->
</div> <!-- End #main -->
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php base_url();?>assets/js/jquery.js"></script>
</body>
</html>