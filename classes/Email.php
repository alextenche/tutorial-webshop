<?php
require_once('PHPMailer_v5.1/PHPMailer.php');
	
class Email{

	private $objMailer;
	
	
	// constructor
	public function __construct() {
		$this->objMailer = new PHPMailer();
		$this->objMailer->IsSMTP();  					                                           
		$this->objMailer->SMTPAuth = true;                 
		$this->objMailer->SMTPKeepAlive = true;           
		$this->objMailer->Host = 'smtp.gmail.com';       
		$this->objMailer->Port = 465;
		$this->objMailer->SMTPSecure = 'ssl';
		$this->objMailer->Username = 'alex.tenche@gmail.com';
		$this->objMailer->Password = 'andreiplesu';
		$this->objMailer->SetFrom('alex.tenche@gmail.com', 'eCommerce');
		$this->objMailer->AddReplyTo('alex.tenche@gmail.com', 'eCommerce');	
	}
	
	
	// composing the mail
	public function process($case = null, $array = null) {
	
		if (!empty($case)) {
		
			switch($case) {
				
				case 1:
					// add url to the array
					$link  = "<a href=\"".SITE_URL."/ecommerce/index.php?page=activate&code=";
					$link .= $array['hash'];
					$link .= "\">";
					$link .= SITE_URL."/ecommerce/index.php?page=activate&code=";
					$link .= $array['hash'];
					$link .= "</a>";
					$array['link'] = $link;
					
					$this->objMailer->Subject = "Activate your account";
					
					$this->objMailer->MsgHTML($this->fetchEmail($case, $array));
					$this->objMailer->AddAddress($array['email'], $array['first_name'].' '.$array['last_name']);
					break;
			}
			
			// send email
			if ($this->objMailer->Send()) {
				$this->objMailer->ClearAddresses();
				return true;
			}
			return false;
		}
	}
	

	// fetch email for case (1 in our case)
	public function fetchEmail($case = null, $array = null) {
	
		if (!empty($case)) {
			
			if (!empty($array)) {			
				foreach($array as $key => $value) {
					${$key} = $value;
				}			
			}
			
			ob_start();
			require_once(EMAILS_PATH.DS.$case.".php");
			$out = ob_get_clean();
			return $this->wrapEmail($out);
		}
	}
	
	
	// wrap email - how the email looks
	public function wrapEmail($content = null) {
		if (!empty($content)) {
			return "<div style=\"font-family:Arial,Verdana,Sans-serif;font-size:12px;color:#333;line-height:21px;\">{$content}</div>";
		}
	}

}
