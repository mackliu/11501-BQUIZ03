<h3 class="ct">訂單清單</h3>
<div>
    快速刪除:
    <input type="radio" name="type" id="day" checked>依日期
    <input type="text" name="day" id="">
    <input type="radio" name="type" id="movie">依電影
    <select name="movie" id="">
        <?php 
            $movies=$Order->q("SELECT `movie` FROM `orders` group by `movie`");
            foreach($movies as $movie){
                echo "<option value='{$movie['movie']}'>";
                echo $movie['movie'];
                echo "</option>";
            }
        ?>
    </select>
    <button onclick="qDel()">刪除</button>
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
            <button onclick="del(<?= $order['id'] ?>)">刪除</button>
        </div>
    </div>
    <hr>
<?php 
endforeach;
?>    
</div>
<script>
function del(id){
    let chk=confirm('你確定要刪除這筆訂單資料嗎?');
    if(chk){
        $.post("./api/del.php",{id,'table':'Order'},()=>{
            location.reload();
        })
    }

}

function qDel(){
    let type=$("input[type='radio']:checked").attr('id');
    let value;
    switch(type){
        case 'day':
            value=$(`input[name='${type}']`).val();
        break;
        case 'movie':
            value=$(`select[name='${type}']`).val();
        break;
    }
    //console.log(type,value);
    let chk=confirm('你確定要刪除'+value+"的全部訂單嗎?")
    if(chk){
        $.post("./api/qdel.php",{type,value},(res)=>{
            //console.log(res)
            location.reload();
        })
    }
}
</script>