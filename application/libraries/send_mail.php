<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Send_mail {

    public function mail_user($email, $ask_by, $que, $id)
    {
		$url = 'http://sendgrid.com/';
		$user = 'vatsanatech';
		$pass = 'empire1990';
		
		
		$params = array(
			'api_user'  => $user,
			'api_key'   => $pass,
			'to'        => $email,
			'subject'   => 'New Question on Askup',
			'html'      => 'You have received a new question on <b>Askup</b><br><br>Question: <b>'.$que.'</b><br>By:'.$ask_by.'<br><br><a href="http://www.askup.in/questions/view/'.$id.'">View Question</a>',
			'text'      => 'You have received a new question on <b>Askup</b><br><br>Question: <b>'.$que.'</b><br>By:'.$ask_by.'<br><br><a href="http://www.askup.in/questions/view/'.$id.'">View Question</a>',
			'from'      => 'no-reply@askup.in',
		  );
		
		
		$request =  $url.'api/mail.send.json';
		
		// Generate curl request
		$session = curl_init($request);
		// Tell curl to use HTTP POST
		curl_setopt ($session, CURLOPT_POST, true);
		// Tell curl that this is the body of the POST
		curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
		// Tell curl not to return headers, but do return the response
		curl_setopt($session, CURLOPT_HEADER, false);
		curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
		
		// obtain response
		$response = curl_exec($session);
		curl_close($session);
		
		// print everything out
		//print_r($response);
    }
}