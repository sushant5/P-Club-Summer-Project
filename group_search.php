<html>
<head>
	<title>groups</title>
		<?php session_start();
if(!$_SESSION['loggedin'])
{
header("Location:login.php");
exit;
}
?>
	<style type="text/css">
	.my{color: red; font-size: 15pt;}
	.align{text-align: center; color: blue;}
	</style>
</head>
<body style="background-color:lavender;">
	<h1 style="text-align:Center;"><i><b><font class="id2"><ins>SHARE ur FARE</ins></font></b></i></h1> 
	<hr> 
	<font class="id1">Disclaimer:</font>
	<hr>
	<hr> 
	<p style="word-spacing: 3em;">
		<a href="" target=_top STYLE="text-decoration: none"><i><b><font class="id3">Home</font></b></i></a>
		<a href="create_group.php" target=_top STYLE="text-decoration: none"><i><b><font class="id3">CreateGroup</font></b></i></a> 
		<a href="" target=_top STYLE="text-decoration: none"><i><b><font class="id3">Contacts</font></b></i></a> 
		<a href="" target=_top STYLE="text-decoration: none"><i><b><font class="id3">Profile</font></b></i></a> 
		<a href="" target=_top STYLE="text-decoration: none"><i><b><font class="id3">Notifications</font></b></i></a> 
		<a href="" target=_top STYLE="text-decoration: none"><i><b><font class="id3" style="word-spacing: 0.2em;">About us</font></b></i></a> 
		<a href="" target=_top STYLE="text-decoration: none"><i><b><font class="id3">Help</font></b></i></a> 
		<a href="signout.php" target=_top STYLE="text-decoration: none"><i><b><font class="id3">Signout</font></b></i></a></p> <hr> <hr> 
	<span class=align><h1>Available Groups</h1></span> 
<?php
require 'connect.inc.php';
if($_SERVER["REQUEST_METHOD"]=='POST')
{
	$desti=$_POST["destination"];
	$source=$_POST["source"];
	$time=$_POST["time"];
	$date=$_POST["date"];
	$var=$_POST["variation"];
	$gend=$_POST['gender'];
	//echo $gend . '<br>';
	$veh=$_POST["vehicle"];
	$pup=$_POST["number"];

	$time1=strtotime($time) - $var*60*60 - 60*60;
	$time2=strtotime($time) + $var*60*60 + 60*60;
	$t1=date('H:i',$time1);
	$t2=date('H:i',$time2);
	echo $t1 . '<br>' . $t2;
	$sql="SELECT * FROM groups WHERE source='$source' and destination='$desti' and gender='$gend' and `date`='$date'";
	if(mysql_query($sql))
	{
		$query_run=mysql_query($sql);
		$count=1;
	while($row=mysql_fetch_assoc($query_run))
	{
		echo '<hr>';
		echo '<span class=my>'; 
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' 
		. $count . '.' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' 
		. $source . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' 
		. $desti . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' 
		. $date . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' 
		. $row['time'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $gend;
		echo '</span>';
		echo '<hr>'; 
		$count++;
	}
	}
	else
	{echo'invalid query';}
}
?>
</body>
</html>
