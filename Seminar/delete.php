<?php

require_once("./db/DbConfig.php");

$conn = DbConfig::getInstance();

$_GET['ID'];
echo $_GET['ID'];
echo "ušo";

$query_delete = "
UPDATE `filmovi` SET `STATUS` = '0' WHERE `filmovi`.`ID` = '".$_GET['ID']."';
";
$stmtdel = $conn->query($query_delete);


echo '<META HTTP-EQUIV="Refresh" Content="0; URL=unos.php">';    
exit;
//header("Location: ./unos.php");
//die();