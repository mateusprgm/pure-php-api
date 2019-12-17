<?php 

	class data {
		public $id = '';
		public $title = '';
		public $alias = '';
		public $level = '';
		public $parent_id = '';
		public $subItems = [];

		public function data() {
	        return (get_object_vars($this));
	    }
	}

	class subItem {
		public $id = '';
		public $title = '';
		public $alias = '';
		public $level = '';
		public $parent_id = '';
	}

	class dataList{
		public $list = [];

		public function data() {
	        return (get_object_vars($this));
	    }

	}
?>