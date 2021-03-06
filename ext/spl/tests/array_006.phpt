--TEST--
SPL: ArrayIterator without ArrayObject
--SKIPIF--
<?php if (!extension_loaded("spl")) print "skip"; ?>
--INI--
allow_call_time_pass_reference=1
--FILE--
<?php

echo "==Normal==\n";

$arr = array(0=>0, 1=>1, 2=>2);
$obj = new ArrayIterator($arr);

foreach($obj as $ak=>$av) {
	foreach($obj as $bk=>$bv) {
		if ($ak==0 && $bk==0) {
			$arr[0] = "modify";
		}
		echo "$ak=>$av - $bk=>$bv\n";
	}
}

?>
===DONE===
<?php exit(0); ?>
--EXPECTF--
==Normal==
0=>0 - 0=>0
0=>0 - 1=>1
0=>0 - 2=>2
===DONE===
