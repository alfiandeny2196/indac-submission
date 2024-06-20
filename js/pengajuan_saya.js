$(document).ready(function() {
    new DataTable('#tblData', {
        responsive: true, 
        autoWidth: false,
        ajax : {
            url: "backend/pengajuan_saya.php?act=get",
            dataType: "JSON",
            dataSrc: ""
        },
        columns: [
            { data: "no", width: "3%" },
            { data: "aksi", width : "3%"},
            { data: "nama_format", width: "15%" },
            { data:  "kode_dokumen" , width: "15%" },
            { data:  "tanggal" },
            { data: "dept_tujuan" },
            { data: "hal" , width: "20%"},
            { data: "creator"},
            { data: "created" },
        ]
    });
})