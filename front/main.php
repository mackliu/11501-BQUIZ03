    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <!--
        海報:210x230
        下方按鈕區:420 x 130

      -->
        <style>
          .lists{
            width:180px;
            height:230px;
            background:white;
            margin:auto;
            overflow: hidden;
            position:relative;
          }
          .poster{
            text-align: center;
            color:black;
            font-size:14px;
            position:absolute;
            display:none;
          }
          .poster img{
              width:180px;
              height:210px;

          }
          .controls{
            width:420px;
            height:120px;
           /*  background:green; */
            margin:5px auto;
            display:flex;
            justify-content: space-evenly;
            align-items: center;
          }
          .left-btn,.right-btn{
            width:0;
            border-top:20px solid transparent;
            border-bottom:20px solid transparent;
          }
          .left-btn{
            border-left:0px solid white;
            border-right:30px solid white;
          }
          .right-btn{
            border-left:30px solid white;
            border-right:0px solid white;
          }
          .btns{
            display:flex;
            width:280px;
            height:120px;
            /* background:yellow; */
            font-size:12px;
            overflow: hidden;
            position:relative;
          }
          .btn{
            width:70px;
            height:120px;
            box-sizing: border-box;
            padding:5px;
            flex-shrink: 0;
            position:relative;
          }
          .btn img{
            width:100%;

          }
        </style>
      <div class="rb tab" style="width:95%;">
        <div>
          <!--海報區-->
          <div class="lists">
            <?php 
            $posters=$Poster->all(['sh'=>1]," Order by `rank`");
            foreach($posters as $idx => $poster):
            ?>
            <div class="poster" data-ani="<?= $poster['ani'] ?>">
              <img src="upload/<?= $poster['img'] ?>" alt="">
              <div><?= $poster['name'] ?></div>
            </div>
            <?php endforeach;?>
          </div>
          <!--按鈕區-->
          <div class="controls">
            <div class='left-btn'></div>
            <div class='btns'>
              <?php 
              foreach($posters as $idx => $poster):
              ?>
              <div class="btn">
                <img src="upload/<?= $poster['img'] ?>" data-ani="<?= $poster['ani'] ?>">
                <div><?= $poster['name'] ?></div>
              </div>
              <?php endforeach;   ?>
            </div>
            <div class='right-btn'></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(".poster").eq(0).show();
      
      let autoSlide=setInterval("slider()", 3000);

      function slider(){
        let now=$(".poster:visible")
        let next
        if($(now).index()+1<$(".poster").length){
          next=$(".poster").eq($(now).index()+1)
        }else{
          next=$(".poster").eq(0)
        }
        let ani=$(now).data('ani');
        //console.log(ani)
        switch(ani){
          case 1:
            //淡入淡出
            $(now).fadeOut(1000,()=>{
                $(next).fadeIn(1000)
            })
          break;
          case 2:
            //滑入滑出
            $(now).slideUp(1000,()=>{
              $(next).slideDown(1000)
            })
          break;
          case 3:
            //縮放
            $(now).hide(1000,()=>{
              $(next).show(2000)
            })

          break;
        }
        
      }

      let p=0;
      let total=$(".poster").length
      $(".left-btn,.right-btn").on("click",function(){
            let direction=$(this).attr('class').split("-")[0]
            console.log(direction)

            switch(direction){
              case "left":
                if(p-1 >= 0){
                  p--
                }

              break;
              case 'right':
                if(p+1<=total-4){
                  p++
                }
              break;
            }
            $(".btn").animate({right:70*p})
      })

    </script>



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
            <div onclick="location.href='?do=intro&id=<?=$row['id'];?>'" style="cursor: pointer;">
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
              <button onclick="location.href='?do=intro&id=<?=$row['id'];?>'">劇情簡介</button>
              <button onclick="location.href='?do=booking&id=<?= $row['id']; ?>'">線上訂票</button>
            </div>
          </div>
          <?php 
          endforeach;
          ?>
        </div>
        <style>
          a{
            color:white;
            text-decoration: none;
          }
          a:hover{
            text-decoration: underline;
          }
          a:visited{
            color:white;
          }
        </style>
        <div class="ct">
          <?php
            if($now-1 >0){
              $prev=$now-1;
              echo "<a href='index.php?p=$prev'> < </a>";
            }

            for($i=1 ; $i<=$pages ;$i++){
              $size=($now==$i)?"20px":"16px";
              echo "<a href='index.php?p=$i' style='font-size:$size'> $i </a>";

            }
            if($now+1 <= $pages){
              $next=$now+1;
              echo "<a href='index.php?p=$next'> > </a>";
            }
          
          ?>
          </div>
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