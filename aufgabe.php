<?php


for ($i = 1; $i <= 5000; $i++) {
    if ($i % 7 && $i % 5 == 0) {
        echo "FooBar" ."<br>";
    } else if ($i % 7 == 0) {
        echo "Foo" . "<br>";
    } else if ($i % 5 == 0) {
        echo "Bar". "<br>";
    }else {
        echo $i."<br>";
    }

}
