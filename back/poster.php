<div style="height:360px">
    <div class="ct">預告片清單</div>
<div class='ct' style="display:flex;justify-content:space-between">
    <div style="width:25%">預告片海報</div>
    <div style="width:25%">預告片片名</div>
    <div style="width:25%">預告片排序</div>
    <div style="width:25%">操作</div>
</div>
<form action="./api/edit_poster.php" method="post">
<div style="height:270px;overflow: auto;">
    <?php 
    $posters=$Poster->all(" ORDER BY rank");
    foreach($posters as $idx => $poster):
    ?>
    <div style="background:white;margin:3px 0;height:100px;display:flex;align-items:center;justify-content:space-between;color:black;padding:3px;text-align:center" >
        <div style="width:25%">
            <img src="./upload/<?= $poster['img'] ?>" style="width:60px;height:80px;">
        </div>
        <div style="width:25%">
            <input type="text" name="name[]" value="<?= $poster['name'] ?>">
            
        </div>
        <div style="width:25%">
            <?php 
                $prev=($idx==0)?$poster['id']:$posters[$idx-1]['id'];
                $next=($idx==count($posters)-1)?$poster['id']:$posters[$idx+1]['id'];
            ?>
            <input class="switch-rank" type="button" value="往上" data-ids="<?= $poster['id']."-".$prev ?>">
            <input class="switch-rank" type="button" value="往下" data-ids="<?= $poster['id']."-".$next ?>">
        </div>
        <div style="width:25%">
            <input type="checkbox" name="sh[]" value="<?= $poster['id']; ?>" <?= ($poster['sh']==1)?'checked':""; ?>>顯示
            <input type="checkbox" name="del[]" value="<?= $poster['id']; ?>">刪除
            <select name="ani[]">
                <option value="1">淡入淡出</option>
                <option value="2">滑入滑出</option>
                <option value="3">縮放</option>
            </select>
            <input type="hidden" name="id[]" value="<?= $poster['id'] ?>">
        </div>
    </div>
    <?php  endforeach;  ?>
</div>
<div class="ct">
    <input type="submit" value="編輯確定">
    <input type="reset" value="重置">
</div>
</form>
</div>
<script>
$(".switch-rank").on("click",function(){
    let ids=$(this).data('ids').split('-')
    $.post("./api/sw.php",{ids},()=>{
        location.reload()
    })
})
</script>
<hr>
<div style="height:150px">
    <div class="ct">新增預告片海報</div>
    <form action="./api/add_poster.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    預告片海報：<input type="file" name="img" id="img">
                </td>
                <td>
                    預告片片名：<input type="text" name="name" id="name">
                </td>
            </tr>
        </table>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="重置">
        </div>
    </form>
</div>