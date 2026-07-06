<?php include_once "../api/db.php";

$movies=['院線片01','院線片02','院線片03'];
$days=['2026-07-05','2026-07-06','2026-07-07'];
$sess=[
    "14:00~16:00",
    "16:00~18:00",
    "18:00~20:00",
    "20:00~22:00",
    "22:00~24:00",
];
for($i=1;$i<=10;$i++){
$data=[];
$data['no']=date("Ymd").sprintf("%04d",$i);
$data['movie']=$movies[rand(0,2)];
$data['day']=$days[rand(0,2)];
$data['session']=$sess[rand(0,4)];
$data['qt']=rand(1,4);
$tmp=[];
for($j=0;$j<$data['qt'];$j++){
    $tmp[]=rand(0,19);
}
$data['seats']=serialize($tmp);

$Order->save($data);
}