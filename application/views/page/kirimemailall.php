<div class='modal-body' id="test">
    <table class="table table-bordered datatable table-hover" id="tabelku" width="100%" cellspacing="0">
        <thead class="bg-secondary text-light">
            <tr>
                <th data-priority="1">Ind</th>
                <th data-priority="1">Nama</th>
                <th data-priority="1">Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th data-priority="1">Ind</th>
                <th data-priority="1">Nama</th>
                <th data-priority="1">Status</th>
            </tr>
        </tfoot>
        <tbody>
            <?php $no=0; foreach($dataemail as $xdataemail){ $no++;  ?>
                <tr rel="<?= $xdataemail['id'] ?>" xrel="<?= $xdataemail['nama'] ?>" id="<?= 'dataemailyangke'.$no ?>" class="cariid">
                    <td><?= $xdataemail['ind'] ?></td>
                    <td><?= $xdataemail['nama'] ?></td>
                    <td id="<?= 'detailemailyangke'.$no ?>"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <input type="text" id="jmrek" value="<?= $no ?>" class="hilang">
</div>
<div class='modal-footer'>
    <div class="text-danger mr-4 hilang" id="spinnya">
        <i class="fas fa-circle-notch fa-spin"></i> Loading, Silahkan tunggu
    </div>
    <a href="#" class="btn-ok btn btn-success btn-icon-split btn-sm flat font-kecil" id="yakirim">
        <span class="icon text-white-50">
            <i class="fas fa-paper-plane"></i>
        </span>
        <span class="text">Kirim</span>
    </a>
    <a href="#" class="btn btn-danger btn-icon-split btn-sm flat font-kecil"data-dismiss="modal" id="tombolkembali">
        <span class="icon text-white-50">
            <i class="fas fa-times"></i>
        </span>
        <span class="text">Tidak</span>
    </a>
</div>
<script type="text/javascript">
    var nol = 0;
    $("#yakirim").on('click',function(){
        var jmrek = $("#jmrek").val();
        var xr;
        var ek=0;
        for(xr=1;xr<=jmrek;xr++){
            var rel = $("#dataemailyangke"+xr).attr('rel');
            var nama = $("#dataemailyangke"+xr).attr('xrel');
            kirimemailnya(rel,xr);
        }
    })
    function kirimemailnya(rel,ke){
        $("#spinnya").removeClass('hilang');
        $.ajax({
            dataType : 'json',
            type : "POST",
            url : "payroll/buatpdf",
            data : {id : rel},
            success : function(data){
                if(data==1){
                    nol++;
                    document.getElementById('spinnya').innerHTML = '<i class="fas fa-circle-notch fa-spin"></i> Kirim email ke '+nol+' dari '+$("#jmrek").val();
                    document.getElementById('detailemailyangke'+ke).innerHTML = "OK";
                    if(nol==$("#jmrek").val()){
                        pesan('info','kirim email berhasil');
                        $("#tombolkembali").click();
                    }
                }else{
                    pesan('danger',data);
                }
            }
        })
    }
</script>