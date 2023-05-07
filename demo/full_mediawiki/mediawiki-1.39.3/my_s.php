<?php
$output = array();
$return_var = 0;
exec('ls', $output, $return_var);
foreach ($output as $line) {
    echo $line . PHP_EOL;
}
?>
