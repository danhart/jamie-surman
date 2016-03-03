<?php

require_once "Mail.php";
 
class sslEmail {
	private $smtp_connect;
	private $from;
	private $to;
	private $subject;
	private $body;
	
	function __construct($username, $password, $host = 'ssl://smtp.gmail.com', $port = '465') {
		$this->smtp_connect['username'] = $username;
		$this->smtp_connect['password'] = $password;
		$this->smtp_connect['host'] = $host;
		$this->smtp_connect['port'] = $port;
		$this->smtp_connect['auth'] = true;
	}
	
	function sendEmail($from, $to, $subject, $body) {
		$this->from = $from;
		$this->to = $to;
		$this->subject = $subject;
		$this->body = $body;
		
		$headers = array(
			'From' => $this->from,
			'To' => $this->to,
			'Subject' => $this->subject
		);
		
		$smtp = Mail::factory('smtp', $this->smtp_connect);
		
		$mail = $smtp->send($this->to, $headers, $this->body);

		if (PEAR::isError($mail)) {
			return htmlspecialchars($mail->getMessage());
		} else {
			return false;
		}
		
	}
}

?>