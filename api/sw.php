<?php include_once "db.php";

$row1=$Poster->find($_POST['ids'][0]);
$row2=$Poster->find($_POST['ids'][1]);

$tmp=$row1['rank'];
$row1['rank']=$row2['rank'];
$row2['rank']=$tmp;

$Poster->save($row1);
$Poster->save($row2);