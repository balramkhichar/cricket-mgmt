<!DOCTYPE html>
<html lang="en">

    <head>
    <?php $this->load->view('inc/meta.php');?>
    <?php $this->load->view('inc/header_script.php');?>
    <?php $this->load->view('inc/footer_script.php');?>
    </head>
    
    <body
    <?php if(isset($page_title))
	{?>
		style=" <?php if($this->session->userdata('back_img_type')==0)
		{?>
			background:url(https://s3.amazonaws.com/askup/<?php echo $user_info->user_id;?>/background_picture/<?php echo $user_info->user_background;?>) fixed;
		<?php }else{?>
			background:url(https://s3.amazonaws.com/askup/<?php echo $user_info->user_id;?>/background_picture/800/<?php echo $user_info->user_background;?>) fixed;
		<?php }?>"
    <?php
    }elseif($this->session->userdata('user_username')!=''&&!isset($page_title))
	{?>
		style=" <?php if($this->session->userdata('back_img_type')==0)
		{?>
			background:url(https://s3.amazonaws.com/askup/<?php echo $this->session->userdata('user_id');?>/background_picture/<?php echo $this->session->userdata('back_img');?>) fixed;
		<?php }else{?>
			background:url(https://s3.amazonaws.com/askup/<?php echo $this->session->userdata('user_id');?>/background_picture/800/<?php echo $this->session->userdata('back_img');?>) fixed;
		<?php }?>"
    <?php
    }
	?>
    
    >
    
    <?php $this->load->view('inc/header.php');?>
    <div class="middle-container">
	<?php $this->load->view($main_content); ?>
    </div>
    </body>
</html>