<?php 
	namespace App\components;

	use App\Menu;

	class MenuRecursive
	{
		private $html;
		public function __construct()
		{
			$this->html = '';
		}

		public function MenuRecursiveAdd($parentId = 0, $submark = '')
		{
			$data = Menu::where('parent_id', $parentId)->get();
			foreach ($data as $dataItem) {
				$this->html .= '<option value="'.$dataItem->id.'">' .$submark.$dataItem->name. '</option>';
				$this->MenuRecursiveAdd($dataItem->id, $submark . '--');
			}
			return $this->html;
		}

			public function MenuRecursiveEdit($parentIdMenuEdit, $parentId = 0, $submark = '')
		{
			$data = Menu::where('parent_id', $parentId)->get();
			foreach ($data as $dataItem) {
				if ($parentIdMenuEdit == $dataItem->id) {
					$this->html .= '<option selected value="'.$dataItem->id.'">' .$submark.$dataItem->name. '</option>';
				}else {
					$this->html .= '<option value="'.$dataItem->id.'">' .$submark.$dataItem->name. '</option>';
				}
				$this->MenuRecursiveEdit($parentIdMenuEdit, $dataItem->id, $submark . '--');
			}
			return $this->html;
		}
	}
 ?>