<?php

require_once("./db/DbConfig.php");
echo "<a href='./index.php'>Home</a>";
echo "<br>";
$conn = DbConfig::getInstance();


//$_slika= $_POST['SLIKA'];


$query = "SELECT * FROM ZANR";

$stmt = $conn->query($query);
$stmt->execute();
$result = $stmt->fetchAll();

$currently_selected = date('Y'); 
$earliest_year = 1900; 
$latest_year = date('Y'); 

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="stil.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>   
<form action="" name="myInput" id="input" method="POST">
    <input type="hidden" id="_action_" name="_action_" value="submit">
    <table class="input">
    <tr>
        <td>
    Naslov:
        </td>
        <td>
   <input type="text" id="NASLOV" name="NASLOV" /> 
        </td>
    </tr>

    <tr>
        <td>
   Žanr:
        </td>
        <td>         
    <select id="$key['ID']" name="ID_ZANR"> 
                <?php foreach($result as $key => $value){ ?>
                    <option value="<?php echo $value['ID'];?>" id="ID_ZANR" name="ID_ZANR"><?php $value['ID']; echo $value['NAZIV'];?></option> 
                <?php } ?>
                 </select> 
        </td>
    </tr>

    <tr>
        <td>
    Godina:
        </td>
        <td>
    <?php print '<select id="GODINA" name="GODINA" >';
                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                print '<option name="GODINA" id="GODINA" value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                }
                print '</select>';
                ?>
        </td>
    </tr>

    <tr>
        <td>
    Trajanje:
        </td>
        <td> 
    <input  type="number" id="TRAJANJE" name="TRAJANJE" />
        </td>
    </tr>

    <tr>
        <td>
    Slika:
        </td>
        <td>
    <input type="file" name="SLIKA" id="SLIKA">
        </td>
    </tr>

    <tr>
        <td>
    <div>

       <input type="submit" name="Submit" value="Submit" class="special" />

    </div>
        </td>
    </tr>
</form>

</body>


<?php 


if(isset($_POST['Submit'])){ //check if form was submitted
    $_naslov=  $_POST['NASLOV'];
    $_id_zanr= $_POST['ID_ZANR'];
    $_godina=  $_POST['GODINA'];
    $_trajanje= $_POST['TRAJANJE'];
    $_slika= $_POST['SLIKA'];

    $query_ins = "
    INSERT INTO `filmovi` (`ID`, `NASLOV`, `ID_ZANR`, `GODINA`, `TRAJANJE`, `SLIKA`,`STATUS`) 
    VALUES (NULL, '".$_POST['NASLOV']."', '".$_POST['ID_ZANR']."', '".$_POST['GODINA']."', '".$_POST['TRAJANJE']."', '".$_slika= $_POST['SLIKA']."','1');
    ";
    $stmtinsert = $conn->query($query_ins);
    //var_dump($_POST['ID_ZANR']);
  $message = "Success! You entered: ";
}



$query_sve = "
SELECT * FROM FILMOVI
WHERE STATUS = 1
ORDER BY NASLOV
";
$stmtsve = $conn->query($query_sve);
$stmtsve->execute();
$resultsve = $stmtsve->fetchAll();

?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="stil.css">
            <meta charset="UTF-8">
        <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 1px;
        }
        </style>
    </head>
<body>
    <div align="center" style="vertical-align:bottom">
    <div align="center" style="vertical-align:bottom">
        <table class="view" width="90%" border="0" cellspacing="0" cellpadding="0"> <!--bgcolor="grey"> -->
            <tr>
                <th bgcolor="#C0C0C0" style="width:15%"><h2>Slika</h2></th>
                <th bgcolor="#C0C0C0"><h2>Naslov filma</h2></th>
                <th bgcolor="#C0C0C0"><h2>Godina</h2></th>
                <th bgcolor="#C0C0C0"><h2>Trajanje</h2></th>
                <th bgcolor="#C0C0C0"th><h2>Akcija</h2></th>
            </tr>

    <?php 
    //var_dump($resultsve);

    /*$query_delete = "
    DELETE FROM `filmovi` WHERE `filmovi`.`ID` = '".$line['ID']."'
    ";
    $stmtdel = $conn->query($query_delete);*/

    foreach($resultsve as $line){
        echo "<tr>";

    /* $query_delete = "
        UPDATE `filmovi` SET `STATUS` = '0' WHERE `filmovi`.`ID` = '".$line['ID']."';
        "; */

        //echo "<td>" . '<img src="data:image/jpeg;base64,'.base64_encode( $line['SLIKA'] ).'"/>' . "</td>";
    
        echo "<td><img src='./Slike/".$line['SLIKA']."'></td>";

        echo "<td>" . $line['NASLOV'] . "</td>";
        
        echo "<td>" . $line['GODINA'] . "</td>";

        echo "<td>" . $line['TRAJANJE'] . " min" . "</td>";

        echo('<td><a href="delete.php?func=delete&ID=' . $line['ID'] . '">[obriši]</a></td>');

        echo "</tr>";

    }



    //$query_delete = "
    //DELETE FROM `filmovi` WHERE `filmovi`.'".$line['ID']."' = 1
    //UPDATE `filmovi` SET `STATUS` = '0' WHERE `filmovi`.`ID` = '".$line['ID']."';
    //"
    ?> 
</table>
</div>
</div>

