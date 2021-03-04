$(document).ready(function(){

})
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
	document.formprosespayroll.submit();
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