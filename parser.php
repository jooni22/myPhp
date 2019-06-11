<?php

	$htmlContent = file_get_contents("https://docs.google.com/spreadsheets/d/e/2PACX-1vQBmhqtuIeGclfOFHOet5niRI6PP7szyMprFrmAeNsKQM8ESF95ldh8UFqPDP6XQ_Cc5ZJZEKxDhLbZ/pubhtml?gid=571280317&single=true");

	$DOM = new DOMDocument();
	$DOM->loadHTML($htmlContent);

	$Header = $DOM->getElementsByTagName('th');
	$Detail = $DOM->getElementsByTagName('td');

    //#Get header name of the table
	foreach($Detail as $NodeHeader)
	{
		$aDataTableHeaderHTML[] = trim($NodeHeader->textContent);
	}
#  print_r($aDataTableHeaderHTML.PHP_EOL);

$file = 'cfg.txt';
$kopalnia = 'kopalnia.txt';
$basic = file_get_contents('basic.txt');
$end = file_get_contents('end.txt');

file_put_contents($file, null, LOCK_EX);
file_put_contents($kopalnia, null, LOCK_EX);
file_put_contents($file, $basic.PHP_EOL, FILE_APPEND | LOCK_EX);
file_put_contents($kopalnia, $basic.PHP_EOL, FILE_APPEND | LOCK_EX);
  foreach($aDataTableHeaderHTML as $tabs)
  {
    file_put_contents($file, $tabs.PHP_EOL, FILE_APPEND | LOCK_EX);
        file_put_contents($kopalnia, $tabs.PHP_EOL, FILE_APPEND | LOCK_EX);

  }
file_put_contents($file, $end.PHP_EOL, FILE_APPEND | LOCK_EX);
file_put_contents($kopalnia, $end.PHP_EOL, FILE_APPEND | LOCK_EX);
?>
