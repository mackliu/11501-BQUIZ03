<?php include_once "db.php";


$max_id=$Order->q("select max(id) as 'id' from orders")[0]['id']+1;
$_POST['no']=date("Ymd") . sprintf("%04d",$max_id);
sort($_POST['seats']);
$_POST['seats']=serialize($_POST['seats']);

$Order->save($_POST);

?>
<style>
#result{
    width:500px;
    margin:auto;
    padding:20px;
    background:#ddd;
    border:1px solid #ccc;
}
#result tr:nth-child(even){
    background:#aaa;
}
#result td{
    padding:3px ;
    border:1px solid #999;
}
</style>
<table id="result">
    <tr>
        <td colspan='2'>感謝您的訂購，您的訂單編號是：<?= $_POST['no']; ?></td>

    </tr>
    <tr>
        <td style="width:80px">電影名稱：</td>
        <td><?= $_POST['movie']; ?></td>
    </tr>
    <tr>
        <td>日期：</td>
        <td><?= $_POST['day']; ?></td>
    </tr>
    <tr>
        <td>場次時間：</td>
        <td><?= $_POST['session'] ?></td>
    </tr>
    <tr>
        <td colspan="2">
            座位：<br>
            <?php 
            $seats=unserialize($_POST['seats']);
            foreach($seats as $seat){
                echo floor($seat)/5 +1;
                echo "排";
                echo $seat % 5 +1;
                echo "號";
                echo "<br>";
            }
            echo "共".$_POST['qt']."張電影票";
            ?>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="ct">
            <button onclick="location.href='index.php'">確認</button>
        </td>
    </tr>
</table>