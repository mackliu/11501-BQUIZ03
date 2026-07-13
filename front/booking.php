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
</style>


<h3 class="ct">線上訂票</h3>
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
    <button class='btn-submit'>確定</button>
    <button class='btn-reset'>重置</button>
</div>

<script>

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
    console.log(movie,date)
    $.get("./api/get_sessions.php",{movie,date},(sessions)=>{
        $("#session").html(sessions);
    })
}

</script>