<?PHP
	ob_start();
	session_start();
	unset($_SESSION["login_user"]);  
    session_destroy(); 
	$_SESSION['login_user'] = "";

	session_write_close(void);	
	ob_flush();
		header ("Location: ../");
?>

