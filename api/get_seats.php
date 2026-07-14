<?php include_once "db.php";
$orders=$Order->all($_GET);
//dd($orders);
$seats=[];
foreach($orders as $order){
    $tmp=unserialize($order['seats']);
    $seats=array_merge($seats,$tmp);
}
//dd($seats);
?>


<div class="seats-block">
        <?php
        for($i=0;$i<20;$i++):
            $c=in_array($i,$seats)?'booked':'none';
        ?>
            <div class='seat <?= $c; ?>'>
                <?=floor($i/5)+1;?>排<?= ($i%5)+1; ?>號
                <?php if(!in_array($i,$seats)):?>
                 <input type="checkbox" class='chk' name="num" value="<?= $i; ?>">
                <?php endif;?>
            </div>
        <?php endfor;?>

    </div>

    <div class='movie-info'>

    <div>您選擇的電影是:<span class='seats-movie'></span></div>
    <div>您選擇的時刻是:<span class='seats-date'></span>&nbsp;&nbsp;<span class='seats-session'></span></div>
    <div>您已經勾選<span class='tickets'></span>張票，最多可以購買四張票</div>
    <div class="ct">
        <button onclick="showForm()">上一步</button>
        <button onclick="checkout()">訂購</button>
    </div>
    </div>


<script>
let seats=new Array();
$(".chk").on("click",function(){
    let num=$(this).val();
    let status=$(this).prop("checked");
    switch(status){
        case true:
            if(seats.length+1<=4){
               seats.push(num)

               $(this).parent().removeClass('none');
               $(this).parent().addClass('booked');
            }else{
                alert("最多只能訂四張票") 
                $(this).prop('checked',false)
            }
        break;
        case false:
            let index=seats.indexOf(num);
            //console.log(index)
            seats.splice(index,1)
            $(this).parent().removeClass('booked');
            $(this).parent().addClass('none');
        break;
    }
    //console.log(status)


    $(".tickets").text(seats.length);
    //console.log(seats)
})

function checkout(){
    let data={
        
        'movie':$("#movie option:selected").text(),
        'day':$("#date").val(),
        'session':$("#session").val(),
        'qt':seats.length,
        'seats':seats
    }

    $.post("./api/checkout.php",data,(res)=>{
            //console.log(res);
            $("#Seats").html(res)
    })
}
</script>