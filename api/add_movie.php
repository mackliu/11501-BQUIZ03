<?php include_once "db.php";

if(!empty($_FILES['trailer']['tmp_name'])){
    move_uploaded_file($_FILES['trailer']['tmp_name'],"../upload/".$_FILES['trailer']['name']);
    $_POST['trailer']=$_FILES['trailer']['name'];
}
if(!empty($_FILES['poster']['tmp_name'])){
    move_uploaded_file($_FILES['poster']['tmp_name'],"../upload/".$_FILES['poster']['name']);
    $_POST['poster']=$_FILES['poster']['name'];
}

$_POST['ondate']=$_POST['year']."-".$_POST['month']."-".$_POST['date'];
unset($_POST['year'],$_POST['month'],$_POST['date']);


$_POST['sh']=1;
$_POST['rank']=$Movie->q("select max(`id`) as 'maxid' from `movies`")[0]['maxid']+1;


$Movie->save($_POST);

to("../admin.php?do=movie");