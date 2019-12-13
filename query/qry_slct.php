<?php require_once("conn/connection.php") ?>
<?php require_once("interface/interface.php") ?>
<?php  
	$qry_lvl1 = "select id, title, alias, 'level', parent_id from enap_menu where menutype = 'menuprincipal';";
	$qry_lvl1 = @mysqli_query($conn, $qry_lvl1);
	$i = 0;

	
	while($row_lvl1 = @mysqli_fetch_assoc($qry_lvl1)){
		$data_Obj [] = new data();


		$data_Obj[$i]->id = $row_lvl1['id'];
		$data_Obj[$i]->title = utf8_encode($row_lvl1['title']);
		$data_Obj[$i]->alias = utf8_encode($row_lvl1['alias']);
		$data_Obj[$i]->level = utf8_encode($row_lvl1['level']);
		$data_Obj[$i]->parent_id = utf8_encode($row_lvl1['parent_id']);

		$qry_lvl2 = "select id, title, alias, 'level', parent_id from enap_menu where  menutype = 'menuprincipal' and parent_id = ".$row_lvl1['id'].";";
		$qry_lvl2 = @mysqli_query($conn, $qry_lvl2);

		
		while($row_lvl2 = @mysqli_fetch_assoc($qry_lvl2)){
		 	array_push($data_Obj[$i]->subItems, $row_lvl2);
			$data [] = json_encode($data_Obj[$i], JSON_PRETTY_PRINT); 
		}
		$i++;
	}
?>