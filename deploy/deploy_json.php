<?php require_once("query/qry_slct.php") ?>
<?php  
	if(@$data){
		file_put_contents('deploy/api_menu.json',  $data);
	}
?>