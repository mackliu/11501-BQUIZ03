<button onclick="location.href='?do=add_movie'">新增電影</button>
<hr>
<style>
.movie {
    display: flex;
    background: white;
    color: black;
    justify-content: space-between;
    align-items:center;
    padding: 3px;
    margin:3px auto;
}    
</style>
<div class="movies">
    <?php 
    $movies=$Movie->all(" order by rank");
    foreach($movies as $idx => $movie):
    ?>
    <div class="movie">
        <div>
            <img src="upload/<?=$movie['poster'] ?>" style="width:80px;height:100px;">
        </div>
        <div>
            分級: <img src="icon/03C0<?= $movie['level'] ?>.png" alt="">
        </div>
        <div style="width:70%">
            <div style="display:flex;justify-content:space-between">
                <div>片名:<?= $movie['name'] ?></div>
                <div>片長:<?= $movie['length'] ?></div>
                <div>上映時間:<?= $movie['ondate'] ?></div>
            </div>
            <div style="text-align:right;padding:5px;">
                <button data-id="<?= $movie['id'] ?>">顯示</button>
                <?php 
                $prev=($idx==0)?$movie['id']:$movies[$idx-1]['id'];
                $next=($idx==count($movies)-1)?$movie['id']:$movies[$idx+1]['id'];
            ?>
            <input class="switch-rank" type="button" value="往上" data-ids="<?= $movie['id']."-".$prev ?>">
            <input class="switch-rank" type="button" value="往下" data-ids="<?= $movie['id']."-".$next ?>">
                
                <button onclick="location.href='?do=edit_movie&id=<?= $movie['id'] ?>'">編輯電影</button>
                <button data-id="<?= $movie['id'] ?>">刪除電影</button>
            </div>
            <div>
                劇情介紹:<?= $movie['intro'] ?>
            </div>
        </div>
    </div>
    <?php 
    endforeach;
    ?>
</div>

<script>
$(".switch-rank").on("click",function(){
    let ids=$(this).data('ids').split('-')
    $.post("./api/sw.php",{ids,'table':"Movie"},()=>{
        location.reload()
    })
})
</script>