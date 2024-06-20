<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+


// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('INDASoft - Internal ERP System');
$pdf->SetTitle('PERJANJIAN KERJA');
$pdf->SetSubject('PERJANJIAN KERJA UNTUK WAKTU TERTENTU No. 00123 / PKWT / WD / HC / 11 / 2014');
$pdf->SetKeywords('INDASoft, Perjanjian Kerja, PKWT, PDF');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
//$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins (Left Margin, Top Margin, Right Margin)
$pdf->SetMargins('25', '55', '25');

//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('times', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// Set some content to print
$content = '<p align="center"><strong>PERJANJIAN KERJA UNTUK WAKTU TERTENTU<br>
      No. 00123 / PKWT / WD / HC / '. date("m") .' / '. date("Y") .'</strong></p>
</br></br>
<p align="justify">Pada hari ini '. date("l") .',  tanggal '. date("d") .' bulan '. date("M") .' tahun '. date("Y") .', bertempat di Kantor PT. Indaco Warna Dunia,  Karanganyar, saling berhadapan untuk mengikatkan diri guna membuat perjanjian  kerja untuk waktu tertentu antara :</p>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="20%">Nama</td>
    <td width="80%">: Sri Lestari </td>
  </tr>
  <tr>
    <td>Jabatan</td>
    <td>: Koordinator HC</td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: PT. Indaco Warna  Dunia, Desa Pulosari,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;Kec. Kebakkramat,&nbsp; Kabupaten Karanganyar</td>
  </tr>
  <tr>
    <td>Jenis Usaha </td>
    <td>: Distribusi </td>
  </tr>
</table>
<p align="justify">Dalam hal ini bertindak untuk dan atas nama PT. Indaco Warna Dunia, yang beralamat di Dk. Karang Kidul, Ds Pulosari, Kec. Kebakkramat, Kab Karanganyar dalam kedudukannya selaku Koordinator HC selanjutnya disebut:
</p>
<p align="center"><strong>--------------------------------------PIHAK PERTAMA----------------------------------------</strong></p>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="20%">Nama</td>
    <td width="80%">: </td>
  </tr>
  <tr>
    <td>TTL</td>
    <td>: </td>
  </tr>
  <tr>
    <td>No KTP </td>
    <td>: </td>
  </tr>
  <tr>
    <td>Alamat </td>
    <td>:</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p align="justify">Dalam hal ini bertindak untuk diri sendiri, yang untuk selanjutnya disebut:</p>
<p align="center"><strong>--------------------------------------PIHAK KEDUA----------------------------------------</strong></p>
<p align="justify">Sebelumnya para pihak menyatakan dengan sadar dan sesungguhnya kedua belah pihak sepakat untuk membuat dan melaksanakan perjanjian kerja untuk waktu tertentu selanjutnya disebut PKWT yang isinya sebagaimana diatur dalam ketentuan pada pasal-pasal tersebut di bawah ini :</p>
</br>
<p align="center"><strong>PASAL 1</strong></p>
<p align="center"><strong>JENIS PEKERJAAN</strong></p>
<ol>
	<li><p align="justify">
	Pihak PERTAMA memberikan dan menempatkan PIHAK KEDUA sebagai di
	PT. Warna Dunia. Bertempat di PT. Warna Dunia, Karanganyar
	yang untuk itu PIHAK KEDUA menyatakan kesediaannya
	</p></li>
	<li><p align="justify">
	Sehubungan dengan diterimanya pekerjaan tersebut, maka PIHAK KEDUA
	dengan posisi/jabatan tertentu bersedia menyerahkan ijazah asli
	pendidikan terakhir kepada PIHAK PERTAMA sebagai keterikatan kerja
	diantara keduanya. Penyerahan sebagaimana tersebut akan diberikan
	suatu tanda terima dari PIHAK PERTAMA
	</p></li>
	<li><p align="justify">
	Tanpa mengabaikan kesepakatan/ketentuan dalam
	perjanjian ini, maka para pihak bersedia melepaskan ketentuan
	peraturan perundangan yang berlaku apabila ditetapkan status baru/tertentu bagi jabatan/jenis pekerjaan
	diluar/yang berbeda
	dengan apa yang disepakati sesuai dengan perjanjian kerja ini.</p></li>
	<li><p align="justify">
	Dalam hal ketentuan ayat (3) tersebut di atas tidak dapat
	diberlakukan dengan sebab apapun, maka perjanjian ini dapat berakhir
	dengan kesepakatan para pihak terhitung 1 (satu) bulan sejak adanya
	kesepakatan tersebut dengan mempertimbangkan ketentuan yang ada
	dalam Pasal 6 Perjanjian kerja ini.</p></li>
</ol>
</br>
<p align="center"><strong>PASAL 2</strong></p>
<p align="center"><strong>KETENTUAN TUGAS DAN TANGGUNGJAWAB PEKERJAAN PIHAK KEDUA</strong></p>
<ol>
	<li><p align="justify">
	Pihak Kedua bersedia untuk melaksanakan tugas dan tanggung jawab
	pekerjaan yang diberikan oleh Pihak Pertama dengan penuh tanggung
	jawab, jujur, disiplin, tertib dan teliti terkait dengan fungsi
	tugasnya sebagai . dengan ketentuan:
	</p>
	<ol type="a">
		<li><p align="justify">Bersedia melakukan perjalanan dinas atau bertempat tinggal dan bekerja di daerah lain dimanapun di
		seluruh Indonesia ataupun di luar negeri atas nama perusahaan.</p>
		</li>
		<li><p align="justify">Senantiasa menjaga rahasia perusahaan dan tidak akan mempublikasikannya dalam bentuk apapun kepada siapapun baik selama bekerja maupun 
			setelah selesainya masa kerja dengan perusahaan.</p>
		</li>
		<li><p align="justify">Menyerahkan segala bentuk penemuan atau inovasi selama masa kerja dan terdapat hubungan dengan pekerjaan yang dilakukan menjadi hak milik dari 
			perusahaan, dan bersedia menandatangani surat-surat yang berkaitan dengan pemberian hak kepemilikan tersebut.</p>
		</li>
		<li><p align="justify">Bertanggungjawab penuh dan bersedia menggantikan segala bentuk fasilitas, barang, dan keuangan perusahaan yang rusak dan/atau hilang akibat 
			kelalaian, keteledoran, kesalahan, kekeliruan sendiri dan/atau melanggar serta tidak sesuai dengan Standar Operasional Pelaksanaan (SOP) dan kebijakan yang telah 
			ditetapkan Perusahaan.</p>
		</li>
		<li><p align="justify">Segala bentuk kehilangan dan atau kerusakan akibat kesalahan atau kelalaian tersebut dalam Pasal 2 huruf d akan dianggap sebagai hutang pribadi yang 
			harus dibayar kepada perusahaan yang akan dituangkan dalam perjanjian hutang-piutang tersendiri.</p>
		</li>
		<li><p align="justify">Bersedia mengembalikan seluruh biaya selama training, seminar dan atau meeting yang di fasilitasi penuh oleh perusahaan (biaya akomodasi meliputi 
			transportasi, makan dan penginapan)apabila keluar dari perusahaan karena mengundurkan diri sebelum masa kerja 6 (enam) bulan sejak pelaksanaan training, seminar dan 
			atau meeting.</p>
		</li>
		<li><p align="justify">Membayar penalti 50% (Lima Puluh Persen) dari gaji pertama yang diterima jika mengundurkan diri sebelum masa kerja 6 bulan dan atau mengundurkan diri
		tidak sesuai prosedur yang telah ditetapkan perusahaan.</p>
		</li>
	</ol>
	</li>
</ol>
<ol start="2">
	<li start=2><p align="justify">Mematuhi seluruh aturan dalam Peraturan Perusahaan maupun perundang-undangan yang berlaku</p>
	</li>
	<li><p align="justify"> Tidak bekerja atau merangkap tugas pada perusahaan lain selama terikat dengan perjanjian ini.</p>
	</li>
	<li><p align="justify">Bersedia sewaktu-waktu dialihtugaskan atau dipindahkan dari jabatan dalam perjanjian ini sesuai kebutuhan atau kebijakan perusahaan berdasarkan Keputusan
		Direktur.</p>
	</li>
</ol>
</br>
<p>&nbsp;</p>
<p align="center"><strong>PASAL 3</strong></p>
<p align="center"><strong>HAK PIHAK PERTAMA</strong></p>
<p align="justify">Selama perjanjian kerja untuk waktu tertentu ini berlaku, Pihak Kedua berhak atas :</p>
<ol>
	<li><p align="justify">Gaji yang diperhitungkan secara proporsional sesuai kesepakatan dan prestasi kerja.</p>
	</li>
	<li><p align="justify">Tunjangan Hari Raya Keagamaan dan Uang Tahunan sesuai dengan peraturan perusahaan yang berlaku (berdasarkan Surat Keputusan Direktur yang berlaku saat 
		itu);</p>
	</li>
	<li><p align="justify">Diikutsertakan sebagai bagian dari program jaminan sosial oleh perusahaan.</p>
	</li>
	<li><p align="justify">Diikutsertakan dalam skema insentif prestasi tahunan sesuai kebijakan perusahaan yang berlaku berdasarkan keputusan Direktur;</p>
	</li>
	<li><p align="justify">Hak cuti Pihak Kedua diberikan setelah masa kerja selama 1 (satu) tahun sesuai dengan ketentuan peraturan perusahaan yang berlaku;</p>
	</li>
	<li><p align="justify">Pengaturan mengenai Hak Cuti sebagaimana dimaksud diatas mengacu kepada kebijakan Perusahaan yang berlaku.</p>
	</li> 
</ol>
</br>
<p>&nbsp;</p>
<p align="center"><strong>PASAL 4</strong></p>
<p align="center"><strong>JANGKA WAKTU PERJANJIAN</strong></p>
<p align="justify">Pihak Pertama menerima Pihak Kedua sebagai karyawan untuk waktu tertentu dengan masa waktu kerja selama angka ( huruf ) bulan/tahun terhitung dari tanggal  . sampai dengan tanggal  . dengan ketentuan :</p>
<ol>
	<li><p align="justify">Dapat berakhir sewaktu-waktu dengan pemberitahuan oleh PIHAK PERTAMA kepada PIHAK KEDUA sebelumnya, apabila PIHAK KEDUA tidak bisa memenuhi tugas dan 
		tanggungjawab pekerjaan yang sesuai dengan isi perjanjian ini dan/atau melakukan pelanggaran atas peraturan Perusahaan dan/atau Ketentuan Perundang-undangan yang berlaku 
		dan/atau prosedur yang telah di tetapkan perusahaan.</p>
	</li>
	<li><p align="justify">Perjanjian berakhir sebagaimana dimaksud ayat 1 di atas berdasar atas evaluasi oleh PIHAK PERTAMA.</p>
	</li>
</ol>
<p>&nbsp;</p>
<p align="center"><strong>PASAL 5</strong></p>
<p align="center"><strong>BERAKHIRNYA PERJANJIAN</strong></p>
<ol>
	<li><p align="justify">Perjanjian kerja untuk waktu tertentu ini akan berakhir dalam hal :</p>
		<ol type="a">
			<li><p align="justify">Jangka waktu yang ditentukan dalam Perjanjian kerja ini telah habis.</p></li>
			<li><p align="justify">Pihak Kedua mengundurkan diri secara tertulis dari pekerjaan yang telah disepakati dengan Perusahaan.</p></li>
			<li><p align="justify">Pihak Pertama memutuskan hubungan kerja dengan Pihak Kedua sebagaimana diatur dalam Pasal 4 diatas.</p></li>
			<li><p align="justify">Perjanjian kerja putus demi hukum dalam hal Pihak Kedua meninggal dunia </p></li>    
		</ol>
	</li>
	<li><p align="justify">Terhitung dalam waktu 1 (satu) bulan sebelum perjanjian kerja untuk waktu tertentu ini berakhir, kedua belah pihak wajib memberitahukan masa berakhirnya 
		perjanjian kerja tersebut. Apabila tidak ada pemberitahuan dari salah satu pihak atau keduanya maka perjanjian kerja tersebut berakhir dengan sendirinya.</p>
	</li>
	<li><p align="justify">Perjanjian kerja ini dapat berakhir atas permintaan dari Pihak Kedua dengan ketentuan Pihak Kedua harus mengajukan permohonan pengunduran diri secara 
		tertulis kepada Pihak Pertama, sekurang-kurangnya dalam waktu 1 (satu) bulan sebelumnya.</p>
	</li>
	<li><p align="justify">Dalam hal perjanjian ini berakhir sebagaimana disebutkan dalam ayat (1) diatas, maka Pihak Kedua dengan sendirinya tidak berhak menuntut sesuatu hak 
		dalam bentuk apapun terhadap Pihak Pertama,  selain  yang masih menjadi haknya, yaitu perhitungan kompensasi upah berdasarkan kesepakatan kedua pihak.</p>
	</li>
</ol>
</br>
<p>&nbsp;</p>
<p align="center"><strong>PASAL 6</strong></p>
<p align="center"><strong>KOMPENSASI BERAKHIRNYA PERJANJIAN</strong></p>
<ol>
	<li><p align="justify">Dalam hal perjanjian kerja ini berakhir karena PIHAK KEDUA mengundurkan diri, maka :</p>
		<ol type="a">
			<li><p align="justify">Bonus, dan/atau Komisi yang belum diberikan secara otomatis akan hangus;</p>
			</li>
			<li><p align="justify">Wajib menyelesaikan kewajiban-kewajiban baik secara administrasi maupun keuangan yang telah ada maupun yang muncul dikemudian hari.</p>
			</li>
			<li><p align="justify">Untuk gaji perhitungan terakhir akan diberikan paling cepat 1 (satu) bulan setelah audit dilakukan dan/atau ada kejelasan status menyangkut 
				segala permasalahan dari pekerjaan yang telah dilakukan termasuk kewajiban administrasi dan keuangan dan/atau setelah hari terakhir bekerja.</p>
			</li>
			<li><p align="justify">Ijazah yang dijaminkan ke perusahaan diserahkan setelah kriteria yang tercantum pada ketentuan huruf (b) dan (c) di atas terpenuhi.</p>
			</li>
		</ol>
	</li>
	<li><p align="justify">Jika perjanjian berakhir karena pemutusan hubungan kerja oleh PIHAK PERTAMA, maka :</p>
		<ol type="a">
			<li><p align="justify">Bonus, dan/atau Komisi yang belum diberikan secara otomatis akan hangus;</p>
			</li>
			<li><p align="justify">Wajib menyelesaikan kewajiban-kewajiban baik secara administrasi maupun keuangan yang telah ada maupun yang muncul dikemudian hari.</p>
			</li>
			<li><p align="justify">Untuk gaji perhitungan terakhir akan diberikan paling cepat 1 (satu) bulan setelah audit dilakukan dan/atau ada kejelasan status menyangkut 
				segala permasalahan dari pekerjaan yang telah dilakukan termasuk kewajiban administrasi dan keuangan dan/atau setelah hari terakhir bekerja.</p>
			</li>
			<li><p align="justify">Ijazah yang dijaminkan ke perusahaan diserahkan setelah kriteria yang tercantum pada ketentuan huruf (b) dan (c) di atas terpenuhi.</p>
			</li>
		</ol>
	</li>
	<li><p align="justify">Dalam hal pihak kedua meninggal dunia, maka Perjanjian kerja ini dinyatakan putus demi hukum  dan  segala akibatnya mengacu pada peraturan perusahaan 
		serta ketentuan perundang-undangan yang berlaku.</p>
	</li>
</ol>
<p>&nbsp;</p>
<p align="center"><strong>PASAL 7</strong></p>
<p align="center"><strong>PERBEDAAN PENDAPAT</strong></p>
<ol>
	<li><p align="justify">Apabila dalam pelaksanaan dari perjanjian ini terdapat ketidaksepakatan mengenai ketentuan dalam perjanjian ini dan/atau perselisihan antara kedua belah 
		pihak, maka kedua belah pihak bersepakat untuk menyelesaikannya secara musyawarah untuk mufakat</p>
	</li>
	<li><p align="justify">Dalam hal ketentuan ayat (1) tersebut di atas tidak tercapai, maka kedua belah pihak sepakat untuk mengajukan permasalahannya kepada instansi yang 
		berwenang dalam bidang ketenagakerjaan untuk memberikan keputusan yang mengikat.</p>
	</li>
</ol>
</br>
<p align="center"><strong>PASAL 8</strong></p>
<p align="center"><strong>FORCE MAJEUR</strong></p>
<p align="justify">Dalam hal terjadi Force Majeure ( keadaan memaksa ) semisal bencana alam, seperti: banjir, gempa bumi, tanah longsor, petir, angin topan, serta kebakaran yang 
disebabkan oleh faktor extern yang mengganggu kelangsungan perjanjian ini. Huru-hara, kerusuhan, pemberontakan, dan perang yang mengakibatkan hubungan kerja dengan Pihak Kedua 
tidak dapat dilanjutkan atau menjadi berakhir dengan sendirinya, maka untuk hal tersebut Pihak Pertama tidak berkewajiban untuk memberikan kompensasi dalam bentuk apapun kepada 
Pihak Kedua.</p>
</br>
<p align="center"><strong>PASAL 9</strong></p>
<p align="center"><strong>KETENTUAN LAIN-LAIN</strong></p>
<p align="justify">Dalam hal terdapat hal-hal yang tidak dan/atau belum cukup diatur dalam perjanjian kerja ini, maka kedua belah pihak sepakat untuk tunduk pada ketentuan hukum dan perundang-undangan yang berlaku tentang ketenagakerjaan.</p>
</br>
<p align="center"><strong>PASAL 10</strong></p>
<p align="center"><strong>PENUTUP</strong></p>
<ol>
	<li><p align="justify">Perjanjian kerja ini dibuat dalam rangkap 2 (dua), dengan distribusi masing-masing satu bendel serta mempunyai kekuatan hukum yang sama keduanya;</p>
	</li>
	<li><p align="justify">Perjanjian ini berlaku dan mengikat kedua belah pihak sejak tanggal penandatanganan dilakukan.</p>
	</li>
</ol>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td colspan="2"><p align="right">Karanganyar,  '. date("d") .' '. date("M") .' '. date("Y") .'</p>
</td>
  </tr>
  <tr>
    <td width="50%"><p align="center">PEHAK KEDUA </p></td>
    <td width="50%"><p align="center">PIHAK PERTAMA </p></td>
  </tr>
  <tr>
    <td height="75">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><p align="center">( user )</p></td>
    <td><p align="center">( Sri Lestari )</p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $content, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
