<?php
$isCLI = (php_sapi_name() == 'cli');
if (!$isCLI) {
    include 'public/index.php';
} else {
    echo "This file cannot be used in the console.";
}
