<?php include 'gadget/header.html' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-right"></div>
            <div class="pull-right"><a href=""><span class="badge badge-warning">Tạo môn học mới</span></a></div>
        </div>
        <div class="block-content collapse in">
            Chọn môn học cần quản lý
            <div class="span12">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th style="width: 20%;">#</th>
                      <th style="width: 50%;">Tên môn học</th>
                      <th style="width: 30%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="vertical-align:middle">1</td>
                      <td style="vertical-align:middle">Trí tuệ nhân tạo</td>
                      <td>
                        3/5
                        <div class="progress">
                          <div style="width: 60%;" class="bar"></div>
                          <div style="width: 40%;" class="bar bar-danger"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align:middle">2</td>
                      <td style="vertical-align:middle">Đồ họa máy tính</td>
                      <td>
                        2/5
                        <div class="progress">
                          <div style="width: 40%;" class="bar"></div>
                          <div style="width: 60%;" class="bar bar-danger"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align:middle">3</td>
                      <td style="vertical-align:middle">Máy học</td>
                      <td>
                        4/5
                        <div class="progress">
                          <div style="width: 80%;" class="bar"></div>
                          <div style="width: 20%;" class="bar bar-danger"></div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td style="vertical-align:middle">4</td>
                      <td style="vertical-align:middle">Dự liệu phân tán</td>
                      <td>
                        7/10
                        <div class="progress">
                          <div style="width: 70%;" class="bar"></div>
                          <div style="width: 30%;" class="bar bar-danger"></div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>

<style>

.tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 1s;
}

.tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
}

.progress:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
}

<?php include 'gadget/footer.html' ?>