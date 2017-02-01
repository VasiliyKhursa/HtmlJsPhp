<?php
	include_once 'connect.php';

    function connect_db($user_name, $user_pass)  {
    	global $my_msql;
		$yes = 0;

		foreach ($my_msql as $my_msql1) {
			if (in_array($user_name, $my_msql1) === true && in_array($user_pass, $my_msql1) === true) {
               echo 'hello '.$user_name.' <br>';
			   $yes = 1;
			}
		}

		if ($yes !== 1) {
			echo "error login";
		}
    }
?>