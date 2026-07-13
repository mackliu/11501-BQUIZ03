<?php include_once "db.php";

$movie=$Movie->find($_GET['movie']);
$date=$_GET['date'];

$sess=[
    1=>'14:00~16:00',
    2=>'16:00~18:00',
    3=>'18:00~20:00',
    4=>'20:00~22:00',
    5=>'22:00~24:00',
];

/*
1. 先判斷日期，只要不是今天，場次就是5場
2. 如果是今天，根據小時來決定場次：
   a. 1400以前 ==> 5場(14:00~22:00)
   b. 1401以後 ==> 4場(16:00~22:00)
   c. 1601以後 ==> 3場(18:00~22:00)
   d. 1801以後 ==> 2場(20:00~22:00)
   e. 2001以後 ==> 1場(22:00~22:00)
*/
$today=date("Y-m-d");
$hour=date("G");

if($date==$today && $hour>14){
    $start=ceil(($hour-13)/2)+1;
/*     switch($hour){
        case "14":
        case "15":
            $start=2;
        break;
        case "16":
        case "17":
            $start=3;
        break;
        case "18":
        case "19":
            $start=4;
        break;
        case "20":
        case "21":
            $start=5;
        break;
        default:
            $start=0;
    } */
}else{
    $start=1;
}
echo $start;
if($start!=0 &&  $start < 5){
    for($i=$start;$i<=5;$i++){
        echo "<option value=''>";
        echo $sess[$i];
        echo " 剩餘座位 20";
        echo "</option>";
    }
}else{
    echo "<option>本日已無可訂場次</option>";
}