<?php // derived from http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysql_connect("","",""))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("login"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>