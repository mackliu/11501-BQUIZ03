<?php include_once "db.php";


$max_id=$Order->q("select max(id) as 'id' from orders")[0]['id']+1;
$_POST['no']=date("Ymd") . sprintf("%04d",$max_id);
sort($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);

$Order->save($_POST);