<?php include 'gadget/header.html' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted"><center>TẠO MÔN HỌC MỚI</center></div>
        </div>
        <div class="block-content collapse in">
          <form action="" method="POST">
            <table>
              <tr>
                <td>Tên môn học </td>
                <td><input type="text" placeholder="Tên môn học" name="sname" required> </td>
              </tr>
              <tr>
                <td>Mô tả môn học </td>
                <td><input type="text" placeholder="Mô tả môn học" name="sdes" required> </td>
              </tr>
            </table>
            <div class="span12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th width="95%">Outcome môn học</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><input type="text" placeholder="Nhập chuẩn đầu ra môn học (outcome)" name="outcome1" value="Áp dụng kiến thức ma trận để phân tích cơ cấu robot" style="width: 100%;"></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><input type="text" placeholder="Nhập chuẩn đầu ra môn học (outcome)" name="outcome2" value="Gợi nhớ các tính chất cơ bản của các phép tính ma trận 4 x 4." style="width: 100%;"></td>
                    </tr>
                    <tr>
                      <td><button width="100%">Thêm outcome</button><td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </form>
        </div>
    </div>
    <!-- /block -->
</div>

<?php include 'gadget/footer.html' ?>