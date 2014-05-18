<?php
class simpleEcho {
	
    function __construct($echoStr) {
		//$this->echoStr = $echoStr;
		$echoString = $echoStr;
		$GLOBALS['echoString'] = $echoStr;
    }    
	function echoString() {
		echo "Hello " . $GLOBALS['echoString'];
    }  
}
?>
