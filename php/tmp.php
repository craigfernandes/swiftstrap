<?php
  
  /**
   *  @Description: Use this to write the flash contents
   *         		  to dat.txt
   *
   *
   *
   **/

	$tmp = $_POST['title'];
	
	$fp = fopen('dat.txt', 'w');
	fwrite($fp, $tmp);
	fclose($fp);


?>