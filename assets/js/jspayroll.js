$(document).ready(function(){

})
$('#persenthrbonus').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
}));
$("#carifiletransport").on('click',function(){
	$("#filetransport").click();
})
$("#filetransport").change(function(){
	$("#filepathtransport").val($(this).val());
})
$("#filepathtransport").on('click',function(){
	$("#carifiletransport").click();
})
$("#carifilekoperasi").on('click',function(){
	$("#filekoperasi").click();
})
$("#filekoperasi").change(function(){
	$("#filepathkoperasi").val($(this).val());
})
$("#filepathkoperasi").on('click',function(){
	$("#carifilekoperasi").click();
})
$("#prosespayroll").on('click',function(){
	var jadi = true;
	if($("#code").val()!='SALARY'){
		if($("#persenthrbonus").val()==''){
			$("#persenthrbonus").addClass('is-invalid');
			jadi = false;
		}
	}
	if(jadi){
		document.formprosespayroll.submit();
	}else{
		pesan('warning','Persen harus diisi');
	}
})
$("#kodepayroll").on('change',function(){
	var kodepayroll = $(this).val();
	var bulanperiode = $("#bulanperiode").val();
	var tahunperiode = $("#tahunperiode").val();
	if(kodepayroll!="SALARY"){
		$("#bulanperiode").addClass('hilang');
	}else{
		$("#bulanperiode").removeClass('hilang');
	}
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "payroll/ubahperiode",
		data : {kode : kodepayroll,bulan:bulanperiode,tahun:tahunperiode},
		success : function(data){
			if(data==1){
				window.location.reload();
			}
		}
	})
})
$("#bulanperiode").on('change',function(){
	$("#kodepayroll").change();
})
$("#tahunperiode").on('change',function(){
	$("#kodepayroll").change();
})
$(document).on('click','#membuatpdf',function(){
	var rel = $(this).attr('rel');
	$("#spinnya").removeClass('hilang');
	$.ajax({
		dataType : 'json',
		type : "POST",
		url : "payroll/buatpdf",
		data : {id : rel},
		success : function(data){
			if(data==1){
				$("#spinnya").addClass('hilang');
				pesan('info','kirim email berhasil');
			}else{
				pesan('danger',data);
			}
		}
	})
})