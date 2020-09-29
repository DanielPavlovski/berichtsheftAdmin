<?php
for ($zahl = 1; $zahl <= 5000; $zahl++) {
    if ($zahl % 5==0 && $zahl % 7 == 0) {
        echo "FooBar" ."<br>";
    }
    else if ($zahl % 5 == 0) {
        echo "Bar" ."<br>";
    }
    else if ($zahl % 7 == 0) {
        echo "foo" ."<br>";
    }
    else {
        echo "$zahl" ."<br>";
    }
}