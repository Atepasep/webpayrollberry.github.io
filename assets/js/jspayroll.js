$(document).ready(function(){

})
$("#kodepayroll").on('change',function(){
	var kode = $(this).val();
	if(kode!="SALARY"){
		$("#bulanperiode").addClass('hilang');
	}else{
		$("#bulanperiode").removeClass('hilang');
	}
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
	alert('OK');
	document.formprosespayroll.submit();
})
$("#xprosespayroll").on('click',function(){
	var x = $("#xprosespayroll span").innerhtml;
	alert(x);
})