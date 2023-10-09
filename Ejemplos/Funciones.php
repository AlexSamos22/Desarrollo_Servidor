<?php
    $var1 = 4;
    $var2 = NULL;
    $var3 = FALSE;
    $var4 = 0;
    
    echo "var1 <br>";
    var_dump(isset($var1));
    var_dump(is_null($var1));
    var_dump(empty($var1));

    echo "var2 <br>";
    var_dump(isset($var2));
    var_dump(is_null($var2));
    var_dump(empty($var2));

    echo "var3 <br>";
    var_dump(isset($var3));
    var_dump(is_null($var3));
    var_dump(empty($var3));

    echo "var4 <br>";
    var_dump(empty($var4));

    echo"unset <br>";

    unset($var1);
    var_dump(isset($var1));
?>