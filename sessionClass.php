<?php

class student{
    private $ch,$eng,$math;
    public function __construct($ch,$eng,$math){
           $this->ch = $ch;
           $this->eng = $eng;
           $this->math = $math;
    }
    public function sum(){
        return $this->ch + $this->eng + $this->math;
    }
    public function avg(){
        return $this->sum() / 3;
    }
    public function setCh($newch){
        $this->ch = $newch;
    }
}

session_start();
$var1 = new student(90,88,89);
echo "Sum = {$var1->sum()}<br>Avg = {$var1->avg()}<br>";
$_SESSION['var1'] = $var1;
?>
