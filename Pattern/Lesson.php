<?php
abstract class Lesson
{
	protected $duration;
	const FIXED = 1;
	const TIMED = 2;
	private $costtype;

	function __construct($duration, $costtype = 1)
	{
		$this->duration = $duration;
		$this->costtype = $costtype;
	}

	function cost()
	{
		switch ($this->costtype)
		{
			CASE self::TIMED :
				return (5 * $this->duration);
				break;
			CASE self::FIXED :
				return 30;
				break;
			default :
				$this->costtype = self::FIXED;
				return 30;

		}
	}

	function chargeType()
	{
		switch ($this->costtype)
		{
			CASE self::TIMED :
				return "hourly rate";
				break;
			CASE self::FIXED :
				return "fixed rate";
				break;
			default:
				$this->costtype = self::FIXED;
				return "fixed rate";

		}
	}

}

class Lecture extends Lesson
{

}

class Seminar extends Lesson
{

}

$lecture = new Lecture(5, Lesson::FIXED);

echo "{$lecture->cost()} ({$lecture->chargeType()})".PHP_EOL;

$seminar = new Seminar(3, Lesson::TIMED);
echo "{$seminar->cost()} ({$seminar->chargeType()})".PHP_EOL;
