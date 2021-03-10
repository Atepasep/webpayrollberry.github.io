$(document).ready(function(){
	//$("#data-tabelku tr.aktif").click();
})
// $("#addpersonil").click(function(){
// 	//alert('Anda mengklik tambah');
// 	// document.formpengguna.setAttribute('action',$("#urlsimpan").val());
// 	// $(this).addClass('hilang');
// 	// $("#editpengguna").addClass('hilang');
// 	// $("#hapuspengguna").addClass('hilang');
// 	// $("#cetakpengguna").addClass('hilang');
// 	// $("#savepengguna").removeClass('hilang');
// 	// $("#batalpengguna").removeClass('hilang');
// 	// $("#nama").val('');
// 	// $("#jabatan").val('');
// 	// $("#username").val('');
// 	// $("#pass").val('');
// 	// document.getElementById("aktiv").checked = false;
// 	// for(x=1;x<=6;x++){
// 	// 	document.getElementById("modul"+x).checked = false;
// 	// }
// 	// $('#foto-profil').attr('src',$("#lokfile").attr('rel')+'nophoto.png');
// 	// $('#foto-profil').attr('alt', $("#lokfile").attr('rel')+'nophoto.png');
// 	// nonaktifkanmodul();
// 	// $("#nama").focus();
// 	// alert('tambah');
// })
// document.on('click','#editpengguna',function(){
// 	alert($(this).attr('rel'));
// })
// //TOmbol Edit
// $("#editpengguna").click(function(){
// 	//alert('Anda mengklik tambah');
// 	document.formpengguna.setAttribute('action',$("#urledit").val());
// 	$(this).addClass('hilang');
// 	$("#addpengguna").addClass('hilang');
// 	$("#hapuspengguna").addClass('hilang');
// 	$("#cetakpengguna").addClass('hilang');
// 	$("#savepengguna").removeClass('hilang');
// 	$("#batalpengguna").removeClass('hilang');
// 	$("#jabatan").focus();
// })
// //Tombol Cetak
// $("#cetakpengguna").click(function(){
// 	pesan('info','dalam pembuatan, hubungi programmer');
// })
// // Tombol batal
// $("#batalpengguna").click(function(){
// 	$(this).addClass('hilang');
// 	$("#editpengguna").removeClass('hilang');
// 	$("#hapuspengguna").removeClass('hilang');
// 	$("#cetakpengguna").removeClass('hilang');
// 	$("#addpengguna").removeClass('hilang');
// 	$("#savepengguna").addClass('hilang');
// 	$("#data-tabelku tr.aktif").click();
// })
$("#savepersonil").click(function(){
	var jadi = true;
	$("#noinduk").removeClass('is-invalid');
	$("#nama").removeClass('is-invalid');
	$("#tempatlahir").removeClass('is-invalid');
	$("#tgllahir").removeClass('is-invalid');
	$("#alamat").removeClass('is-invalid');
	if($("#noinduk").val()==''){
		$("#noinduk").addClass('is-invalid');
	}
	if($("#nama").val()==''){
		$("#nama").addClass('is-invalid');
		jadi = false;
	}
	if($("#tempatlahir").val()==''){
		$("#tempatlahir").addClass('is-invalid');
		jadi = false;
	}
	if($("#tgllahir").val()==''){
		$("#tgllahir").addClass('is-invalid');
		jadi = false;
	}
	if($("#alamat").val()==''){
		$("#alamat").addClass('is-invalid');
		jadi = false;
	}
	if($("#ptkp").val()==''){
		$("#ptkp").addClass('is-invalid');
		jadi = false;
	}
	if($("#email").val()==''){
		$("#email").addClass('is-invalid');
		jadi = false;
	}else{
		if (!validasiEmail($("#email").val())) {
			$("#email").addClass('is-invalid');
			document.getElementById('feedbackemail').innerHTML = 'alamat email tidak valid, cek email';
			jadi = false;
		}
	}
	if(jadi){
		document.formpersonil.submit();
	}else{
		pesan('warning','Semua data harus diisi');
	}
})
// $("#aktiv").on('click',function(){
// 	var onof = document.getElementById('aktiv').checked;
// 	if (onof==true) {
// 		aktifkanmodul();
// 	}else{
// 		nonaktifkanmodul();
// 	}
// })
// $("#pass").on('dblclick',function(){
// 	var tip = $(this).attr('type');
// 	if (tip=='password') {
// 		$(this).attr('type','input');
// 	}else{
// 		$(this).attr('type','password');
// 	}
// })
$("#kontrak").on('change',function(){
	var kontrak = $(this).val();
	if (kontrak==1) {
		$("#kontrakuntil").removeClass('hilang');
	}else{
		$("#kontrakuntil").addClass('hilang');
	}
})
$("#foto-profil").on('dblclick',function(){
	$("#file").click();
})
$("#file").change(function(){
	$("#file_path").val($(this).val());
	bacaGambar(this); 
})
$("#data-tabelku tr").on('click',function(){
	var ide = $(this).attr('rel')
	var lokfile = $("#lokfile").attr('rel');
	$("#data-tabelku tr").removeClass('aktif');
	$("#hapuspengguna").attr('data-href','pengguna/hapuspengguna/'+ide);
	$(this).addClass('aktif');
	document.getElementById('aktiv').checked = false;
	nonaktifkanmodul();
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "pengguna/getdatasatu",
		data : {id : ide},
		success : function(data){
			$("#nama").val(data[0].nama);
			$("#jabatan").val(data[0].jabatan);
			$("#id").val(data[0].id);
			$("#username").val(data[0].username);
			if(data[0].aktiv==1){
				document.getElementById('aktiv').checked = true;
				aktifkanmodul();
			}
			var xmodul = data[0].modul;
			for(ex=1;ex<=6;ex++){
				var cek_ = xmodul.substr(ex,1);
				if (cek_=='1') {
					document.getElementById("modul"+ex).checked = true;
				}else{
					document.getElementById("modul"+ex).checked = false;
				}
			}
			$("#old_logo").val(data[0].profil);
			$("#lokfile").val(lokfile+data[0].profil);
			$("#foto-profil").attr('src',lokfile+data[0].profil);
			//$("#pass").val(data[0].pass);
			getpass(data[0].id);
		}
	})
})
function getpass(id){
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "pengguna/getpass",
		data : {ide:id},
		success : function(data){
			//alert(data);
			$("#pass").val(data);
		}
	})
}
function aktifkanmodul(){
	$("#username").attr('disabled',false);
	$("#pass").attr('disabled',false);
	for(ex=1;ex<=6;ex++){
		$("#modul"+ex).attr('disabled',false);
	}
}
function nonaktifkanmodul(){
	$("#username").attr('disabled',true);
	$("#pass").attr('disabled',true);
	for(ex=1;ex<=6;ex++){
		$("#modul"+ex).attr('disabled',true);
	}
}
function bacaGambar(input) {
   if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#foto-profil').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
   }
}
function validasiEmail(email) {
  const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}