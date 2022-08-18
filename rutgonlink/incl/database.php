<?php
/**
 *		[HoaKhuya] (C)2010-2099 Hacking simple source Orzg.
 *		Drark license payto BitcoinAddress: 1HikvH2jnMNg4rDJHykMMk31gpyr2qrhU4
 *		Coders : develop@execs.com;yuna.elin@yandex.ru;tonghua@dr.com;
 *
 *		$Id: database.php [BuildDB.155478522] 10/07/2017 5:20 CH $
	
*/

session_start();ob_start();
error_reporting(0);
$http = explode('"',$_SERVER['HTTP_CF_VISITOR']);
if ($http[3]=="http") { $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];header('Location: ' . $redirect);}
# Frist config
define ("database","yFedzS_db/"); # LOCATION OF SHORTENED URL
define ("memdb","user_db_CrfG/"); # LOCATION OF DATABASE USER
define ("domain","shota.one"); # YOUR DOMAIN IS HERE
#
define ("sitename","Shota.ONE"); # YOUR SITE NAME
define ("slogan","Your long to short"); # YOUR SLOGAN
#
define ("title","Shota.ONE | Shota URL Shortener and Stored Platform"); # YOUR SITE TITLE
define ("description","Shorten your long url to more beautiful with shota.one and make some money for that."); # YOUR SITE description

#
define ("footer",'&copy; 2016 Shota.ONE <a  href="https://github.com/684102/shota.one" target="_blank">github project</a>'); # YOUR FOOTER


# incl
define ("config","incl/config.db"); # COUNTER NUMBER IS HERE.
	
include 'incl/function/function.class.php'; 
include 'incl/function/function.go.class.php';
include 'incl/function/function.user.class.php';
	
$C_CONFIG_KEY="Xsu9A9J7Z7CymA63Y5c8xEj8ZSJC9Jn79uy3S9jdRa7GbEP6v87n8w2cVG4juBBBW5YEzcxNR3w4zUk3mrTVDyh284U2gg6YxM9B"; # ENCRYPTION KEY HERE