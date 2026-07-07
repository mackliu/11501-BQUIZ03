    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>
    <style>
      .movie {
    box-sizing: border-box;
    margin: 3px;
    display: flex;
    flex-wrap: wrap;
    width: 48%;
    border: 1px solid white;
    border-radius: 5px;
    padding: 3px;
    font-size:14px;
  }

    .movies {
      display: flex;
      flex-wrap: wrap;
  }
    </style>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab" style="width:95%;">
        <div class="movies">
          <?php
          $today=date("Y-m-d");
          $ondate=date("Y-m-d",strtotime("-2 days"));
          
          $total=$Movie->count(" WHERE `ondate` between '$ondate' AND '$today' AND `sh`=1");
          $div=4;
          $pages=ceil($total/$div);
          $now=$_GET['p']??1;
          $start=($now-1)*$div;
          $rows=$Movie->all(['sh'=>1]," AND `ondate` between '$ondate' AND '$today' Order by rank limit $start,$div");
          foreach($rows as $row):

          ?>
          <div class="movie">
            <div>
              <img src="./upload/<?= $row['poster'] ?>" style="width:60px;height:80px">
            </div>
            <div>
              <div style="font-size:16px"><?= $row['name'] ?></div>
              <div>
                分級: <img src="./icon/03C0<?= $row['level'] ?>.png" style="width:18px;"> <?= $levelStr[$row['level']]; ?>
              </div>
              <div>上映日期:<?= $row['ondate'] ?></div>
              
              

            </div>
            <div>
              <button>劇情介紹</button>
              <button>線上訂票</button>
            </div>
          </div>
          <?php 
          endforeach;
          ?>
        </div>
        <div class="ct"> </div>
      </div>
    </div>

    <!-- 今天7/7
    2026/07/05  2026/07/06  2026/07/07
    2026/07/06  2026/07/07  2026/07/08
    2026/07/07  2026/07/08  2026/07/09

    1. sh=1
    2. ondate=today-2 || ondate=today-1 || ondate=today
    => ondate >= today-2 && ondate <=today
    => ondate between today-2 , today -->