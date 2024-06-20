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
<!-- <form method="POST" action=""> -->
<div class="row">
    <div class="col-md-4">
      <div class="form-group">
      <label>Perusahaan Tujuan</label>
        <select id="selectComp" name="comp_tujuan" class="form-control select2" style="width: 100%;">
        <option value="">-- Pilih Perusahaan Tujuan --</option>
        </select>
      </div>
      <div class="form-group">
      <label>Format Pengajuan</label>
        <select id="selectFormat" name="format" class="form-control select2" style="width: 100%;">
        <option value="">-- Pilih Format --</option>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
      <label>Departemen Tujuan</label>
        <select id="selectDept" name ="dept_tujuan" class="form-control select2" style="width: 100%;">
        <option value="">-- Pilih Dept Tujuan --</option>
        </select>
      </div>
      <div class="form-group">
        <!-- <label>Tanggal:</label>
        <input type="date" name="tanggal" id="dateSubmission" class="form-control"> -->
        <button id="btnNext" class="btn btn-info btn-sm" style="margin-top : 29px;" disabled><b>LANJUT</b><i style="margin-left: 10px;" class="fas fa-arrow-circle-right" aria-hidden="true"></i></button>
      </div>
    </div>
  </div>
<!-- </form> -->
</div>

<!-- /.card-body -->
</div>