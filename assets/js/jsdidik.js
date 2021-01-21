$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#adddidik").click(function(){
	alert('Anda mengklik tambah');
})
$("#data-tabelku tr").on('click',function(){
	var ide = $(this).attr('rel')
	$("#data-tabelku tr").removeClass('aktif');
	$(this).addClass('aktif');
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "didik/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#kode").val(data[0].kode);
			$("#pendidikan").val(data[0].pendidikan);
		}
	})
})