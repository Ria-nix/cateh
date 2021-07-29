<?php


	use artemy\MySQL;

	class CategoriesInfo {
		private mysqli $link;
		private array  $categories;

		/**
		 * CategoriesInfo конструктор. Используйте fetch() перед использованием вложенных функций.
		 *
		 * @param $link
		 */
		public function __construct($link) {
			$this->link = $link;
		}


		public function fetch() : array {
			$result = MySQL::selectAll($this->link, "_Categories");
			if($result === false) {
				return array();
			}
			$this->categories = $result;
			return $result;
		}


		public function available($sysadmin_id) {
			if(!isset($this->categories)) {
				$this->fetch();
			}

			$result = MySQL::select($this->link, "Users_AdminsSysadmins", "categoriesJSON", "id = $sysadmin_id");
			if($result === false) {
				return array();
			}

			return json_decode($result["categoriesJSON"]);
		}

		public static function addNew($link, $category_name): int
        {
            return MySQL::insert($link, "_Categories", "name", "'$category_name'", true);
        }
	}