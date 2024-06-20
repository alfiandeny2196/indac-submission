$(document).ready(function () {
    $('#hal').focus();
    $('#isi').summernote({
        height: 300,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['table', ['table']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ],
    })

    $(document).on({
        click: function () {
            let tanggal = $('#datePicker').val();
            let format = $('#format').val();
            let dept_tujuan = $('#deptTujuan').val();
            let comp_tujuan = $('#compTujuan').val();
            if (tanggal == '') {
                ShowError('TANGGAL TIDAK BOLEH KOSONG');
                $('#datePicker').focus();
                return false
            }
            let dept_depo = $('#dept_depo').val();
            if (dept_depo == '') {
                ShowError('DEPARTEMEN/DEPO TIDAK BOLEH KOSONG');
                setTimeout(function () {
                    $("#dept_depo").focus();
                }, 2000)
                return false
            }
            let hal = $('#hal').val();
            if (hal == '') {
                ShowError('HAL TIDAK BOLEH KOSONG');
                setTimeout(function () {
                    $("#hal").focus();
                }, 2000)
                
                return false
            }
            let isi = $('#isi').val();
            if (isi == '') {
                ShowError('ISI TIDAK BOLEH KOSONG');
                setTimeout(function () {
                    $("#isi").focus();
                }, 2000)
                return false
            }

            var data = {
                format : format,
                tanggal : tanggal,
                dept_tujuan : dept_tujuan,
                comp_tujuan : comp_tujuan,
                dept_depo : dept_depo,
                hal : hal,
                isi : isi,
            }

            $.ajax({
                url: "backend/call_memo.php?act=save",
                type: "POST",
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function(res)
                {
                    let response = JSON.parse(res);
                    if (response['status'] === "0000") {
                        ShowMessageOk('DATA BERHASIL DISIMPAN', 'BERHASIL', 'index.php?page=pengajuan_saya')
                    } else {
                        ShowError(response['status'], 'TERJADI KESALAHAN TEKNIS')
                    }
                },
                error: function(res)
                {
                    ShowError('REQUEST AJAX GAGAL')
                }
           });

        }
    }, "#btnSave");


});