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
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Tên điểm thành phần</th>
                      <th>Loại điểm</th>
                      <th>Tên biến công thức</th>
                      <th>Các outcome liên quan</th>
                      <th>Điểm đạt outcome</th>
                    </tr>
                  </thead>
                  <tbody id="element_list">
                    <tr id="tr_element_1">
                      <td>1</td>
                      <td><input type="text" placeholder="Nhập tên" name="name1" id="name1" value="" style="width: 100%;"></td>
                      <td>
                        <select name="type1" id="type1" onchange="hideOrShow('1')">
                          <option value="1">Điểm số</option>
                          <option value="2">Điểm danh</option>
                        </select>
                        <br>
                        <input type="text" placeholder="Số buổi" name="daycount1" id="daycount1" value="" style="visibility: hidden;">
                      </td>
                      <td id="var1">score1</td>
                      <td>
                      <select name="outcome1" id="outcome1" multiple>
                          <option value="1">Outcome thứ nhất</option>
                          <option value="2">Outcome thứ hai</option>
                        </select>
                      </td>
                      <td>
                      <input name="out_score_1" type="text" style="height:5px" disabled /><br>
                      <input name="out_score_2" type="text" style="height:5px" />
                      </td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <input hidden name="out_count" id="out_count" value=1>
            <a onclick="addElement()">Thêm thành phần điểm</a><br>
            <br>
            Công thức điểm tổng kết
            <br>
            <input type="text" placeholder="Công thức tính" name="fomular" style="width:100%;" required>
            <center><button type="submit">LƯU</button></center>
          </form>
        </div>
    </div>
    <!-- /block -->
</div>

<script>
var element_count=1;

function hideOrShow(num) {
  var type='type'+num;
  var daycount='daycount'+num;
  if (document.getElementById(type).value == '1') {
    document.getElementById(daycount).style.visibility = "hidden";
  }
  else {
    document.getElementById(daycount).removeAttribute('style');
  }
}

function addElement() {
  element_count+=1;
  var element_tbody = document.getElementById('element_list');
  var new_element = document.getElementById("tr_element_1").cloneNode(true);
  new_element.id = "tr_element_" + element_count;

  var name_input = new_element.getElementsByTagName("input")[0];
  name_input.id = "name" + element_count;
  name_input.name = "name" + element_count;
  name_input.value = "";

  var type_input = new_element.getElementsByTagName("select")[0];
  type_input.id = "type" + element_count;
  type_input.name = "type" + element_count;
  type_input.value = "1";
  type_input.setAttribute("onchange","hideOrShow('"+element_count+"')");

  var daycount_input = new_element.getElementsByTagName("input")[1];
  daycount_input.id = "daycount" + element_count;
  daycount_input.name = "daycount" + element_count;
  daycount_input.value = "";

  var outcome_input = new_element.getElementsByTagName("select")[1];
  outcome_input.id = "outcome" + element_count;
  outcome_input.name = "outcome" + element_count;
  outcome_input.value = "1";

  var var_name = new_element.getElementsByTagName("td")[3];
  var_name.id = "var" + element_count;
  var_name.innerHTML = "score" + element_count;

  var element_order = new_element.getElementsByTagName("td")[0];
  element_order.innerHTML=element_count;

  element_tbody.appendChild(new_element);

  document.getElementById("element_count").value=element_count;
}
</script>

<?php include 'gadget/footer.html' ?>