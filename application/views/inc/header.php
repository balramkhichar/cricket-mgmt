<?php if($this->session->userdata('user_username')==''){?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container ">
    <div class="row header_con">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6"><a  href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/images/askuplogo.png" class="img-responsive" alt="Askup" border="0" height="30" /></a></div>
      <div class="col-lg-9 col-md-9 col-sm-6 col-xs-6"><a href="<?php echo base_url();?>signup" class="btn btn-success btn-sm pull-right">Join Now</a></div>
    </div>
    <div class="navbar-header"> </div>
  </div>
<span class="noti-fication-icon" id="ans-noty" style="display: none;">0</span>
<span id="que-noty" style="display: none;">0</span>
</div>
<?php }else{?>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container ">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="<?php echo base_url();?>wall"><img src="<?php echo base_url();?>assets/images/askuplogo.png" class="img-responsive" alt="Askup" border="0" /></a> </div>
      <ul class="nav navbar-nav navbar-right details_notification">
        <li class="dropdown noti-fication"> <a href="javascript:void(0);" onClick="get_noty()" class="dropdown-toggle bell-noti-hover" data-toggle="dropdown"><i class="fa fa-question-circle bell-noti" data-placement="bottom" data-toggle="tooltip" data-original-title="Questions"></i> <span id="que-noty" style="display: none;">0</span></a>
          <ul class="dropdown-menu modi-dropdown">
            <div class="noti-head"> <span>
              <h5>Questions Notification</h5>
              </span>
              <!--<a href="javascript:void(0);">Mark as read</a>-->
              <!--<a href="javascript:void(0);">Setting</a>-->
            </div>
            <div style="clear:both;"></div>
            <div class="dropdown-div" id="noty_list">
              
            </div>
            <div class="view-all" style="border-top: 1px solid #ccc;"><a href="<?php echo base_url();?>questions">View All Questions</a></div >
          </ul>
        </li>
        <li class="dropdown noti-fication answer-noti-icon"> <a href="javascript:void(0);" onClick="get_noty_ans()" class="dropdown-toggle answer-noti" data-toggle="dropdown"><i class="fa fa-share fa-rotate-180 answer-icon" style="margin-top:3px;" data-placement="bottom" data-toggle="tooltip" data-original-title="Answers"></i> <span class="noti-fication-icon" id="ans-noty" style="display: none;">0</span></a>
          <ul class="dropdown-menu modi-dropdown">
            <div class="noti-head"> <span>
              <h5>Answers Notification</h5>
              </span>
              <!--<a href="javascript:void(0);">Mark as read</a>-->
              <!--<a href="javascript:void(0);">Setting</a>-->
            </div>
            <div style="clear:both;"></div>
            <div class="dropdown-div" id="noty_list_ans">
              
            </div>
            <div class="view-all" style="border-top: 1px solid #ccc;"><a href="<?php echo base_url();?>answers">View All Answers</a></div >
          </ul>
        </li>
        <li class="dropdown mob-icon-hover"> <a href="javascript:void(0);" class="dropdown-toggle sett-ing-icon" data-toggle="dropdown"><i class="fa fa-cog sett-ing" data-placement="bottom" data-toggle="tooltip" data-original-title="Settings"></i></a>
          <ul class="dropdown-menu setting-icon-list">
            <li><a href="<?php echo base_url();?>settings"><i class="fa fa-user"></i> Profile</a></li>
            <li><a href="<?php echo base_url();?>settings/privacy"><i class="fa fa-lock"></i> Privacy</a></li>
            <li><a href="<?php echo base_url();?>settings/design"><i class="fa fa-pencil"></i> Design</a></li>
            <li><a href="<?php echo base_url();?>logout"><i class="fa fa-power-off"></i> Logout</a></li>
          </ul>
        </li>
        <li class="mob-icon-hover"> <a href="javascript:void(0)" class="compose" style="padding-top:6px; padding-bottom:0px;" data-placement="bottom" data-toggle="tooltip" data-original-title="Ask Question"> <span class="fa-stack fa-lg" data-toggle="modal" href="#home_page" onClick="get_followers(<?php echo $this->session->userdata('user_id'); ?>)"> <i class="fa fa-square fa-stack-2x compose-btn-desk compose-btn-mob hidden-xs hidden-sm"></i> <i class="fa fa-pencil-square-o fa-stack-1x fa-inverse"></i> </span> </a>
        </li>
      </ul>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url();?>wall"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="<?php echo base_url();?>questions"><i class="fa fa-question"></i> Questions</a></li>
          <li><a href="<?php echo base_url();?><?php echo $this->session->userdata('user_username');?>"><i class="fa fa-user"></i> Profile</a></li>
          <li><a href="<?php echo base_url();?>friends"><i class="fa fa-users"></i> Friends</a></li>
        </ul>
        <div class="col-lg-4 col-md-2 col-sm-2 col-xs-6" style="padding-right:0px; padding-left:0px; margin-top:1%;">
        <form role="form" >
                  <div class="form-group" >
                    <ul class="list-unstyled msg_text_id" style="border: 1px solid #ccc; min-height: 28px; border-radius: 4px; margin-bottom:0px; background:#fff;">
                        <li>
                            <input type="text" class="form-control" id="searchbox" placeholder="Search for People, places and things.." style="border:none; height:28px;" >
                        </li>
                    </ul>
                  </div>
				<div id="first_modal" class="search-people-box">
					<div class="messages" id="searchlist" style="margin-bottom: 0;">
                    </div>
                </div>
        </form>
        </div>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
    <!--/.nav-collapse -->
  </div>
</div>
<?php }?>