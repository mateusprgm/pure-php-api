<?php require_once('../error.php');?>
<?php  
	echo @$error;
	if($_GET['api'] && file_exists('../deploy/api_menu.json')){
		$api_data = utf8_encode(file_get_contents('../deploy/api_menu.json'));

	$aaa = json_decode($api_data);

		// print_r($api_data);
	}
?>