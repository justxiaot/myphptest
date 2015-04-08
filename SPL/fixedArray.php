<?php
	$array = new SplFixedArray(5);

	$array[1] = 2;
	$array[4] = 'foo';
	var_dump($array[0]);
	var_dump($array[1]);
	var_dump($array['4']);