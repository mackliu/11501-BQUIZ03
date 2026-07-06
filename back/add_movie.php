<h2 class="ct">新增院線片</h2>
<form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
    <table style="width:80%;margin:auto">
        <tr>
            <td>影片資料</td>
            <td>
                <!-- table>tr*8>td+td>input:text -->
                 <table>
                    <tr>
                        <td>片名:</td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td>分級:</td>
                        <td>
                            <select name="level" id="level">
                                <option value="1">普遍級</option>
                                <option value="2">輔導級</option>
                                <option value="3">保護級</option>
                                <option value="4">限制級</option>
                            </select>
                            (請選擇分級)
                        </td>
                    </tr>
                    <tr>
                        <td>片長:</td>
                        <td><input type="text" name="length" id="length"></td>
                    </tr>
                    <tr>
                        <td>上映日期:</td>
                        <td>
                            <select name="year" id="year">
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                            </select>
                            <select name="month" id="month">
                                <?php 
                                for($i=1;$i<=12;$i++){
                                  echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                            <select name="date" id="date">
                                <?php 
                                for($i=1;$i<=31;$i++){
                                  echo "<option value='$i'>$i</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>發行商:</td>
                        <td><input type="text" name="publish" id="publish"></td>
                    </tr>
                    <tr>
                        <td>導演:</td>
                        <td><input type="text" name="dirctor" id="director"></td>
                    </tr>
                    <tr>
                        <td>預告影片</td>
                        <td><input type="file" name="trailer" id="trailer"></td>
                    </tr>
                    <tr>
                        <td>電影海報</td>
                        <td><input type="file" name="poster" id="poster"></td>
                    </tr>
                 </table>
            </td>
        </tr>
        <tr>
            <td>劇情簡介</td>
            <td>
                <textarea name="intro" style="width:90%;height:50px;"></textarea>
            </td>
        </tr>
    </table>
    <hr>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>