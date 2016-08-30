<?php 

	$path = '.';

	$command = ' /usr/bin/php '.$path.'artisan schedule:run >/dev/null 2>&1  & echo $!';

    $number = exec($command);

    echo $number;

    //file_put_contents($path . 'queue22.pid', $number);

?>