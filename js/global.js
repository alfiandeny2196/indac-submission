function ShowError(code, error_msg) {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "[" + code +"] "+error_msg
    });
}

function ShowMessageOk(message, title, redirect) {
    Swal.fire({
        title: title,
        text:  message,
        icon: "info"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace(redirect);
        }
    });
}
function ShowMessage(message, title) {
    Swal.fire({
        title: title,
        text:  message,
        icon: "info"
    });
}

function ShowConfirm(message, title, textya, textno, redirect) {
    Swal.fire({
        title: title,
        text: message,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: textya,
        cancelButtonText: "&nbsp;"+textno+"&nbsp;"
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.replace(redirect);
        }
    });
}

$(document).ready(function(){
    setTimeout(function () {
        $(".preloader2").fadeOut();
    }, 700)
    $(document).on({
        click: function () {
            ShowConfirm("KELUAR DARI SISTEM?", "KONFIRMASI", "KELUAR", "TIDAK", "login.php");
        }
    }, "#btn_logout");
});