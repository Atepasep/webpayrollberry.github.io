<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
	    <div class="col-sm-12">
	    	<div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Noinduk</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $noinduk ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Nama</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $nama ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Bagian</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $bagian ?>">
	            </div>
	        </div>
	        <div class="form-group row mb-0">
	            <label for="inputEmail3" class="col-sm-2 col-form-label-sm">Jabatan</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control form-control-sm flat warnahitam" name="noinduk" id="noinduk" value="<?= $jabatan ?>">
	            </div>
	        </div>
            <hr class="small">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Basic Salary</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="gaji" id="gaji" value="<?= rupiah($gaji,0,',','.') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Pos Allowance</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="tunjab" id="tunjab" value="<?= rupiah($tunjab,0,',','.') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Skill Allowance</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="tunskill" id="tunskill" value="<?= rupiah($tunskill,0,',','.') ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Gross</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="gross" id="gross" value="<?= rupiah($gaji+$tunjab+$tunskill,0,',','.') ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="small">
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" name="id" id="id" class="hilang" value="<?= $id ?>">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Astek</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="astek" id="astek" value="<?= rupiah($astek,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Jp</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="jp" id="jp" value="<?= rupiah($jp,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Other</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="other" id="other" value="<?= rupiah($other,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Bijab</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="bijab" id="bijab" value="<?= rupiah($bijab,0,',','.') ?>" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">PTKP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="ptkp" id="ptkp" value="<?= rupiah($ptkp,0,',','.') ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">PKP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="pkp" id="pkp" value="<?= rupiah($pkp,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">PPH Year</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="pphyear" id="pphyear" value="<?= rupiah($pphyear,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">PPH Month</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="pphmonth" id="pphmonth" value="<?= rupiah($pphmonth,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">PPH Govm</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="pphgovmnt" id="pphgovmnt" value="<?= rupiah($pphgovmnt,0,',','.') ?>" >
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Meal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="meal" id="meal" value="<?= rupiah($meal,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Transport</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="transport" id="transport" value="<?= rupiah($transport,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Koperasi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="koperasi" id="koperasi" value="<?= rupiah($koperasi,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">THP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="thp" id="thp" value="<?= rupiah($thp,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Loan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="loan" id="loan" value="<?= rupiah($loan,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">BPJS</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="bpjs" id="bpjs" value="<?= rupiah($bpjs,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Real THP</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="realthp" id="realthp" value="<?= rupiah($realthp,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Biaya BANK</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="biayabank" id="biayabank" value="<?= rupiah($biayabank,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Jamsostek</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="jamsostek" id="jamsostek" value="<?= rupiah($jamsostek,0,',','.') ?>" >
                        </div>
                    </div>
                </div>
            </div>
	    </div>
	</div>
	<hr class="small">
    <div class="row">
        <input type="hidden" name="lokimage" id="lokimage" value="<?= LOK_FOTO ?>">
        <div class="col-sm-6">
            <div class="form-group row mb-0">
                <label for="inputEmail3" class="col-sm-4 col-form-label-sm">TOTAL</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="total" id="total" value="<?= rupiah($total,0,',','.') ?>" readonly>
                </div>
            </div>
        </div>
    	<div class="col-sm-6" style="text-align: right;margin-bottom: 10px;">
            <a class="hilang" id="spinloading"><i class="fas fa-circle-notch fa-spin"></i> Loading</a>
            <a href="#" class="btn btn-success btn-icon-split btn-sm flat font-kecil" id="simpaneditpayrol">
                <span class="icon text-white-50">
                    <i class="fas fa-save"></i>
                </span>
                <span class="text">Simpan</span>
            </a>
            <a href="#" data-dismiss="modal" class="btn btn-danger btn-icon-split btn-sm flat font-kecil" id="tombolkembali">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-circle-left"></i>
                </span>
                <span class="text">Kembali</span>
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#other').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#astek').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#jp').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#bijab').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#pkp').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#pphyear').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#pphmonth').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#pphgovmnt').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#meal').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#transport').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#koperasi').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#thp').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#loan').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#bpjs').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#realthp').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#biayabank').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $('#jamsostek').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
    }));
    $("#simpaneditpayrol").on('click',function(){
        var x = $("#id").val();
        var img = $("#lokimage").val();
        $("#spinloading").removeClass('hilang');
        $.ajax({
            dataType : 'json',
            type : "POST",
            url : "payroll/simpaneditpayroll",
            data : {id :x,other:$("#other").val(),astek:$("#astek").val(),jp:$("#jp").val(),bijab:$("#bijab").val(),pkp:$("#pkp").val(),pphyear:$("#pphyear").val(),pphmonth:$("#pphmonth").val(),pphgovmnt:$("#pphgovmnt").val(),meal:$("#meal").val(),transport:$("#transport").val(),koperasi:$("#koperasi").val(),thp:$("#thp").val(),loan:$("#loan").val(),bpjs:$("#bpjs").val(),realthp:$("#realthp").val(),biayabank:$("#biayabank").val(),jamsostek:$("#jamsostek").val()},
            success : function(data){
                if(data.length > 0){
                    $("#gambar"+x).attr('src',img+'pencil-valid.png');
                    document.getElementById('kolomother'+x).innerHTML = rupiah(data[0].other,'.',',',0);  
                    document.getElementById('kolomastek'+x).innerHTML = rupiah(data[0].astek,'.',',',0);  
                    document.getElementById('kolomjp'+x).innerHTML = rupiah(data[0].jp,'.',',',0);    
                    document.getElementById('kolommeal'+x).innerHTML = rupiah(data[0].meal,'.',',',0);    
                    document.getElementById('kolomtransport'+x).innerHTML = rupiah(data[0].transport,'.',',',0);    
                    document.getElementById('kolomkoperasi'+x).innerHTML = rupiah(data[0].koperasi,'.',',',0);       
                    document.getElementById('kolomthp'+x).innerHTML = rupiah(data[0].thp,'.',',',0);    
                    document.getElementById('kolomloan'+x).innerHTML = rupiah(data[0].loan,'.',',',0);    
                    document.getElementById('kolombpjs'+x).innerHTML = rupiah(data[0].bpjs,'.',',',0);    
                    document.getElementById('kolomrealthp'+x).innerHTML = rupiah(data[0].realthp,'.',',',0);    
                    document.getElementById('kolombiayabank'+x).innerHTML = rupiah(data[0].biayabank,'.',',',0);    
                    $("#tombolkembali").click();
                }
            }
        })
    })
</script>