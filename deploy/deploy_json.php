<?php require_once("query/qry_slct.php") ?>
<?php  

	if($obj_list){
		$data = $obj_list->list;
		file_put_contents('deploy/api_menu.json',  json_encode($data, JSON_PRETTY_PRINT));
	}
?>