<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
      case 'buat_pengajuan': include "js/buat_pengajuan.js"; break;
      case 'pengajuan_saya': include "js/pengajuan_saya.js"; break;
      case 'buat_esign': include "js/buat_esign.js"; break;
      case 'call_memo': include "js/call_memo.js"; break;
      case 'ba': include "js/ba.js"; break;
    default: include ""; break;
  }
  } else {
  include "page/home.php";
  }
?>