<a href='./unos.php'>Unos</a>
<head>
<link rel="stylesheet" type="text/css" href="stil.css">

</head>
<body>
    <div align="center" style="vertical-align:bottom">
    <div align="center" style="vertical-align:bottom">

<?php

require_once("./db/DbConfig.php");

$conn = DbConfig::getInstance();
echo "<br>";
$azRange = range('A', 'Z');

?>
<table class="az" >

<?php
$i="|";
foreach ($azRange as $letter){
    echo "<td>";
        echo $i++;
        echo "<a href='list.php?id=$letter'>$letter\n</a>";
    //    echo $i++;
    echo "</td>";
}


?>
<td>|</td>
</table>
<?php
/*

$_GET['povrat'];
var_dump($_GET['povrat']);


foreach($_GET as $key => $value){
    echo "<img src='./Slike/".$value['SLIKA']."'>";
    echo "<br>";
    echo "<i>" . $value['NASLOV'] . " (" .$value['GODINA']. ")" . "</i>";
    echo "<br>"; 
    echo "<i>" ."Trajanje: " . $value['TRAJANJE'] . " min" . "<i>";
    echo "<br>"; 
    echo "<br>"; 
} */