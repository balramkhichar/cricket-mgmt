<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Url_detector {

	public function autolink($string)
	{
		$content_array = explode(" ", $string);
		$output = '';
		
		foreach($content_array as $content)
		{
			//starts with http://
			if(substr($content, 0, 7) == "https://")
			$content = '<a href="' . $content . '">' . $content . '</a>';
			
			//starts with www.
			if(substr($content, 0, 4) == "www.")
			$content = '<a href="https://' . $content . '">' . $content . '</a>';
			
			$output .= " " . $content;
		}
		
		$output = trim($output);
		return $output;
	}
}