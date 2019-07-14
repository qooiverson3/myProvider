<?php
include_once 'wesleyUtils.php';
session_start();
$var1 = new student(90,88,89);
echo "Sum = {$var1->sum()}<br>Avg = {$var1->avg()}<br>";
$_SESSION['var1'] = $var1;
?>
