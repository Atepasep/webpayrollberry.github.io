<div class="container-fluid" style="margin-top: 10px;">
	<div class="row">
        <input type="hidden" name="code" id="code" value="<?= $code ?>">
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
                            <input type="text" class="form-control form-control-sm flat warnahitam " style="text-align: right;" name="astek" id="astek" value="<?= rupiah($astek,0,',','.') ?>" disabled>
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
                    <div class="form-group row mb-6"></div>
                    <div class="form-group row mb-6"></div>
                    <div class="form-group row mb-0 <?php if($code=='SALARY'){ echo "hilang"; } ?>">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">% <?= $code ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam bg-warning" style="text-align: right;" name="prc_bonus" id="prc_bonus" value="<?= rupiah($prc_bonus,0,',','.') ?>" >
                        </div>
                    </div>
                    <div class="form-group row mb-0 <?php if($code=='SALARY'){ echo "hilang"; } ?>">
                        <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Jumlah <?= $code ?></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="thr_bonus" id="thr_bonus" value="<?= rupiah($thr_bonus,0,',','.') ?>" readonly >
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
                            <input type="text" class="form-control form-control-sm flat warnahitam" style="text-align: right;" name="thp" id="thp" value="<?= rupiah($thp,0,',','.') ?>" readonly >
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
                    <input type="hidden" name="editke" id="editke" value="<?= $editke ?>">
                </div>
            </div>
	    </div>
	</div>
	<hr class="small">
    <div class="row">
        <input type="hidden" name="lokimage" id="lokimage" value="<?= LOK_FOTO ?>">
        <div class="col-sm-6">
            <div class="form-group row mb-0">
                <label for="inputEmail3" class="col-sm-4 col-form-label-sm">Real THP</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm flat warnahitam font-tebal" style="text-align: right;" name="realthp" id="realthp" value="<?= rupiah($realthp,0,',','.') ?>" readonly>
                </div>
            </div>
        </div>
    	<div class="col-sm-6" style="text-align: right;margin-bottom: 10px;">
            <a class="" id="spinloading"><i class="fas fa-circle-notch fa-spin"></i> Loading</a>
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
    $(document).ready(function(){
        $("#spinloading").addClass('hilang');
        $("#astek").removeAttr('disabled');
    })
    $('#other').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#astek').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#jp').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#bijab').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#pkp').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#pphyear').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#pphmonth').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#pphgovmnt').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#meal').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#transport').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#koperasi').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
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
        hitungthp();
    }));
    $('#bpjs').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
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
        hitungthp();
    }));
    $('#jamsostek').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $('#prc_bonus').on('change click keyup input paste',(function (event) {
        $(this).val(function (index, value) {
            return value.replace(/(?!\.)\D/g, "").replace(/(?<=\..*)\./g, "").replace(/(?<=\.\d\d).*/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        });
        hitungthp();
    }));
    $("#simpaneditpayrol").on('click',function(){
        var x = $("#id").val();
        var img = $("#lokimage").val();
        $("#spinloading").removeClass('hilang');
        $.ajax({
            dataType : 'json',
            type : "POST",
            url : "payroll/simpaneditpayroll",
            data : {id :x,other:$("#other").val(),astek:$("#astek").val(),jp:$("#jp").val(),bijab:$("#bijab").val(),pkp:$("#pkp").val(),pphyear:$("#pphyear").val(),pphmonth:$("#pphmonth").val(),pphgovmnt:$("#pphgovmnt").val(),meal:$("#meal").val(),transport:$("#transport").val(),koperasi:$("#koperasi").val(),thp:$("#thp").val(),loan:$("#loan").val(),bpjs:$("#bpjs").val(),realthp:$("#realthp").val(),biayabank:$("#biayabank").val(),jamsostek:$("#jamsostek").val(),editke:$("#editke").val()},
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
                    document.getElementById('kolompphmonth'+x).innerHTML = rupiah(data[0].pphmonth,'.',',',0);  
                    $("#tombolkembali").click();
                }
            }
        })
    })
    $("#tombolkembali").click(function(){
        $("#spinloading").removeClass('hilang');
    })
    function hitungthp(){
        // REPLACE s.Thp        WITH _Gross+s.Other - (s.Astek+s.Jp+s.PphMonth) + s.Meal + s.Transport - s.Koperasi
        var gross;
        if($("#gross").val()==''){
            gross = 0;
        }else{
            gross = toAngka($("#gross").val());
        }
        var astek;
        if($("#astek").val()==''){
            astek = 0;
        }else{
            astek = toAngka($("#astek").val());
        }
        var bijab;
        if($("#bijab").val()==''){
            bijab = 0;
        }else{
            bijab = toAngka($("#bijab").val());
        }
        var other;
        if($("#other").val()==''){
            other = 0;
        }else{
            other = toAngka($("#other").val());
        }
        var jp;
        if($("#jp").val()==''){
            jp = 0;
        }else{
            jp = toAngka($("#jp").val());
        }
        var ptkp;
        if($("#ptkp").val()==''){
            ptkp = 0;
        }else{
            ptkp = toAngka($("#ptkp").val());
        }
        var pphmonth;
        if($("#pphmonth").val()==''){
            pphmonth = 0;
        }else{
            pphmonth = toAngka($("#pphmonth").val());
        }
        var meal;
        if($("#meal").val()==''){
            meal = 0;
        }else{
            meal = toAngka($("#meal").val());
        }
        var transport;
        if($("#transport").val()==''){
            transport = 0;
        }else{
            transport = toAngka($("#transport").val());
        }
        var koperasi;
        if($("#koperasi").val()==''){
            koperasi = 0;
        }else{
            koperasi = toAngka($("#koperasi").val());
        }
        var loan;
        if($("#loan").val()==''){
            loan = 0;
        }else{
            loan = toAngka($("#loan").val());
        }
        var bpjs;
        if($("#bpjs").val()==''){
            bpjs = 0;
        }else{
            bpjs = toAngka($("#bpjs").val());
        }
        var prc_bonus;
        if($("#prc_bonus").val()==''){
            prc_bonus = 0;
        }else{
            prc_bonus = toAngka($("#prc_bonus").val());
        }
        if($("#code").val()=='SALARY'){
            //alert('Ini Salary');
            hitungpajak();
            hitung = parseFloat(gross)+parseFloat(other)-(parseFloat(astek)+parseFloat(jp)+parseFloat(pphmonth))+parseFloat(meal)+parseFloat(transport)-parseFloat(koperasi);
            $("#thp").val(rupiah(hitung,'.',',',0));
            // Realthp=thp-loan-bpjs
            hitungreal = hitung-parseFloat(loan)-parseFloat(bpjs);
            $("#realthp").val(rupiah(hitungreal,'.',',',0));
        }else{
            var thr_bonus = parseFloat(gross)*(parseFloat(prc_bonus)/100);
            $("#thr_bonus").val(rupiah(thr_bonus,'.',',',0));

            var sim = simpajak(gross,thr_bonus,ptkp);
            $("#pphyear").val(rupiah(sim,'.',',',0));
            $("#pphmonth").val(rupiah(sim,'.',',',0));
            $("#thp").val(rupiah(thr_bonus-sim,'.',',',0));
            $("#realthp").val(rupiah(thr_bonus-sim,'',',',0));
        }
    }
    function hitungpajak(){
        var gross;
        if($("#gross").val()==''){
            gross = 0;
        }else{
            gross = toAngka($("#gross").val());
        }
        var astek;
        if($("#astek").val()==''){
            astek = 0;
        }else{
            astek = toAngka($("#astek").val());
        }
        var bijab;
        if($("#bijab").val()==''){
            bijab = 0;
        }else{
            bijab = toAngka($("#bijab").val());
        }
        var other;
        if($("#other").val()==''){
            other = 0;
        }else{
            other = toAngka($("#other").val());
        }
        var jp;
        if($("#jp").val()==''){
            jp = 0;
        }else{
            jp = toAngka($("#jp").val());
        }
        var pphmonth;
        if($("#pphmonth").val()==''){
            pphmonth = 0;
        }else{
            pphmonth = toAngka($("#pphmonth").val());
        }
        var ptkp;
        if($("#ptkp").val()==''){
            ptkp = 0;
        }else{
            ptkp = toAngka($("#ptkp").val());
        }
        var pkp = (((parseFloat(gross)-(parseFloat(astek)+parseFloat(jp)+parseFloat(bijab)+parseFloat(ptkp)))/1000)*1000)*12;
        var pphyear = 0;
        if(pkp > 500000000){
            pphyear = 95000000+((pkp-500000000)*0.3);
        }else{
            if (pkp > 250000000) {
                pphyear = 32500000+((pkp-250000000)*0.25);
            }else{
                if (pkp > 50000000) {
                    pphyear = 2500000+((pkp-50000000)*0.15);
                }else{
                    if (pkp > 0) {
                        pphyear = pkp*0.05;
                    }else{
                        pphyear = 0;
                    }
                }
            }
        }
        var xpkp = pkp < 0 ? 0 : pkp/12;
        $("#pkp").val(rupiah(xpkp,'.',',',0));
        $("#pphyear").val(rupiah(pphyear,'.',',',0));
        $("#pphmonth").val(rupiah(pphyear/12,'.',',',0));
    }
    function simpajak(gross,thrbonus,ptkp){
        var xGross = gross*12;
        var xAstek = xGross*0.02;
        var docek =  xGross>(8094000*12) ? (8094000*12) : xGross;
        var xJp = docek * 0.01;
        var xbijab = (xGross*0.05)<6000000 ? xGross*0.05 : 6000000;
        var xptkp = ptkp;  
        var xpkp = ((xGross-(xAstek+xJp+xbijab+xptkp))/1000)*1000;
        var xpphyear = 0;
        if(xpkp > 500000000){
            xpphyear = 95000000+((xpkp-500000000)*0.3);
        }else{
            if (xpkp > 250000000) {
                xpphyear = 32500000+((xpkp-250000000)*0.25);
            }else{
                if (xpkp > 50000000) {
                    xpphyear = 2500000+((xpkp-50000000)*0.15);
                }else{
                    if (xpkp > 0) {
                        xpphyear = xpkp*0.05;
                    }else{
                        xpphyear = 0;
                    }
                }
            }
        }

        var yGross = (gross*12)+thrbonus;
        var yAstek = yGross*0.02;
        var docik = yGross>(8094000*12) ? (8094000*12) : yGross;
        var yJp = docik * 0.01;
        var ybijab = (yGross*0.05)<6000000 ? yGross*0.05 : 6000000;
        var yptkp = ptkp;  
        var ypkp = ((yGross-(yAstek+yJp+ybijab+yptkp))/1000)*1000;
        var ypphyear = 0;
        if(ypkp > 500000000){
            ypphyear = 95000000+((ypkp-500000000)*0.3);
        }else{
            if (ypkp > 250000000) {
                ypphyear = 32500000+((ypkp-250000000)*0.25);
            }else{
                if (ypkp > 50000000) {
                    ypphyear = 2500000+((ypkp-50000000)*0.15);
                }else{
                    if (ypkp > 0) {
                        ypphyear = ypkp*0.05;
                    }else{
                        ypphyear = 0;
                    }
                }
            }
        }

        return (ypphyear-xpphyear); 
    }
</script>