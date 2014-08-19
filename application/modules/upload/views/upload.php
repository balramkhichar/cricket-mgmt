<html>
<head>
	<title></title>
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/base.css" rel="stylesheet">
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
		<li>
			<a class="widgets"data-parent="#sidebar_menu" href="<?php echo base_url();?>">
			<img src="<?php echo base_url();?>assets/img/menu_icons/grid.png">Dashboard</a>
		</li>
		<li class="active">
			<a class="widgets"data-parent="#sidebar_menu" href="<?php echo base_url();?>index.php/upload">
			<img src="<?php echo base_url();?>assets/img/menu_icons/gallery.png">Upload</a>
		</li>
		<li>
			<a class="widgets"data-parent="#sidebar_menu" href="<?php echo base_url();?>index.php/search">
			<img src="<?php echo base_url();?>assets/img/menu_icons/folder.png">Search</a>
		</li>
	</ul>
</div>

<div id="main">
  <div class="container">
    <div id="errors"></div>
    <!-- End container_top -->
      <div class="row-fluid">
      	<h1>Upload New player Data</h1>
      	<!-- <div class="span3"></div> -->
      	<div class="well span6">
        <?php if($success_flag==1){?>
        <div class="alert alert-success">Player data uploaded successfully !!</div>
        <?php }?>
        <?php if($success_flag==2){?>
        <div class="alert alert-danger">OOPS ! Some Error Occured, Try Again !!</div>
        <?php }?>
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/upload/insert" method="post" enctype="multipart/form-data">
                <div class="form-row control-group row-fluid ">
					<label class="control-label span3">Player Name</label>
					<div class="controls span9">
						<input type="text" name="player_name" id="player-name" required>
					</div>
				</div>
                <div class="form-row control-group row-fluid ">
					<label class="control-label span3">Upload File<span class="help-block">only .csv files</span></label>
					<div class="controls span9">
						<input type="file" name="csv" id="file-upload" required>
					</div>
				</div>
				<div class="controls span9">
					<input type="Submit" value="Upload">
				</div>
			</form>
		</div>
	</div>
  </div> <!-- End .container -->
</div> <!-- End #main -->
<!-- Le javascript
    ================================================== -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
</body>
</html>