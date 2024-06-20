$(function () {
    bsCustomFileInput.init();
});

$(document).ready(function (e) {
    $("#image-upload-form").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "backend/buat_esign.php?act=save",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data)
            {
                let response = JSON.parse(data);
                if (response['status'] === "0000") {
                    Swal.fire({
                        title: "BERHASIL",
                        text: "E-Sign Berhasil Di Simpan",
                        icon: "info"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.replace('index.php?page=buat_esign');
                        }
                    });
                } else if (response['status'] === "0001") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Terjadi Kesalahan Teknis"
                    });
                } else if (response['status'] === "0002") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Gagal Upload File"
                    });
                } else if (response['status'] === "0003") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ukuran Terlalu Besar"
                    });
                } else if (response['status'] === "0004") {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Ekstensi Tidak Sesuai"
                    });
                }
            },
            error: function(data)
            {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Request Ajax Gagal"
                });
            }
       });
    }));

});