<?php include 'public/gui_design/000_header.php' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-right"></div>
            <div class="pull-right">
              <span class="badge badge-warning" style="cursor: pointer;" onclick='$("#fileUpload").click();'>Tải tệp điểm</span><
            </div>
        </div>
        <div class="block-content collapse in">
            Môn học: <?php echo $data['subject_name']; ?>
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
                          $count=1;
                          foreach($data['elements'] as $title) 
                          {
                            echo '<td><input type="text" placeholder="Nhập điểm" name="score1_'.$count.'" value="" style="width: 100%;"></td>';
                            $count=$count+1;
                          }
                        }
                      ?>
                    </tr>
                  </tbody>
                </table>
                <input hidden name="score_count" id="score_count" value=1>
                <input hidden name="subject_id" id="subject_id" value=<?php echo $data['subject_id']; ?>>
                <a style="cursor: pointer;" onclick="addScore()">Thêm hàng nhập điểm</a><br>
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

  <?php 

  if(isset($data))
  {
    $count = 1;
    foreach($data['elements'] as $title) 
    {
      echo 'var score_'.$title['id'].' = new_score.getElementsByTagName("input")['.($count+1).'];';
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

<!-- BEGIN CLIENTSIDE_FILE_SUBMIT  -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    $("#upload").bind("click", function () {
        $("#fileUpload").click();
    });
});
function process() {
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.csv|.txt)$/;
        if (regex.test($("#fileUpload").val().toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
                reader.onload = function (e) {
                    //var table = $("<table />");
                    var rows = e.target.result.split("\n");
                    var intput_order = 0;
                    for (var i = 0; i < rows.length; i++) {
                        if (i != 0)
                        {
                          addScore();
                        }
                        //var row = $("<tr />");
                        var cells = rows[i].split(",");
                        for (var j = 0; j < cells.length; j++) {

                            // Test
                            if (i>0)
                            {
                              if (j>0 && j!=3 && j!=cells.length-1) {
                                document.getElementsByTagName("input")[intput_order].value = cells[j];
                                intput_order+=1;
                              }
                            }
                        }
                    }
                }
                reader.readAsText($("#fileUpload")[0].files[0]);
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid CSV file.");
        }
 };
</script>
<input type="file" id="fileUpload" onchange="process()" hidden/>
<hr />
<div id="dvCSV">
</div>

<?php include 'public/gui_design/000_footer.php' ?>