<?php


function js($query)
{
    echo '<script>';
    echo $query;
    echo '</script>';
}


function alert($string)
{
    echo "<script>alert(" . $string . ")</script>";
}


?>