<?php require_once("conn/connection.php") ?>
<?php require_once("model/model.php") ?>
<?php  
	$qry_lvl1 = "select id, title, alias, `level`, link, parent_id from enap_menu where menutype = 'mainmenu-pt-br' and published = 1 and `level` = 1;";
	$qry_lvl1 = @mysqli_query($conn, $qry_lvl1);
	
	$obj_list = new dataList();

	while($row_lvl1 = @mysqli_fetch_assoc($qry_lvl1)){

		$data_Obj = new data();

		$data_Obj->id = $row_lvl1['id'];
		$data_Obj->title = utf8_encode($row_lvl1['title']);
		$data_Obj->alias = ($row_lvl1['alias']);
		$data_Obj->level = ($row_lvl1['level']);
		$data_Obj->link = $row_lvl1['link'];
		$data_Obj->parent_id = ($row_lvl1['parent_id']);

		$qry_lvl2 = "select id, title, alias, `level`, link, parent_id from enap_menu where parent_id = ".$row_lvl1['id']." and published = 1;";
		$qry_lvl2 = @mysqli_query($conn, $qry_lvl2);


		
		while($row_lvl2 = @mysqli_fetch_assoc($qry_lvl2)){
			$subItem = new subItem();

			$subItem->id = $row_lvl2['id'];
			$subItem->title = utf8_encode($row_lvl2['title']);
			$subItem->alias = $row_lvl2['level'];
			$subItem->link = $row_lvl2['link'];
			$subItem->parent_id = $row_lvl2['parent_id'];

		 	

		 	$qry_lvl3 = "select id, title, alias, `level`, link, parent_id from enap_menu where parent_id = ".$row_lvl2['id']." and published = 1;";
			$qry_lvl3 = @mysqli_query($conn, $qry_lvl3);

			while($row_lvl3 = @mysqli_fetch_assoc($qry_lvl3)){
				
				$subSub = new subSub();
				$subSub->id =  $row_lvl3['id'];
				$subSub->title = utf8_encode($row_lvl3['title']);
				$subSub->alias = $row_lvl3['alias'];
				$subSub->link = $row_lvl3['link'];
				$subSub->parent_id = $row_lvl3['parent_id'];

				array_push($subItem->subItems, $subSub);
				print_r($subItem);
			}

			array_push($data_Obj->subItems, $subItem);
		}
		array_push($obj_list->list, $data_Obj);
	}
?>