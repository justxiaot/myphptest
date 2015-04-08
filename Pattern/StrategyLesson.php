<?php 
	abstract class Lesson
	{
		private $duration;
		private $costStrategy;

		function __construct($duration, CostStrategy $strategy)
		{
			$this->duration = $duration;
			$this->costStrategy = $strategy;
		}

		function cost()
		{
			return
		}
	}

 ?>