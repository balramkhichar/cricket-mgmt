<script src="https://code.jquery.com/jquery.js"></script>
<!--<script src="<?php echo base_url();?>assets/js/searchbarjs.js"></script>-->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/modernizr.custom.26633.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.gridrotator.js"></script>

<script>
$(document).ready(function(){
	$('.middle-container').on('click', function(){
		$('#first_modal').slideUp();	
	})	;
	
	$('#searchbox').keyup(function(){
		$('#first_modal').slideDown();	
	});
});
</script>

<script>
	$(document).ready(function(){
	$("#searchbox").keyup(function()
	{
	var searchbox = $(this).val();
	if(searchbox!=''){
		document.getElementById('searchlist').style.display='block';
		var dataString = 'searchword='+ searchbox;
			$.ajax({
				type: "POST",
				url: "<?php echo base_url();?>search/chk",
				data: dataString,
				cache: false,
				success: function(html)
				{
					$("#searchlist").html(html);
				}
			});
		return false;
	}
	else
	{
		document.getElementById('searchlist').style.display='none';
	}
	});
	
	});
</script>