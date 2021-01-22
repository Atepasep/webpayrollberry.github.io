$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#addbagian").click(function(){
	//alert('Anda mengklik tambah');
	document.formbagian.setAttribute('action',$("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#editbagian").addClass('hilang');
	$("#hapusbagian").addClass('hilang');
	$("#cetakbagian").addClass('hilang');
	$("#savebagian").removeClass('hilang');
	$("#batalbagian").removeClass('hilang');
	$("#kode").val('');
	$("#bagian").val('');
	$("#kode").focus();
})
//TOmbol Edit
$("#editbagian").click(function(){
	//alert('Anda mengklik tambah');
	document.formbagian.setAttribute('action',$("#urledit").val());
	$(this).addClass('hilang');
	$("#addbagian").addClass('hilang');
	$("#hapusbagian").addClass('hilang');
	$("#cetakbagian").addClass('hilang');
	$("#savebagian").removeClass('hilang');
	$("#batalbagian").removeClass('hilang');
	$("#kode").focus();
})
//Tombol Cetak
$("#cetakbagian").click(function(){
	alert('dalam pembuatan, hubungi programmer');
})
// Tombol batal
$("#batalbagian").click(function(){
	$(this).addClass('hilang');
	$("#editbagian").removeClass('hilang');
	$("#hapusbagian").removeClass('hilang');
	$("#cetakbagian").removeClass('hilang');
	$("#addbagian").removeClass('hilang');
	$("#savebagian").addClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#savebagian").click(function(){
	document.formbagian.submit();
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
	$("#hapusbagian").attr('data-href','bagian/hapusbagian/'+ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "bagian/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#kode").val(data[0].kode);
			$("#bagian").val(data[0].bagian);
			$("#id").val(data[0].id);
		}
	})
})
