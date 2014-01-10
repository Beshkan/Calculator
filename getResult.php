<?php
header("Content-Type: text/plain");
include 'calculator.php';

if (isset($_GET['expr'])) {
    echo calculator($_GET['expr']);
}
