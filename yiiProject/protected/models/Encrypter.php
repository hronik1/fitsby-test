<?php

class Encrypter{
	
	public function encrypt($inPassword){
		return(md5($inPassword.md5($inPassword)));
	}

}
?>