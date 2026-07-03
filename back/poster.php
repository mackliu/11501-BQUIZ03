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
    <div style="background:white;margin:3px 0;height:100px;display:flex;justify-content:space-between" >
        <div style="width:25%">1</div>
        <div style="width:25%">2</div>
        <div style="width:25%">3</div>
        <div style="width:25%">4</div>
    </div>

</div>
<div class="ct">
    <input type="submit" value="編輯確定">
    <input type="reset" value="重置">
</div>
</form>
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