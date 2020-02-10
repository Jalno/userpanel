<?php
namespace packages\userpanel\Exceptions;
use packages\base\Exception;

class UserIsNotActiveException extends Exception {
	private $status;
	public function __constructor(int $status) {
		$this->status = $status;
	}
	public function getStatus(): ?int {
		return $this->status;
	}
}