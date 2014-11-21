<?php
class Core {
	
	public function run() {
		ob_start();  // output buffering
		require_once( Url::getPage() );
		ob_get_flush();
	}

}