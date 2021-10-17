<?php
require_once('db_login.php');

$id = $_GET['id'];
//assign query
$query = "DELETE FROM ruang WHERE id_ruang=".$id."";
//execute query
$result = $db->query($query);
	if(!$result){
		die ("Could not query the database: <br>".$db->error ."<br>Query: ".$query);
		}else{
			$query = "DELETE FROM cs_ruang WHERE id_ruang='".$id."'";
			$result = $db->query($query);
   			if(!$result){
				die ("Could not query the database: <br>".$db->error ."<br>Query: ".$query);
			}else{
			$query = "DELETE FROM trx_cs_ruang WHERE id_ruang='".$id."'";
			$result = $db->query($query);
				echo("<script>location.href = 'peng_ruang_jumlahruang.php';</script>");
			}
		}

?>