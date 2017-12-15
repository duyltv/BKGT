<?php include 'public/gui_design/000_header.php' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-right"></div>
            <div class="pull-right">
              <a href="index.php?c=teacher&a=element&subject_id=<?php echo $data['subject_id']; ?>"><span class="badge badge-warning">Chỉnh sửa điểm thành phần</span></a>
              <a><span class="badge badge-warning" onclick="exportTableToCSV('<?php echo $data['subject_id'];?>_score_table.csv')">Tải mẫu nhập điểm</span></a>
              <a href=""><span class="badge badge-warning">Chọn tệp bảng điểm</span></a>
              <a href="index.php?c=teacher&a=type&subject_id=<?php echo $data['subject_id']; ?>"><span class="badge badge-warning">Nhập điểm</span></a>
            </div>
        </div>
        <div class="block-content collapse in">
            Môn học: <?php echo $data['subject_name']; ?>
            <br>
            Công thức tính điểm: <?php echo $data['fomular']; ?>
            <div class="span12">
                <table class="table table-hover" id="score_table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Học kỳ</th>
                      <th>MSSV</th>
                      <th>Họ và tên SV</th>
                      <?php 

                        if(isset($data))
                        {
                          if(isset($data['score_table']))
                          {
                            $score_title = $data['score_table'][0];
                            $titles = array_keys($score_title);

                            $count=1;
                            foreach($titles as $title) 
                            {
                              if($count > 3)
                              {
                                echo '<th>'.$title.'</th>';
                              }
                              $count=$count+1;
                            }
                          } elseif (isset($data['elements'])) {
                            foreach($data['elements'] as $title) 
                            {
                              echo '<th>'.$title['name'].'</th>';
                            }
                          }
                        }
                      ?>
                      <th>Tổng kết</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      if(isset($data['score_table']))
                      {
                        $scores = $data['score_table'];
                        $count=1;
                        foreach($scores as $row) 
                        {
                          echo '<tr>';
                          echo '<td>'.$count.'</td>';
                          echo '<td>'.$row['semester_id'].'</td>';
                          echo '<td>'.$row['user_id'].'</td>';
                          echo '<td>'.$row['fullname'].'</td>';

                          $titles = array_values($row);

                          $count_ele=1;
                          foreach($titles as $value) 
                          {
                            if($count_ele > 3)
                            {
                              echo '<td>'.$value.'</td>';
                            }
                            $count_ele=$count_ele+1;
                          }

                          echo '<td id=total'.$count.'></td>';
                          echo '</tr>';

                          $count=$count+1;
                        }
                      }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>

<script>

<?php
  $score_table = $data['score_table'];
  $full_score_table = $data['full_score_table'];
  $count=1;
  foreach($score_table as $row) 
  {
    echo 'var score_'.$count.'=[ 0, ';
    $score = array();
    $score[] = $row['user_id'];
    foreach($full_score_table as $full_row)
    {
      if($row['user_id'] == $full_row['user_id'])
      {
        $score[]=$full_row['score'];
        echo $full_row['score'].', ';
      }
    }
    echo '];';
    echo 'var fomular_'.$count.'="'.$data['fomular'].'";';
    echo 'var fomular_value = fomular_'.$count.'.replace(/score([0-9]+)/g,"score_'.$count.'[$1]");';
    echo 'document.getElementById("total'.$count.'").innerHTML=eval(fomular_value);';
    $count=$count+1;
  }
?>

</script>

<script src="public/gui_design/vendors/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
function downloadCSV(csv, filename) {
    var csvFile;
    var downloadLink;

    // CSV file
    csvFile = new Blob([csv], {type: "text/csv"});

    // Download link
    downloadLink = document.createElement("a");

    // File name
    downloadLink.download = filename;

    // Create a link to the file
    downloadLink.href = window.URL.createObjectURL(csvFile);

    // Hide download link
    downloadLink.style.display = "none";

    // Add the link to DOM
    document.body.appendChild(downloadLink);

    // Click download link
    downloadLink.click();
}

function exportTableToCSV(filename) {
    var csv = [ "\ufeff" ];
    var rows = document.querySelectorAll("table tr");
    
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll("td, th");
        
        for (var j = 0; j < cols.length; j++) 
            row.push(cols[j].innerText);
        
        csv.push(row.join(","));        
    }

    // Download CSV file
    downloadCSV(csv.join("\n"), filename);
}
</script>

<?php include 'public/gui_design/000_footer.php' ?>