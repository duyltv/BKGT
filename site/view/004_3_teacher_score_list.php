<?php include 'public/gui_design/000_header.php' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-right"></div>
            <div class="pull-right">
              <a href=""><span class="badge badge-warning">Chỉnh sửa điểm thành phần</span></a>
              <a href=""><span class="badge badge-warning">Tải mẫu nhập điểm</span></a>
              <a href=""><span class="badge badge-warning">Chọn tệp bảng điểm</span></a>
              <a href="index.php?c=teacher&a=type&subject_id=<?php echo $data['subject_id']; ?>"><span class="badge badge-warning">Nhập điểm</span></a>
            </div>
        </div>
        <div class="block-content collapse in">
            Môn học: <?php echo $data['subject_name']; ?>
            <div class="span12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Học kỳ</th>
                      <th>MSSV</th>
                      <th>Họ và tên SV</th>
                      <?php 

                        if(isset($data))
                        {
                          if(isset($data['scores']))
                          {
                            $score_title = $data['scores'][0];
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
                          } else {
                            foreach($data['elements'] as $title) 
                            {
                              echo '<th>'.$title.'</th>';
                            }
                          }
                        }
                      ?>
                      <th>Tổng kết</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 

                      if(isset($data['scores']))
                      {
                        $scores = $data['scores'];
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
                              echo '<th>'.$value.'</th>';
                            }
                            $count_ele=$count_ele+1;
                          }

                          echo '<td></td>';
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