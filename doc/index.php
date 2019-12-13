<?php require_once('../error.php');?>
<?php  
	echo @$error;
	if($_GET['api'] && file_exists('../deploy/api_menu.json')){
		print_r(file_get_contents('../deploy/api_menu.json'));
	}
?>