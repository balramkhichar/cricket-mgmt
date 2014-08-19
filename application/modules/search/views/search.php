<html>
<head>
	<title></title>

	<!-- <link rel="shortcut icon" href="css/images/favicon.png"> -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/base.css" rel="stylesheet">
	<!-- <link href="css/jquery-ui-1.8.23.custom.css" rel="stylesheet"> -->

</head>
<body>
	<div id="header">
  <div class="top_right">
    <h1>Statistics of International Test Cricket</h1>
  </div>
</div>

<div id="sidebar">
	<ul id="sidebar_menu" class="span3 navbar nav nav-list sidebar_box">
		<li>
			<a class="widgets"data-parent="#sidebar_menu" href="<?php echo base_url();?>">
			<img src="<?php echo base_url();?>assets/img/menu_icons/grid.png">Dashboard</a>
		</li>
		<li>
			<a class="widgets"data-parent="#sidebar_menu" href="<?php echo base_url();?>index.php/upload">
			<img src="<?php echo base_url();?>assets/img/menu_icons/gallery.png">Upload</a>
		</li>
		<li class="active">
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
		<h2>List of Top 10</h2>    	  	
		<!--<p>
			<select name="player">
            	<option value="no player">Select player</option>
               <?php //foreach($players as $player){?>
				<option value="<?php //echo $player->player_id;?>"><?php //echo $player->player_name;?></option>
               <?php //}?>
			</select>
			<select name="opponent" id="opponent">
            	<option value="no opponent">Select opponent</option>
            	<?php //foreach($against as $against_country){?>
				<option value="<?php //echo $against_country->against;?>"><?php //echo $against_country->against;?></option>
                <?php //}?>
			</select>
			<select name="venue">
            	<option value="no venue">Select venue</option>
            	<?php //foreach($venues as $venue){?>
				<option value="<?php //echo $venue->venue;?>"><?php //echo $venue->venue;?></option>
                <?php //}?>
			</select>
		<button type="button" style="margin-top: -0.5%;" class="btn btn-primary btn-sm">Go</button>
		</p>-->
		<table class="table table-striped">
		  <thead>
		    <tr>
		      <th><a href="javascript:void(0)" id="player_name_a" onClick="sort_res('player_name')">Player</a></th>
		      <th><a href="javascript:void(0)" id="runs_scored_a" onClick="sort_res('runs_scored')">Runs</a></th>
		      <th><a href="javascript:void(0)" id="against_a" onClick="sort_res('against')">Against</a></th>
		      <th><a href="javascript:void(0)" id="batting_position_a" onClick="sort_res('batting_position')">Pos</a></th>
		      <th><a href="javascript:void(0)" id="innings_a" onClick="sort_res('innings')">Innings</a></th>
		      <th><a href="javascript:void(0)" id="venue_a" onClick="sort_res('venue')">Venue</a></th>
		      <th><a href="javascript:void(0)" id="venue_type_a" onClick="sort_res('venue_type')">H/A/N</a></th>
		      <th><a href="javascript:void(0)" id="match_date_a" onClick="sort_res('match_date')">Date</a></th>
		      <th><a href="javascript:void(0)" id="result_a" onClick="sort_res('result')">Result</a></th>

		    </tr>
		  </thead>
		  <tbody id="result_body">
          <?php foreach($player_plus_data as $player_data){?>
		  	<tr><td><?php echo $player_data->player_name;?></td><td><?php echo $player_data->runs_scored;?></td><td><?php echo $player_data->against;?></td><td><?php echo $player_data->batting_position;?></td><td><?php echo $player_data->innings;?></td><td><?php echo $player_data->venue;?></td><td><?php echo $player_data->venue_type;?></td><td><?php echo $player_data->match_date;?></td><td><?php echo $player_data->result;?></td></tr>
		  <?php }?>
		  </tbody>
		</table>
		<div class="pagination pull-right ">
			  <ul>
			    <li><a href="javascript:void(0)" onClick="get_data('p')">Prev</a></li>
			    <?php for($i=1;$i<=($count/10);$i++){?>
                <li><a href="javascript:void(0)" onClick="get_data(<?php echo $i;?>)"><?php echo $i;?></a></li>
			    <?php }?>
			    <li><a href="javascript:void(0)" onClick="get_data('n')">Next</a></li>
                <input type="hidden" value="1" name="current_page" id="current_page">
                <input type="hidden" value="runs_scored" name="sort_by" id="sort_by">
			  </ul>
			</div>
	</div>
  </div> <!-- End .container -->
</div> <!-- End #main -->
<!-- Le javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script>
function get_data(x)
{
	var main_curr = document.getElementById('current_page').value;
	if(x=='p')
	{
		var val = document.getElementById('current_page').value;
		if(val==1)
		{
			val = 'error';
		}
		else
		{
			val = parseInt(val)-1;
			document.getElementById('current_page').value= val;
		}
	}
	else if(x=='n')
	{
		var val = document.getElementById('current_page').value;
		if(val==4)
		{
			val = 'error';
		}
		else
		{
			val = parseInt(val)+1;
			document.getElementById('current_page').value= val;
		}
	}
	else
	{
		var val = x;
		document.getElementById('current_page').value= val;
	}
	
	
	var sortby = document.getElementById('sort_by').value;
	
	if(val!='error'&&val!=main_curr)
	{
		$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/search/pagination",
				data: ({pageno:val, sort_by:sortby}),
				success: function(res)
				{
					document.getElementById('result_body').innerHTML=res;
				}
			});
	}
}

function sort_res(x)
{
	document.getElementById('sort_by').value= x;
	$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/search/sortby",
				data: ({sort_by:x}),
				success: function(res)
				{
					document.getElementById('result_body').innerHTML=res;
				}
	});
}
</script>
</body>
</html>