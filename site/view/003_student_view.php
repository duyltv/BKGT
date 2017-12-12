<?php include 'public/gui_design/000_header.php' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted"><center>BẢNG ĐIỂM CÁ NHÂN</center></div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên môn học</th>
                      <th>Học kỳ</th>
                      <th>Điểm thành phần</th>
                      <th>Điểm tổng kết</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                    if(isset($data))
                    {
                      $score_table = $data['score_table'];
                      $count=1;
                      foreach($score_table as $row) 
                      {
                        echo '<tr>';
                        echo '<td>';
                        echo $count;
                        echo '</td>';
                        echo '<td>';
                        echo $row['subject_name'];
                        echo '</td>';
                        echo '<td>';
                        echo $row['semester_id'];
                        echo '</td>';
                        echo '<td>';
                        echo $row['elements_score'];
                        echo '</td>';
                        echo '<td>';
                        echo 0;
                        echo '</td>';
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

<?php include 'public/gui_design/000_footer.php' ?>