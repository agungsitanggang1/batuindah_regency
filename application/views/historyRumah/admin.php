<?php if($this->session->flashdata('item')){
    $message = $this->session->flashdata('item');
?>
<div class="<?php echo $message['class']; ?>">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $message['message']; ?>
</div>              
<?php }?>

<a class="btn btn-primary" href="<?php echo base_url('historyrumah/tambah'); ?>">Tambah Data Riwayat Penghuni</a><br><br>
<div class="panel-heading">
    <div class="panel-title"><strong>
        <?php echo $judulHeader; ?></strong>
    </div>
</div>
<table class="table table-bordered <?php echo (count($data) > 0) ? "datatable" : ""; ?>" id="<?php echo (count($data) > 0) ? "table-1" : ""; ?>">
    <thead>
      <tr>
        <th>No. </th>
        <th>Blok ( No Rumah )</th>
        <th>Nama Penghuni Lama</th>
        <th>Jenis Kelamin</th>
        <th>Pekerjaan</th> 
        <th>Tanggal Masuk</th> 
        <th>Tanggal Keluar</th> 
        <th>No. Telepon</th>
        <th>Scan KTP</th>
        <th>Scan KK</th>
        <!-- <th>Status</th> -->
        <th>Aksi</th>
      </tr>
    </thead>
     <tbody>
        <?php if(count($data) > 0){ ?>
            <?php foreach($data as $key => $v): ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $v->nama_blok." ( ".$v->no_rumah." )"; ?></td>
                    <td><?php echo $v->nama_penghuni; ?></td>
                    <td><?php echo $v->jeniskelamin; ?></td>
                    <td><?php echo $v->pekerjaan; ?></td>
                    <td><?php echo $v->tgl_masuk; ?></td>
                    <td><?php echo $v->tgl_keluar; ?></td>
                    <td><?php echo $v->no_telepon; ?></td>
                    <td><div class="col-sm-5">
                        <?php if($v->foto_ktp == NULL){ ?>
                            <img src="<?php echo base_url().'data/images/no-photo.jpg'; ?>" width="50px" height="50px">
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'data/images/ktp/'.$v->foto_ktp; ?>" width="50px" height="50px">
                        <?php } ?>
                    </div></td>
                    <td><div class="col-sm-5">
                        <?php if($v->foto_kk == NULL){ ?>
                            <img src="<?php echo base_url().'data/images/no-photo.jpg'; ?>" width="50px" height="50px">
                        <?php }else{ ?>
                            <img src="<?php echo base_url().'data/images/ktp/'.$v->foto_kk; ?>" width="50px" height="50px">
                        <?php } ?>
                    </div></td>
                    <td class="td-actions">
                        <a href="<?php echo base_url('historyrumah/edit/'.$v->id_penghuni_lama); ?>" class="btn btn-success btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk ubah Penghuni"><i class="entypo-pencil"></i></a>

<!--                         <a href="<?php echo base_url('historyrumah/block_aktif/'.$v->id_penghuni_lama.'?aksi=block'); ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk memblokir Data Penghuni" onclick="return confirm('Apakah anda yakin akan memblokir Data Penghuni ini ?')"><i class="entypo-cancel"></i></a>
                         -->
                          <a href="<?php echo base_url('historyrumah/hapuss/'.$v->id_penghuni_lama); ?>" class="btn btn-danger btn-circle waves-effect waves-circle waves-float" rel="tooltip" title="Klik untuk hapus Agenda" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus Riwayat Ini ?');"><i class="entypo-trash"></i></a>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php }else{ ?>
            <tr><td colspan="4">Data tidak ditemukan.</td></tr>
            <?php } ?>
    </tbody>
</table>