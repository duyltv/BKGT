<?php include 'gadget/header.html' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted"><center>MÔN HỌC: TRÍ TUỆ NHÂN TẠO</center></div>
        </div>
        <div class="block-content collapse in">
          <form action="" method="POST">
            <div class="span12">
              <ul>
                <table class="table table-hover">
                  <tr>
                    <li> Outcome: Biết cách vận dụng mạng neuron vào training<br>
                    <input type="checkbox" name="all_pass" /> Tất cả điểm thành phần đều đạt<br>
                    <input type="checkbox" name="average_larger" /> Trung bình các điểm thành phần lớn hơn hoặc bằng <input type="text" name="average_larger_value" /><br>
                    <input type="checkbox" name="at_least" /> Có ít nhất <input type="text" name="at_least_value" /> thành phần đạt<br>
                    <input type="checkbox" name="satisfied" />Thỏa mãn công thức: <input type="text" name="satisfied_fomular" />
                    </li>
                  </tr>
                </table>
              </ul>
            </div>
            <center><button type="submit">LƯU</button></center>
          </form>
        </div>
    </div>
    <!-- /block -->
</div>

<?php include 'gadget/footer.html' ?>