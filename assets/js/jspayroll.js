$(document).ready(function(){

})
$("#kodepayroll").on('change',function(){
	var kode = $(this).val();
	if(kode!="Salary"){
		$("#bulanperiode").addClass('hilang');
	}else{
		$("#bulanperiode").removeClass('hilang');
	}
})