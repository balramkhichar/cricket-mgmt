<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('url_detector'))
{
	function url_detector($string)
	{
		$reg_exUrl = "@((https?://)?([-\w]+\.[-\w\.]+)+\w(:\d+)?(/([-\w/_\.]*(\?\S+)?)?)*)@";
		if(preg_match($reg_exUrl, $string, $url))
		{
		       echo preg_replace($reg_exUrl, "<a target='_blank' href='{$url[0]}'>{$url[0]}</a> ", $string);
		} else
		{
		      
				echo $string;
		}
		
		
		
	}
}


/* End of file inflector_helper.php */
/* Location: ./system/helpers/inflector_helper.php */