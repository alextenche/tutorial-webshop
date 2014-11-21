<?php
require_once('PHPMailer_v5.1/PHPMailer.php');
	
class Email{

	private $objMailer;
	
	// - good
	public function __construct() {
		
		$this->objMailer = new PHPMailer();
		$this->objMailer->IsSMTP();  					   // sending using smtp
		$this->objMailer->SMTPAuth = true;                 // provider
		$this->objMailer->SMTPKeepAlive = true;            //
		$this->objMailer->Host = 'smtp.gmail.com';          // provider
		$this->objMailer->Port = 465;
		$this->objMailer->SMTPSecure = 'ssl';
		$this->objMailer->Username = 'alex.tenche@gmail.com';
		$this->objMailer->Password = 'andreiplesu';
		$this->objMailer->SetFrom('alex.tenche@gmail.com', 'LexuCuFlexu');
		$this->objMailer->AddReplyTo('alex.tenche@gmail.com', 'LexuCuFlexu');
		
	}
	
	
	// - good
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
				$this->objMailer->AddAddress(
					$array['email'], 
					$array['first_name'].' '.$array['last_name']
				);
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
	
	
	
	// fetch email - good
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
	
	
	
	// - good
	public function wrapEmail($content = null) {
		if (!empty($content)) {
			return "<div style=\"font-family:Arial,Verdana,Sans-serif;font-size:12px;color:#333;line-height:21px;\">{$content}</div>";
		}
	}










}
?>