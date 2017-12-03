<?php include 'gadget/header.html' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-right"></div>
            <div class="pull-right">
            </div>
        </div>
        <div class="block-content collapse in">
            Môn học: Trí tuệ nhân tạo
            <div class="span12">
              <form action="" method="POST">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Học kỳ</th>
                      <th>MSSV</th>
                      <th>Họ và tên SV</th>
                      <th>Thành phần điểm 1</th>
                      <th>Thành phần điểm 2</th>
                      <th>Thành phần điểm 3</th>
                      <th>Tổng kết</th>
                    </tr>
                  </thead>
                  <tbody id="score_list">
                    <tr id="tr_score_1">
                      <td>1</td>
                      <td><input type="text" placeholder="Học kỳ" name="semester1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="MSSV" name="mssv1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Họ và tên" name="svname1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Nhập điểm" name="score1_1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Nhập điểm" name="score1_2" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Nhập điểm" name="score1_3" value="" style="width: 100%;"></td>
                      <td id="total_score">8.5</td>
                    </tr>
                  </tbody>
                </table>
                <input hidden name="score_count" id="score_count" value=1>
                <a onclick="addScore()">Thêm hàng nhập điểm</a><br>
                <center><button type="submit">NHẬP ĐIỂM</button></center>
              </form>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>

<script>
var score_count=1;

function addScore() {
  score_count+=1;
  var score_tbody = document.getElementById('score_list');
  var new_score = document.getElementById("tr_score_1").cloneNode(true);
  new_score.id = "tr_score_" + score_count;

  var score_semester = new_score.getElementsByTagName("input")[0];
  score_semester.name = "semester" + score_count;
  score_semester.value = "";

  var score_mssv = new_score.getElementsByTagName("input")[1];
  score_mssv.name = "mssv" + score_count;
  score_mssv.value = "";

  var score_name = new_score.getElementsByTagName("input")[2];
  score_name.name = "svname" + score_count;
  score_name.value = "";

  var score_1 = new_score.getElementsByTagName("input")[3];
  score_1.name = "score" + score_count + "_1";
  score_1.value = "";

  var score_2 = new_score.getElementsByTagName("input")[4];
  score_2.name = "score" + score_count + "_2";
  score_2.value = "";

  var score_3 = new_score.getElementsByTagName("input")[5];
  score_3.name = "score" + score_count + "_3";
  score_3.value = "";

  var score_order = new_score.getElementsByTagName("td")[0];
  score_order.innerHTML=score_count;

  score_tbody.appendChild(new_score);

  document.getElementById("score_count").value=score_count;
}
</script>

<?php include 'gadget/footer.html' ?>