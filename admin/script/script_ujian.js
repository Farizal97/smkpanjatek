var save_method, table;

//Menampilkan data dengan plugin datatables dan konfigurasi datepicker
$(function(){
   table = $('.table').DataTable({
      "processing" : true,
      "ajax" : {
         "url" : "ajax/ajax_ujian.php?action=table_data",
         "type" : "POST"
      }
   });

   //Konfigurasi datepicker
   $('.datepicker').datepicker({
      format: 'yyyy-mm-dd', 
      autoclose: true
   });
});

//Ketika tombol tambah diklik
function form_add(){
   save_method = "add";
   $('#modal_ujian').modal('show');
   $('#modal_ujian form')[0].reset();
   $('.modal-title').text('Tambah Ujian');
}
	
//Ketika tombol edit diklik
function form_edit(id){
   save_method = "edit";
   $('#modal_ujian form')[0].reset();
   $.ajax({
      url : "ajax/ajax_ujian.php?action=form_data&id="+id,
      type : "GET",
      dataType : "JSON",
      success : function(data){
         $('#modal_ujian').modal('show');
         $('.modal-title').text('Edit Ujian');
			
         $('#id').val(data.id_ujian);
         $('#topik').val(data.topik);
         $('#mapel').val(data.nama_mapel);
         $('#tanggal').val(data.tanggal);
         $('#waktu').val(data.waktu);
         $('#jml_soal').val(data.jml_soal);
         $('#pengampu').val(data.id_guru);
      },
      error : function(){
         alert("Tidak dapat menampilkan data!");
      }
   });
}

//Ketika tombol simpan diklik
function save_data(){
   if(save_method == "add") url = "ajax/ajax_ujian.php?action=insert";
   else url = "ajax/ajax_ujian.php?action=update";
   $.ajax({
      url : url,
      type : "POST",
      data : $('#modal_ujian form').serialize(),
      success : function(data){
         $('#modal_ujian').modal('hide');
         table.ajax.reload();
      },
      error : function(){
         alert("Tidak dapat menyimpan data!");
      }			
   });
   return false;
}
	
//Ketika tombol hapus diklik
function delete_data(id){
   if(confirm("Apakah yakin data akan dihapus?")){
      $.ajax({
        url : "ajax/ajax_ujian.php?action=delete&id="+id,
        type : "GET",
        success : function(data){
           table.ajax.reload();
        },
        error : function(){
           alert("Tidak dapat menghapus data!");
        }
     });
   }
}
