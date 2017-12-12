<?php include 'public/gui_design/000_header.php' ?>

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
              <form action="index.php?c=teacher&a=type" method="POST">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Học kỳ</th>
                      <th>MSSV</th>
                      <?php 

                        if(isset($data))
                        {
                          foreach($data['elements'] as $title) 
                          {
                            echo '<th>'.$title['name'].'</th>';
                          }
                        }
                      ?>
                    </tr>
                  </thead>
                  <tbody id="score_list">
                    <tr id="tr_score_1">
                      <td>1</td>
                      <td><input type="text" placeholder="Học kỳ" name="semester1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="MSSV" name="mssv1" value="" style="width: 100%;"></td>
                      <?php 

                        if(isset($data))
                        {
                          foreach($data['elements'] as $title) 
                          {
                            echo '<td><input type="text" placeholder="Nhập điểm" name="score1_'.$title['id'].'" value="" style="width: 100%;"></td>';
                          }
                        }
                      ?>
                    </tr>
                  </tbody>
                </table>
                <input hidden name="score_count" id="score_count" value=1>
                <input hidden name="subject_id" id="subject_id" value=<?php echo $data['subject_id']; ?>>
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

  <?php 

  if(isset($data))
  {
    $count = 1;
    foreach($data['elements'] as $title) 
    {
      echo 'var score_'.$title['id'].' = new_score.getElementsByTagName("input")['.($count+2).'];';
      echo 'score_'.$title['id'].'.name = "score" + score_count + "_'.$count.'";';
      echo 'score_'.$title['id'].'.value = "";';
      $count=$count+1;
    }
  }
?>

  var score_order = new_score.getElementsByTagName("td")[0];
  score_order.innerHTML=score_count;

  score_tbody.appendChild(new_score);

  document.getElementById("score_count").value=score_count;
}
</script>

<?php include 'public/gui_design/000_footer.php' ?>