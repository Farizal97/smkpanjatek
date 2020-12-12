var table;

$(function(){
   var ujian = $('#id_ujian').val();
   var kelas = $('#id_kelas').val();
   table = $('.table').DataTable({
      "processing" : true,
      "pageLength" : 50,
      "paging" : false,
      "ajax" : {
         "url" : "ajax/ajax_nilai.php?action=table_data&ujian=" + ujian + "&kelas=" + kelas,
         "type" : "POST"
      }
   });
});

function export_nilai(){
   ujian = $('#id_ujian').val();
   kelas = $('#id_kelas').val();
   window.open("export/excel_nilai.php?ujian=" + ujian + "&kelas=" + kelas, "Export Nilai");
}
