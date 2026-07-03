<div style="height:360px">
    <div class="ct">預告片清單</div>

</div>
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