<style>
.booking-form{
    width:450px;
    margin:20px auto;
    padding:20px;
    background:#eee;
    border:1px solid #ccc;
    /* border-collapse: collapse; */
}
.booking-form tr:nth-child(even){
    background:#ccc;
}
.booking-form td{
    padding:5px;
    border:1px solid #ccc;
}    
.booking-form td select{
    width:98%;
}
.seats-block {
    width: 540px;
    height: 358px;
    margin: auto;
    background: url("./icon/03D04.png");
    box-sizing: border-box;
    padding: 18px 110px 0 110px;
    display: flex;
    flex-wrap: wrap;
}
.movie-info {
    width: 540px;
    margin: auto;
    box-sizing: border-box;
    padding: 10px 100px;
    background: #ddd;
}
.seat{
    width:64px;
    height:85px;
    background:#ccc;
    opacity:0.7;

}
.seat:nth-child(odd){
    background:green;
}
</style>


<h3 class="ct">線上訂票</h3>
<div id="BookingForm">
<table class="booking-form">
    <tr>
        <td style="width:60px;">電影:</td>
        <td>
            <select name="movie" id="movie"></select>
        </td>
    </tr>
    <tr>
        <td>日期:</td>
        <td>
            <select name="date" id="date"></select>
        </td>
    </tr>
    <tr>
        <td>場次:</td>
        <td>
            <select name="session" id="session"></select>
        </td>
    </tr>
</table>
<div class="ct">
    <button class='btn-submit' onclick="booking()">確定</button>
    <button class='btn-reset' onclick="getMovies()">重置</button>
</div>

</div>

<div id="Seats" style='display:none'>
    <div class="seats-block">
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
        <div class='seat'>0排0號</div>
    </div>

    <div class='movie-info'>

    <div>您選擇的電影是:<span class='seats-movie'></span></div>
    <div>您選擇的時刻是:<span class='seats-date'></span><span class='seats-session'></span></div>
    <div>您已經勾選兩張票，最多可以購買<span class='tickets'></span></div>
    <div class="ct">
        <button onclick="showForm()">上一步</button>
        <button>訂購</button>
    </div>
    </div>
</div>
<script>
let movieId=(new URLSearchParams(location.search)).get('id');
//console.log(movieId);
getMovies();

$("#movie").on("change",function(){
    let id=$(this).val(); //取得當前電影選單的電影id
    getDays(id);
})

$("#date").on("change",function(){
    let movie=$("#movie").val();
    let date=$("#date").val();
    getSessions(movie,date);
})

function getMovies(){
    $.get("./api/get_movies.php",(movies)=>{
        $("#movie").html(movies)
        if(movieId!=null){
            $(`#movie option[value="${movieId}"]`).prop('selected',true)
        }
        let id=$("#movie").val()
        getDays(id)
    })
}

function getDays(movie){
    $.get("./api/get_days.php",{movie},(days)=>{
        $("#date").html(days)
        let date=$("#date").val();
        getSessions(movie,date);
    })

}

function getSessions(movie,date){
   // console.log(movie,date)
    $.get("./api/get_sessions.php",{movie,date},(sessions)=>{
        $("#session").html(sessions);
    })
}

function booking(){
    $("#BookingForm").hide();
    $("#Seats").show();
}

function showForm(){
    $("#BookingForm").show();
    $("#Seats").hide();
}
</script>