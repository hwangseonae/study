<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


$db = new mysqli("localhost","root","root","first");
$db->set_charset("utf8");

function mk($sql)
{
    global $db;
    return $db->query($sql);
}
?>