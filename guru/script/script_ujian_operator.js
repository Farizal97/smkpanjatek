var save_method, table;

//Menampilkan data dengan plugin dataTable
$(function(){
   table = $('.table').DataTable({
     "processing" : true,
     "ajax" : {
     "url" : "ajax/ajax_ujian_operator.php?action=table_data",
        "type" : "POST"
     }
   });
});
	
//Ketika nama kelas diklik
function edit_data(kelas, ujian){
   $.ajax({
      url : "ajax/ajax_ujian_operator.php?action=update&kelas=" + kelas + "&ujian=" + ujian,
   type : "GET",
   success : function(data){
      table.ajax.reload();
   },
      error : function(){
        alert('Tidak dapat mengubah data');
      }
   });		
}
