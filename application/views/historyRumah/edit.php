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
        <?php echo form_open_multipart('historyrumah/update',array('class'=>'form-horizontal form-groups-bordered','blok'=>'form'));  ?>
            <!-- <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Pilih Rumah <a href="#data_rumah" role="button" class="btn btn-sm green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Rumah">  <i class="entypo-search"></i></a></label>
                <div class="col-sm-5"> -->
                    <input type="hidden" name="id_rumah" id="id_rumah" placholder="ID Rumah" value="<?php echo isset($data_rumah->id_rumah) ? $data_rumah->id_rumah : ''; ?>">
                    <input type="hidden" name="id_penghuni_lama" id="id_penghuni_lama" placholder="ID Rumah" value="<?php echo isset($editdata->id_penghuni_lama) ? $editdata->id_penghuni_lama : ''; ?>">
                    <!-- <input type="text" name="nama_blok" id="nama_blok" class="form-control" value="<?php echo isset($data_rumah->nama_blok) ? $data_rumah->nama_blok : ''; ?>" required>
                    <br>
                    <input type="text" name="no_rumah" id="no_rumah" class="form-control" value="<?php echo isset($data_rumah->no_rumah) ? $data_rumah->no_rumah : ''; ?>" required>

                    <p class="help-block" style="font-size:12px;">Ubah Data Rumah</p>
                </div> 
            </div> 
 -->
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Nama Penghuni</label>                    
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nama_penghuni" id="nama_penghuni" placeholder="Nama Penghuni" value="<?php echo isset($editdata->nama_penghuni) ? $editdata->nama_penghuni : ""; ?>" required/>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Tanggal Masuk</label>                    
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" placeholder="Tgl. Masuk" value="<?php echo isset($editdata->tgl_masuk) ? $editdata->tgl_masuk : ""; ?>" required       
                    />
                    
                </div>
            </div> 

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Tanggal Keluar</label>                    
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" placeholder="Tgl. Masuk" value="<?php echo isset($editdata->tgl_keluar) ? $editdata->tgl_keluar : ""; ?>" required/>
                </div>
            </div> 

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">No. KTP</label>                    
                <div class="col-sm-5">
                    <input type="text" class="form-control numbers-only" name="no_ktp" id="no_ktp" placeholder="No. KTP" value="<?php echo isset($editdata->no_ktp) ? $editdata->no_ktp : ""; ?>" required/>
                </div>
            </div>

            <input type="hidden" class="form-control" name="ktp_lama" id="ktp_lama" placeholder="Photo Lama" value="<?php echo isset($editdata->foto_ktp) ? $editdata->foto_ktp : null; ?>" />
            <input type="hidden" class="form-control" name="kk_lama" id="kk_lama" placeholder="Photo Lama" value="<?php echo isset($editdata->foto_kk) ? $editdata->foto_kk : null; ?>" />

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Scan KTP (Saat Ini)</label>                    
                <div class="col-sm-5">
                    <?php if($editdata->foto_ktp == NULL){ ?>
                    <img src="<?php echo base_url().'data/images/no-photo.jpg'; ?>" width="100px" height="100px">
                    <?php }else{ ?>
                    <img src="<?php echo base_url().'data/images/ktp/'.$editdata->foto_ktp; ?>" width="100px" height="100px">
                    <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Scan KTP</label>                    
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="ktp" id="ktp" placeholder="Photo">
                </div>
            </div>
            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Scan KK (Saat Ini)</label>                    
                <div class="col-sm-5">
                    <?php if($editdata->foto_kk == NULL){ ?>
                    <img src="<?php echo base_url().'data/images/no-photo.jpg'; ?>" width="100px" height="100px">
                    <?php }else{ ?>
                    <img src="<?php echo base_url().'data/images/ktp/'.$editdata->foto_kk; ?>" width="100px" height="100px">
                    <?php } ?>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Scan KK</label>                    
                <div class="col-sm-5">
                    <input type="file" class="form-control" name="kk" id="kk" placeholder="Photo">
                </div>
            </div>



            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">Pekerjaan</label>                    
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo isset($editdata->pekerjaan) ? $editdata->pekerjaan : ""; ?>" required/>
                </div>
            </div>

            <div class="form-group">
                <label for="field-1" class="col-sm-3 control-label">No. Telepon</label>                    
                <div class="col-sm-5">
                    <input type="text" class="form-control numbers-only" name="no_telepon" id="no_telepon" placeholder="No. Telepon" value="<?php echo isset($editdata->no_telepon) ? $editdata->no_telepon : ""; ?>" required/>
                </div>
            </div>

<!--                 <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Jml. Anggota Keluarga</label>                    
                    <div class="col-sm-3">
                        <input type="text" class="form-control numbers-only" name="jml_anggota_keluarga" id="jml_anggota_keluarga" placeholder="contoh: 1" onchange="showDaftarKeluarga(this);" value="<?php echo isset($editdata->jml_anggota_keluarga) ? $editdata->jml_anggota_keluarga : ""; ?>" required/>
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

  
                <br>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-danger">Ulang</button>
                                <a class="btn btn-info" href="<?php echo base_url('historyrumah'); ?>">Kembali</a>
                            </div>
                        </div>
                        <?php echo form_close(); ?>          
                    </div>
                </div>
            </div>

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
                                    <a role="button" class="green" data-toggle="modal" rel="tooltip" title="Klik untuk pilih Data Rumah Penghuni" onclick="setDataRumahPenghuni('<?php echo $v->id_rumah; ?>','<?php echo $v->no_rumah; ?>','<?php echo $v->nama_blok; ?>',);">  <i class="entypo-check"></i></a>
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
                        <tr><td colspan="9">Data tidak ditemukan.</td></tr>
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

    function setDataRumahPenghuni(id,no_rumah,nama_blok){
        $('#id_rumah').val(id);
        $('#no_rumah').val(no_rumah);
        $('#nama_blok').val(nama_blok);
        $('#data_rumah').modal('hide');
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
    var jeniskelamin = '<?php echo isset($editdata->jeniskelamin) ? $editdata->jeniskelamin : ""; ?>';
    var status_dikeluarga = '<?php echo isset($editdata->status_dikeluarga) ? $editdata->status_dikeluarga : ""; ?>';
    var status_penghuni = '<?php echo isset($editdata->status_penghuni) ? $editdata->status_penghuni : ""; ?>';
    console.log(status_dikeluarga);
    console.log(status_penghuni);

    if(jeniskelamin != ''){
        $('#jeniskelamin').val(jeniskelamin);
    }

    if(status_dikeluarga != ''){
        $('#status_dikeluarga').val(status_dikeluarga);
        if(status_dikeluarga == 'Lajang'){
            $ang.hide();
        }
    }

    if(status_penghuni != ''){
        $('#status_penghuni').val(status_penghuni);
    }
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