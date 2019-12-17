<?php require_once("conn/connection.php") ?>
<?php require_once("interface/interface.php") ?>
<?php  
	$qry_lvl1 = "select id, title, alias, 'level', parent_id from enap_menu where menutype = 'menuprincipal' and published = 1;";
	$qry_lvl1 = @mysqli_query($conn, $qry_lvl1);
	
	$obj_list = new dataList();

	while($row_lvl1 = @mysqli_fetch_assoc($qry_lvl1)){

		$data_Obj = new data();

		$data_Obj->id = $row_lvl1['id'];
		$data_Obj->title = utf8_encode($row_lvl1['title']);
		$data_Obj->alias = ($row_lvl1['alias']);
		$data_Obj->level = ($row_lvl1['level']);
		$data_Obj->parent_id = ($row_lvl1['parent_id']);

		$qry_lvl2 = "select id, title, alias, 'level', parent_id from enap_menu where parent_id = ".$row_lvl1['id']." and published = 1;";
		$qry_lvl2 = @mysqli_query($conn, $qry_lvl2);


		
		while($row_lvl2 = @mysqli_fetch_assoc($qry_lvl2)){
			$subItem = new subItem();

			$subItem->id = $row_lvl2['id'];
			$subItem->title = utf8_encode($row_lvl2['title']);
			$subItem->alias = $row_lvl2['level'];
			$subItem->parent_id = $row_lvl2['parent_id'];

		 	array_push($data_Obj->subItems, $subItem);
		}
		array_push($obj_list->list, $data_Obj);
	}
?>