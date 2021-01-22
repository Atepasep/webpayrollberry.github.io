$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#adddidik").click(function(){
	//alert('Anda mengklik tambah');
	document.formdidik.setAttribute('action',$("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#editdidik").addClass('hilang');
	$("#hapusdidik").addClass('hilang');
	$("#cetakdidik").addClass('hilang');
	$("#savedidik").removeClass('hilang');
	$("#bataldidik").removeClass('hilang');
	$("#kode").val('');
	$("#pendidikan").val('');
	$("#kode").focus();
})
// Tombol batal
$("#bataldidik").click(function(){
	//alert('Anda mengklik tambah');
	$(this).addClass('hilang');
	$("#editdidik").removeClass('hilang');
	$("#hapusdidik").removeClass('hilang');
	$("#cetakdidik").removeClass('hilang');
	$("#adddidik").removeClass('hilang');
	$("#savedidik").addClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#savedidik").click(function(){
	document.formdidik.submit();
	// var a = $("#kode").val();
	// var b = $("#pendidikan").val();
	// $.ajax({
	// 	dataType : 'json',
	// 	type : "POST",
	// 	url : "didik/simpandidik",
	// 	data : {kode:a,pendidikan:b},
	// 	success : function(data){
	// 		if (data.length > 0) {
	// 			alert('Data berhasil disimpan');
	// 			$("#data-tabelku tr").removeClass('aktif');
	// 			var row = '<tr class="aktif" rel="'+data[0].id+'"><td>'+data[0].kode+'</td><td>'+data[0].pendidikan+'</td></tr>';
	// 			$("#data-tabelku tr:last").after(row);
	// 			$("#bataldidik").click();
	// 		}else{
	// 			alert('Data tidak berhasil di simpan');
	// 		}
	// 	}
	// })
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
