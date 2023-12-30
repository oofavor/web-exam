<?php
$currentPage = 1;
function setIfSet($name, $str) {

    if ($str == "") return "";
    if ($str == "none") return "";
    return "`$name`='$str' AND";
}

function getTable($page) {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $name = setIfSet("name",$_GET["name"]);
        $district = setIfSet("disctrict", $_GET["district"]);
        $objectType = setIfSet("objectType", $_GET["objectType"]);
        $isNet = setIfSet("isNet", $_GET["isNet"]);
        $lgot = setIfSet("lgot", $_GET["lgot"]);

        $page1 = ($page-1) * 10;
        $page2 = $page * 10;


        return substr("SELECT * FROM orders WHERE $name $district $objectType $isNet $lgot", 0, -4);
    }

    return "SELECT * FROM orders";
}

?>