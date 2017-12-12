<?php include 'public/gui_design/000_header.php' ?>

<!-- GREETING -->
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted"><center>TẠO CHUẨN MỚI</center></div>
        </div>
        <div class="block-content collapse in">
          <form action="" method="POST">
            <table>
              <tr>
                <td>Tên chuẩn </td>
                <td><input type="text" placeholder="Tên chuẩn" name="sname" required> </td>
              </tr>
              <tr>
                <td>Mô tả chuẩn </td>
                <td><input type="text" placeholder="Mô tả chuẩn" name="sdes" required> </td>
              </tr>
            </table>
            <div class="span12">
              Các môn học liên quan
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mã môn học</th>
                      <th width="60%">Tên môn học</th>
                    </tr>
                  </thead>
                  <tbody id="subject_list">
                    <tr id="tr_subject_1">
                      <td>1</td>
                      <td><input type="text" placeholder="Mã môn học" name="subject_code_1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Tên môn học" name="subject_name_1" value="" style="width: 100%;"></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <input hidden name="subject_count" id="subject_count" value=1>
            <a onclick="addSubject()">Thêm môn học</a><br>


            <div class="span12">
              Các quy tắc định chuẩn
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên quy tắc</th>
                      <th>Mô tả quy tắc</th>
                      <th>Công thức quy tắc</th>
                    </tr>
                  </thead>
                  <tbody id="rule_list">
                    <tr id="tr_rule_1">
                      <td>1</td>
                      <td><input type="text" placeholder="Tên quy tắc" name="rule_name_1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Mô tả quy tắc" name="rule_descripe_1" value="" style="width: 100%;"></td>
                      <td><input type="text" placeholder="Công thức quy tắc" name="rule_fomular_1" value="" style="width: 100%;"></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <input hidden name="rule_count" id="rule_count" value=1>
            <a onclick="addRule()">Thêm quy tắc định chuẩn</a><br>

            <center><button type="submit">TẠO CHUẨN</button></center>
          </form>
        </div>
    </div>
    <!-- /block -->
</div>

<script>
var subject_count=1;

function addSubject() {
  subject_count+=1;
  var subject_tbody = document.getElementById('subject_list');
  var new_subject = document.getElementById("tr_subject_1").cloneNode(true);
  new_subject.id = "tr_subject_" + subject_count;

  var subject_code = new_subject.getElementsByTagName("input")[0];
  subject_code.name = "subject_code_" + subject_count;
  subject_code.value = "";

  var subject_name = new_subject.getElementsByTagName("input")[1];
  subject_name.name = "subject_name_" + subject_count;
  subject_name.value = "";

  var subject_order = new_subject.getElementsByTagName("td")[0];
  subject_order.innerHTML=subject_count;

  subject_tbody.appendChild(new_subject);

  document.getElementById("subject_count").value=subject_count;
}

var rule_count=1;

function addRule() {
  rule_count+=1;
  var rule_tbody = document.getElementById('rule_list');
  var new_rule = document.getElementById("tr_rule_1").cloneNode(true);
  new_rule.id = "tr_rule_" + rule_count;

  var rule_name = new_rule.getElementsByTagName("input")[0];
  rule_name.name = "rule_name_" + rule_count;
  rule_name.value = "";

  var rule_descripe = new_rule.getElementsByTagName("input")[1];
  rule_descripe.name = "rule_descripe_" + rule_count;
  rule_descripe.value = "";

  var rule_fomular = new_rule.getElementsByTagName("input")[2];
  rule_fomular.name = "rule_fomular_" + rule_count;
  rule_fomular.value = "";

  var rule_order = new_rule.getElementsByTagName("td")[0];
  rule_order.innerHTML=rule_count;

  rule_tbody.appendChild(new_rule);

  document.getElementById("rule_count").value=rule_count;
}
</script>

<?php include 'gadget/footer.html' ?>