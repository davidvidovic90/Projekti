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

echo "<br>";

$_GET['id'];
/*
$query_delete = "
UPDATE `filmovi` SET `STATUS` = '0' WHERE `filmovi`.`ID` = '".$_GET['ID']."';
";
$stmtdel = $conn->query($query_delete);*/

$query = "
SELECT * FROM `filmovi` WHERE STATUS = 1 AND NASLOV LIKE '".$_GET['id']."%';
";

$stmt = $conn->query($query);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<table class="demo" width="50%" border="0" cellspacing="0" cellpadding="0"> <!--bgcolor="grey"> -->
<?php
foreach($result as $value){
    echo "<tr>";    
    echo "<td>";
    echo "<img src='./Slike/".$value['SLIKA']."'>";
    echo "</td>";
    echo "</tr>";    

    echo "<tr>";    
    echo "<td>";
    echo "<i>" . $value['NASLOV'] . " (" .$value['GODINA']. ")" . "</i>";
    echo "</td>";
    echo "</tr>"; 

    echo "<tr>";    
    echo "<td>";
    echo "<i>" ."Trajanje: " . $value['TRAJANJE'] . " min" . "<i>";
    echo "</td>";
    echo "</tr>"; 

}


/*echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?povrat=$result">';    
exit;
//header("Location: ./unos.php");
//die();*/