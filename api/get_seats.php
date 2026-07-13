    <div class="seats-block">
        <?php
        for($i=0;$i<20;$i++):
        ?>
            <div class='seat none'>
                <?=floor($i/5)+1;?>排<?= ($i%5)+1; ?>號

                <input type="checkbox" name="num" value="<?= $i; ?>">
            </div>
        <?php endfor;?>

    </div>

    <div class='movie-info'>

    <div>您選擇的電影是:<span class='seats-movie'></span></div>
    <div>您選擇的時刻是:<span class='seats-date'></span>&nbsp;&nbsp;<span class='seats-session'></span></div>
    <div>您已經勾選兩張票，最多可以購買<span class='tickets'></span></div>
    <div class="ct">
        <button onclick="showForm()">上一步</button>
        <button>訂購</button>
    </div>
    </div>