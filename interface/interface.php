<?php 

	class data {
		public $id = '';
		public $title = '';
		public $alias = '';
		public $level = '';
		public $parent_id = '';
		public $subItems = [];
	}

	class dataList{
		public $list = [];

		public function data() {
	        return get_object_vars($this);
	    }

	}
?>