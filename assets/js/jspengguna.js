$(document).ready(function(){
	$("#data-tabelku tr.aktif").click();
})
$("#addpengguna").click(function(){
	//alert('Anda mengklik tambah');
	document.formpengguna.setAttribute('action',$("#urlsimpan").val());
	$(this).addClass('hilang');
	$("#editpengguna").addClass('hilang');
	$("#hapuspengguna").addClass('hilang');
	$("#cetakpengguna").addClass('hilang');
	$("#savepengguna").removeClass('hilang');
	$("#batalpengguna").removeClass('hilang');
	$("#nama").val('');
	$("#jabatan").val('');
	$("#username").val('');
	$("#password").val('');
	document.getElementById("aktiv").checked = false;
	for(x=1;x<=6;x++){
		document.getElementById("modul"+x).checked = false;
	}
	$("#nama").focus();
})
//TOmbol Edit
$("#editpengguna").click(function(){
	//alert('Anda mengklik tambah');
	document.formpengguna.setAttribute('action',$("#urledit").val());
	$(this).addClass('hilang');
	$("#addpengguna").addClass('hilang');
	$("#hapuspengguna").addClass('hilang');
	$("#cetakpengguna").addClass('hilang');
	$("#savepengguna").removeClass('hilang');
	$("#batalpengguna").removeClass('hilang');
	$("#jabatan").focus();
})
//Tombol Cetak
$("#cetakpengguna").click(function(){
	alert('dalam pembuatan, hubungi programmer');
})
// Tombol batal
$("#batalpengguna").click(function(){
	$(this).addClass('hilang');
	$("#editpengguna").removeClass('hilang');
	$("#hapuspengguna").removeClass('hilang');
	$("#cetakpengguna").removeClass('hilang');
	$("#addpengguna").removeClass('hilang');
	$("#savepengguna").addClass('hilang');
	$("#data-tabelku tr.aktif").click();
})
$("#savepengguna").click(function(){
	document.formpengguna.submit();
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
	$("#hapuspengguna").attr('data-href','pengguna/hapuspengguna/'+ide);
	$(this).addClass('aktif');
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "pengguna/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#jabatan").val(data[0].jabatan);
			$("#id").val(data[0].id);
		}
	})
})
