$("#savegaji").click(function(){
	var valid = true;
	if($("#gaji").val()=="" || $("#gaji").val()=='0'){
		$("#gaji").addClass('is-invalid');
		valid = false;
	}
	if(valid){
		document.formgaji.submit();
	}
})

$('#gaji').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    hitunggakot();
}));

$('#tunjab').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    hitunggakot();
}));

$('#tunskill').on('change click keyup input paste',(function (event) {
    $(this).val(function (index, value) {
        return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
    hitunggakot();
}));

function hitunggakot(){
    var gaji;
    if($("#gaji").val()==''){
        gaji = 0;
    }else{
        gaji = toAngka($("#gaji").val());
    }
    var tunjab;
    if($("#tunjab").val()==''){
        tunjab = 0;
    }else{
        tunjab = toAngka($("#tunjab").val());
    }
    var tunskill;
    if($("#tunskill").val()==''){
        tunskill = 0;
    }else{
        tunskill = toAngka($("#tunskill").val());
    }
    var hitung = parseFloat(gaji)+parseFloat(tunjab)+parseFloat(tunskill);
    $("#gakot").val(rupiah(hitung,'.',',',0));
}