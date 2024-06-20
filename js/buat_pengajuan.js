

$(document).ready(function() {
    $('#selectComp').select2();
    $('#selectDept').select2();
    $('#selectFormat').select2();
 
    $.ajax({
        type: 'POST',
          url: "backend/global_backend.php?act=search_comp",
          cache: false, 
          success: function(msg){
          $("#selectComp").html(msg);
        }
    });

    $("#selectComp").change(function(){
        var compTujuan = $("#selectComp").val();
        $.ajax({
            type: 'POST',
            url: "backend/global_backend.php?act=search_dept",
            data: {compTujuan: compTujuan},
            cache: false, 
            success: function(msg){
            $("#selectDept").html(msg);
            }
        });
    });

    $("#selectDept").change(function(){
        var deptTujuan = $("#selectDept").val();
            $.ajax({
                type: 'POST',
                url: "backend/global_backend.php?act=search_format",
                data: {deptTujuan: deptTujuan},
                cache: false,
                success: function(msg){
                $("#selectFormat").html(msg);
              }
          });
    });

    $("#selectFormat").change(function(){
    var format = $(this).val();
        if (format != ''){
            $("#btnNext").prop("disabled", false);
        }else {
            $("#btnNext").prop("disabled", true);
        }
    });

    $(document).on({
        click: function () {
            let compTujuan = btoa($('#selectComp').val());
            let deptTujuan = btoa($('#selectDept').val());
            let target     = $('#selectFormat').val().split("#")[1];
            let format     = btoa($('#selectFormat').val().split("#")[0]);

            //let next_link  = btoa('compTujuan='+ compTujuan + '&deptTujuan='+ deptTujuan)
            window.location.replace('index.php?page_group=buat_pengajuan&page=' + target + '&compTujuan='+ compTujuan + '&deptTujuan='+ deptTujuan + "&format="+ format);
        }
    }, "#btnNext");
    


    
});