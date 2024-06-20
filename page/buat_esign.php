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
<form id= "image-upload-form" method="POST" action="backend/buat_esign.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
      <label>Upload E-Sign Anda (*.png) maksimal : 200kb</label><br>
      <div class="form-group" style="float: left;">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="esign">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
      </div>
      &nbsp;&nbsp;<button class="btn btn-info btn-sm"><b>SIMPAN</b></button>
      </div>
      <table class="table table-bordered" width = "50%">
        <tr>
          <td style="font-weight: bold;">E-sign Anda</td>
          <td>
            <?php
              $query = mysqli_query($conn, "SELECT esign FROM tb_user WHERE id_user =".$_SESSION['id']);
              $row = $query->fetch_assoc();
              if ($row['esign'] != '') echo "<img src=e-sign/".$row['esign']." width = 150px>";
            ?>
          </td>
        </tr>
      </table>
    </div>

  </div>
</form>

</div>
<!-- /.card-body -->
</div>