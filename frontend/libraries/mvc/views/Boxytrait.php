<?php
namespace themes\clipone\views;

use themes\clipone\views\Dashboard\Box;

trait BoxyTrait {
	/** @var Box[] */
	protected $boxs = [];

	/**
	 * Add new box to page
	 * 
	 * @param Box $box
	 * @return void
	 */
	public function addBox(Box $box): void {
		$this->boxs[] = $box;
	}

	/**
	 * Get list of boxs.
	 * 
	 * @return Box[]
	 */
	public function getBoxs(): array {
		return $this->boxs;
	}

	/**
	 * Build html code using bootstrap grid system.
	 * 
	 * @return string
	 */
	public function buildBoxs(): string {
		$rows = [];
		$lastrow = 0;
		foreach ($this->boxs as $box){
			$rows[$lastrow][] = $box;
			$size = 0;
			foreach ($rows[$lastrow] as $rowbox) {
				$size += $rowbox->size;
			}
			if ($size >= 12) {
				$lastrow++;
			}
		}
		$html = '';
		foreach ($rows as $row) {
			$html .= "<div class=\"row\">";
			foreach ($row as $box) {
				$html .= "<div class=\"col-md-{$box->size}\">" . $box->getHTML() . "</div>";
			}
			$html .= "</div>";
		}
		return $html;
	}
}