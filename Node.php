<?php
class Node {
	public $upperNode;
	public $freq;
	public $left;
	public $right;
	public $letter;

	public function __construct ($freq = NULL, $letter = NULL, $left = NULL, $right = NULL)
	{
		$this->freq = $freq;
		$this->letter = $letter;
		$this->left = $left;
		$this->right = $right;
	}
}

