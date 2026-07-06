<h3 class="ct">訂單清單</h3>
<div>
    快速刪除:
    <input type="radio" name="type" id="date">依日期
    <input type="text" name="date" id="">
    <input type="radio" name="type" id="movie">依電影
    <select name="movie" id=""></select>
    <input type="submit" value="刪除">
</div>

<div style="display:flex;text-align:center;justify-content:space-between;align-items:center">
    <div style="width:14%">訂單編號</div>
    <div style="width:14%">電影名稱</div>
    <div style="width:14%">日期</div>
    <div style="width:14%">場次時間</div>
    <div style="width:14%">訂購數量</div>
    <div style="width:14%">訂購位置</div>
    <div style="width:14%">操作</div>
</div>
<div style="height:400px;overflow:auto">
<?php 
$orders=$Order->all(" ORDER BY `no` desc");
foreach($orders as $order):

?>
    <div style="display:flex;text-align:center;justify-content:space-between;align-items:center">
        <div style="width:14%"><?= $order['no'] ?></div>
        <div style="width:14%"><?= $order['movie'] ?></div>
        <div style="width:14%"><?= $order['day'] ?></div>
        <div style="width:14%"><?= $order['session'] ?></div>
        <div style="width:14%"><?= $order['qt'] ?></div>
        <div style="width:14%">
            <?php 
                $seats=unserialize($order['seats']);
                foreach($seats as $seat){
                    echo floor($seat/5)+1 . "排".($seat%5 +1 )."號<br>";
                }
              ?>
        </div>
        <div style="width:14%">
            <button onclick="del(<?= $order['id'] ?>">刪除</button>
        </div>
    </div>
    <hr>
<?php 
endforeach;
?>    
</div>