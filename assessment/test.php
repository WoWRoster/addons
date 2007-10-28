<?php

$test = array(
	'a' => 'a1',
	'b' => 'b1',
	'c' => 'c1',
);


foreach ( $test as $key => $val ) {
	$val .= '_changed';
	print $key. " => ". $val. "\n";
}

foreach ( $test as $key => &$val ) {
	print $key. " => ". $val. "\n";
}
