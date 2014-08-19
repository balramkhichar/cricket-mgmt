<title>Askup</title>
<link rel="icon" type="image/ico" href="<?php echo base_url();?>assets/images/favicon.ico"/>
<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
<?php if($this->session->userdata('user_username')==''){?>
<link href="<?php echo base_url();?>assets/css/stylesheet.css" rel="stylesheet">
<?php }else{?>
<link href="<?php echo base_url();?>assets/css/stylesheet_inside.css" rel="stylesheet">
<?php }?>