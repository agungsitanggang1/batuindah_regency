<?php if(validation_errors()){ ?>
<div class="alert alert-warning">
    <strong><?php echo validation_errors(); ?></strong>
</div>              
<?php } ?>  


<div class="col-md-12">        
    <div class="panel panel-primary" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">
                <?php echo $judulHeader; ?>
            </div>
        </div>
        
        <div class="panel-body">            
            <?php echo form_open_multipart('penghuni/insert',array('class'=>'form-horizontal form-groups-bordered','blok'=>'form'));  ?>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Pilih Rumah<a href="#data_rumah" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Rumah">  <i class="entypo-search"></i></a></label>
                    <div class="col-sm-5">
                        <input type="hidden" name="id_rumah" id="id_rumah" placholder="ID Rumah">
                        <input type="text" name="nama_blok" id="nama_blok" class="form-control" placeholder="Blok Rumah" readonly=true required>
                        <br>
                        <textarea name="no_rumah" id="no_rumah" class="form-control" placeholder="Nomor Rumah" readonly=true required></textarea>
                        <p class="help-block" style="font-size:12px;">Pilih Data Rumah Penghuni</p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Nama Penghuni</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="nama_penghuni" id="nama_penghuni"  pattern="[a-zA-Z ]*" placeholder="Nama Penghuni (Karakter yang diterima a-z , A-Z )" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">No. KTP</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control numbers-only" name="no_ktp" id="no_ktp" placeholder="No. KTP" required/>
                    </div>
                </div>        

            

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Scan KTP</label>                    
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="ktp" id="ktp" placeholder="Photo" required>
                    </div>
                </div>
             
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Scan KK</label>                    
                    <div class="col-sm-5">
                        <input type="file" class="form-control" name="kk" id="kk" placeholder="Photo" required>
                    </div>
                </div>
             
                 

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Status Penghuni</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="status_penghuni" id="status_penghuni" required>
                            <option value="">-Pilih Status Penghuni-</option>
                            <option value="Pemilik">Pemilik</option>
                            <option value="Penyewa">Penyewa</option>
                            <option value="Kerabat">Kerabat</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Pekerjaan</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">No. Telepon</label>                    
                    <div class="col-sm-5">
                        <input type="text" class="form-control numbers-only" name="no_telepon" id="no_telepon" placeholder="No. Telepon" required/>
                    </div>
                </div>

<!--                 <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jml. Anggota Keluarga</label>                    
                    <div class="col-sm-3">
                        <input type="text" class="form-control numbers-only" name="jml_anggota_keluarga" id="jml_anggota_keluarga" placeholder="contoh: 1" onchange="showDaftarKeluarga(this);" required/>
                    </div>
                    <div class="col-sm-2" style="margin-left:-20px;margin-top:5px;">
                        <span>Orang</span>
                    </div>
                </div> -->

                 <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jenis Kelamin</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="jeniskelamin" id="jeniskelamin" required>
                            <option value="">-Pilih Jenis Kelamin-</option>
                            <option value="LAKI-LAKI">LAKI-LAKI</option>
                            <option value="PEREMPUAN">PEREMPUAN</option>
                        </select>
                    </div>
                </div>  

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Status Keluarga</label>                    
                    <div class="col-sm-5">
                        <select class="form-control" name="status_dikeluarga" id="status_dikeluarga" required>
                            <option value="">-Pilih Status Keluarga-</option>
                            <option value="Lajang">Lajang</option>
                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                            
                        </select>
                    </div>
                </div>  
                <br>
     
                <div id="anggota_keluarga">
                    <legend>Daftar Anggota Keluarga</legend>
                    <table class="table table-bordered" id="tabel-keluarga">
                        <thead>
                            <tr>
                                <th style="width:20%;">Nama Anggota Kel.</th>
                                <th style="width:15%;">No. KTP</th>
                                <th style="width:16%">Jenis Kelamin</th>
                                <th style="width:12%">Tempat Lahir</th>
                                <th style="width:12%">Tanggal Lahir</th>
                                <th style="width:20%">Status</th>
                                <th style="width:5%">Aksi</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr>
                                <td style="width:20%;">
                                    <input id="anggota_0_nama" name="anggota[0][nama]" type="text" class="form-control" >
                                </td>
                                <td style="width:15%;">
                                    <input id="anggota_0_no_ktp"  name="anggota[0][no_ktp]" type="text" class="form-control numbers-only">
                                </td>
                                <td style="width:18%">
                                    <select id="anggota_0_jeniskelamin" name="anggota[0][jeniskelamin]" class="form-control" >
                                        <option value="LAKI-LAKI">LAKI-LAKI</option>
                                        <option value="PEREMPUAN">PEREMPUAN</option>
                                    </select>
                                </td>
                                <td style="width:12%">
                                    <textarea id="anggota_0_tempat_lahir" name="anggota[0][tempat_lahir]" class="form-control"></textarea>
                                </td>
                                <td style="width:12%">
                                    <input id="anggota_0_tanggal_lahir" name="anggota[0][tanggal_lahir]" type="text" class="form-control datepicker">
                                </td>
                                <td style="width:20%">
                                    <select id="anggota_0_status" name="anggota[0][status]" class="form-control">
                                        <option value="">--Pilih--</option>
                                        <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Kerabat">Kerabat</option>
                                    </select>
                                </td>
                                <td class="td-actions" style="width:5%">
                                    <a href="#" class="btn btn-small btn-success" onclick="tambahKeluarga();"><i class="entypo-plus"> </i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-danger">Ulang</button>
                        <a class="btn btn-info" href="<?php echo base_url('penghuni'); ?>">Kembali</a>
                    </div>
                </div>
            <?php echo form_close(); ?>          
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/templates/backend/js/jquery-3.2.1.min.js');?>"></script>
<!-- Dialog Rumah Penghuni -->
<div class="modal fade" id="data_rumah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Data Rumah</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered <?php echo (count($rumah) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($rumah) > 0) ? "table-1" : ""; ?>">
            <thead>
              <tr>
                <th>Pilih Rumah</th>
                <th>No. </th>
                <th>No. Blok</th>
                <th>Nama Pemilik</th>
                <th>No. Rumah</th>
                <th>Alamat Lengkap</th>
                <th>Status Rumah</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                <?php if(count($rumah) > 0){ ?>
                    <?php foreach($rumah as $key => $v): ?>
                        <tr>
                            <td>
                                <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Rumah Penghuni" onclick="setDataRumahPenghuni('<?php echo $v->id_rumah; ?>','<?php echo $v->nama_blok; ?>','<?php echo $v->no_rumah; ?>',);">  <i class="entypo-check"></i></a>
                            </td>
                            <td><?php echo $key+1; ?></td>
                            <td><?php echo $v->nama_blok; ?></td>
                            <td><?php echo $v->nama_pemilik; ?></td>
                            <td><?php echo $v->no_rumah; ?></td>
                            <td><?php echo $v->alamat_lengkap; ?></td>
                            <td><?php echo $v->status_rumah; ?></td>
                            <td><?php echo ($v->is_aktif == 1) ? "Aktif" : "Tidak Aktif"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php }else{ ?>
                    <tr><td colspan="9">Rumah Sudah Terisi Semua.</td></tr>
                    <?php } ?>
            </tbody>
        </table>
      </div>
  </div>
</div>
</div>
<!-- End Dialog Rumah Penghuni -->
<script src="<?php echo base_url('assets/templates/backend/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
<script type="text/javascript">
    function setDataRumahPenghuni(id,blok,noRumah){
        $('#id_rumah').val(id);
        $('#nama_blok').val(blok);
        $('#no_rumah').val(noRumah);
        $('#data_rumah').modal('hide');
    }

    function showDaftarKeluarga(obj){
        var jml_anggota = obj.value;

    }
    function tambahKeluarga(){
        var data = {
            tambah_berkas    : 'ya'
        }

        $.ajax({
            url     : "<?php echo base_url('penghuni/setFormKeluarga'); ?>",
            type    : "POST",
            data    : data,
            dataType: 'json',
            success : function (data) {
                $('#tabel-keluarga tbody').append(data.tr);
                renameInputKeluarga();
                setNumber();
            }
        });                          
    }

    function hapusKeluarga(obj){
        $(obj).parents("tr").fadeOut();
        $(obj).parents("tr").remove();
    }

    function renameInputKeluarga(){
        var row = 0;
        $('#tabel-keluarga tbody tr').each(function(){   
            $(this).find('input,select,textarea').each(function(){ //element <input>
                var old_name = $(this).attr("name").replace(/]/g,"");
                var old_name_arr = old_name.split("[");
                if(old_name_arr.length == 3){
                    $(this).attr("id",old_name_arr[0]+"_"+row+"_"+old_name_arr[2]);
                    $(this).attr("name",old_name_arr[0]+"["+row+"]["+old_name_arr[2]+"]");
                }
            });
            $(this).find('.datepicker').each(function(){ //element <input>
                $(this).datepicker({
                    autoclose: true,
                    format:'dd-mm-yyyy',
                });   
            });
            row++;
        });        
    }


    function setNumber(){
      $('.numbers-only').keyup(function() {
        var d = $(this).attr('numeric');
        var value = $(this).val();
        var orignalValue = value;
        value = value.replace(/[0-9]*/g, "");
        var msg = "Only Integer Values allowed.";

        if (d == 'decimal') {
        value = value.replace(/\./, "");
        msg = "Only Numeric Values allowed.";
        }

        if (value != '') {
          orignalValue = orignalValue.replace(/([^0-9].*)/g, "")
          $(this).val(orignalValue);
        }
      });
    }

    $(document).ready(function(){
        setNumber();
    });
</script>
           <script type="text/javascript">
                    var $ang = $("#anggota_keluarga");
                    $("#status_dikeluarga").on("change",function(){
                        if($(this).val() === "Lajang"){
                            $ang.hide();
                        }else{
                            $ang.show();
                        }
                    });
                </script>