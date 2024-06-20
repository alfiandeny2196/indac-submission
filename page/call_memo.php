<?php
$dept_tujuan = base64_decode($_GET['deptTujuan']);
$comp_tujuan = base64_decode($_GET['compTujuan']);
$format = base64_decode($_GET['format']);
$now = date('Y-m-d');
if ($_SESSION['level'] == 'user_depo') {
    $dd = 'Depo :';
    $dd2 = getValueOtherHost('tb_emp','id', $_SESSION['emp_id'],'emp_company','');
    $value_d = getValueOtherHost('tb_comp','id', $dd2,'com_fullname2','');
} else {
    $dd = 'Departemen :';
    $dd2 = getValueOtherHost('tb_emp','id', $_SESSION['emp_id'],'emp_department','');
    $value_d = getValueOtherHost('tb_dept','id', $dd2,'dpt_name','');
}
?>

<div class="card">
<div class="card-header">
  <h3 class="card-title"><?php echo $title; ?></h3>
  <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse">
      <i class="fas fa-minus"></i>
    </button>
  </div>
</div>
<!-- /.card-header -->
<div class="card-body">
<!-- <form id= "formData" method="POST" action="" enctype="multipart/form-data"> -->
  <div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Tanggal :</label>
            <input type="hidden" value="<?php echo $comp_tujuan ?>" name="compTujuan" id="compTujuan" class="form-control">
            <input type="hidden" value="<?php echo $dept_tujuan ?>" name="deptTujuan" id="deptTujuan" class="form-control">
            <input type="hidden" value="<?php echo $format ?>" name="format" id="format" class="form-control">
            <input type="date" name="tanggal" value="<?php echo $now ?>" id="datePicker" class="form-control">
        </div>
        <div class="form-group">
            <label><?php echo $dd; ?></label>
            <input id="dept_depo" type="text" name="hal" value="<?php echo $value_d; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Hal :</label>
            <input id="hal" type="text" name="hal" class="form-control">
        </div>
    </div>
    <div class="col-md-10">
        <div class="form-group">
            <label>Isi :</label>
            <textarea id="isi" name="isi"></textarea>
        </div>
        <div class="form-group">
            <button id="btnSave" class="btn btn-info btn-sm">SIMPAN</button>
        </div>
    </div>
  </div>
<!-- </form> -->

</div>
<!-- /.card-body -->
</div>