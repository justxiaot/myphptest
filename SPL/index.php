<?php 
	/**
	* An iterator for native PHP arrays, re-inventing the wheel
	* Notice the "implments Iterator" - important!
	**/
	class ArrayReloaded implements ITerator {
		//A native PHP array to iterate over
		private $array = [];

		//A switch to keep track of the end of the array
		private $valid = FALSE;

		/**
		*Constructor
		*@param array native PHP array to iterate over
		**/
		function __construct($array) {
			$this->array = $array;
		}

		function rewind() {
			$this->valid = (FALSE !== reset($this->array));
		}
		function current() {
			return current($this->array);
		}
		function key() {
			return key($this->array);
		}
		function next() {
			$this->valid = (FALSE !== next($this->array));
		}
		function valid() {
			return $this->valid;
		}

	}

	$colors = new ArrayReloaded(['red', 'green', 'blue',]);
	foreach ( $colors as $color) {
		echo $color.'<br/>';
	}
	echo '<hr/>';
	foreach ( $colors as $key=>$color) {
		echo $key.':'.$color.'<br/>';
	}
	echo '<hr/>';
	$colors->rewind();
	while ($colors->valid()) {
		echo $colors->key().':'.$colors->current().'<br/>';
		$colors->next();
	}
 ?>