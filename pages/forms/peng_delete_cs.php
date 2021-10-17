<?php
require_once('db_login.php');

$id = $_GET['id'];
//assign query
$query = "DELETE FROM cs WHERE id_cs=".$id."";
//execute query
$result = $db->query($query);
	if(!$result){
		die ("Could not query the database: <br>".$db->error ."<br>Query: ".$query);
		}else{
			$query = "DELETE FROM cs_ruang WHERE id_cs='".$id."'";
			$result = $db->query($query);
   			if(!$result){
				die ("Could not query the database: <br>".$db->error ."<br>Query: ".$query);
			}else{
			$query = "DELETE FROM trx_cs_ruang WHERE id_cs='".$id."'";
			$result = $db->query($query);
				echo("<script>location.href = 'peng_home.php';</script>");
			}
		}

?>