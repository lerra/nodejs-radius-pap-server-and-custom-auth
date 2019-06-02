<?php
//This is custom libs for birdie, you will need to remove this and then setup the mysql part your self
include 'include/xmldb.php';
include 'include/options.php';


if ($_GET[key]!="API-KEY-CHANGE-ME")
	exit(0);

//Our function to check for the username and get the EAN as result, you need to create your own custom mechanism
if ($_GET[type]=="ean-8021x")
{
   $connection = birdie_connect();

	$username=mysql_real_escape_string($_POST['username']);

    $select=" select wristband.EAN from wristband natural join Members where Members.Email  = '$username'";

    
    $result=mysql_query($select);

	$row=mysql_fetch_array($result);
	$i=count($row);
	if ($i>=2)
	{
		//The reason why we print the EAN is PAP must have the "password" in cleartext 
		print_r($row[0]);
	}
	else
		echo "FAIL";
    exit(0);
}


?>
