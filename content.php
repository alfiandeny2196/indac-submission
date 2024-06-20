<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <br>
          <?php
          if (isset($_GET['page'])) {
              switch ($_GET['page']) {
                case 'buat_pengajuan': $title = "BUAT PENGAJUAN"; include "page/buat_pengajuan.php"; break;
                case 'pengajuan_saya': $title = "PENAGJUAN SAYA"; include "page/pengajuan_saya.php"; break;
                case 'buat_esign': $title = "BUAT E-SIGN"; include "page/buat_esign.php"; break;
                case 'call_memo': $title = "CALL MEMO"; include "page/call_memo.php"; break;
                case 'ba': $title = "BERITA ACARA"; include "page/ba.php"; break;
              default: include "page/home.php"; break;
            }
          } else {
            include "page/home.php";
          }
          ?>
        </div>
      </div>
    </div>
</div>

