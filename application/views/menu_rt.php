<li <?php if($menu == 'dashboard'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('dashboard'); ?>">
        <i class="entypo-gauge"></i>
        <span>Beranda</span>
    </a>
</li>

<li <?php if($hirarki_menu == 'master_data'){ ?> class="active opened active" <?php } ?>>
    <a>
        <i class="entypo-book"></i>
        <span>Master Data</span>
    </a>
    <ul>
        <li <?php if($menu == 'blok'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('blok'); ?>"><span>Blok</span></a>
        </li>

        <li <?php if($menu == 'rumah'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('rumah'); ?>"><span>Rumah</span></a>
        </li>
        <li <?php if($menu == 'Riwayat Penghuni'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('historyrumah'); ?>"><span>Riwayat Penghuni</span></a>
        </li>

        <li <?php if($menu == 'penghuni'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('penghuni'); ?>"><span>Penghuni</span></a>
        </li>

    </ul>
</li>

<li <?php if($hirarki_menu == 'master_user'){ ?> class="active opened active" <?php } ?>>
    <a>
        <i class="entypo-book"></i>
        <span>Master Data User</span>
    </a>
    <ul>
        <li <?php if($menu == 'role'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('role'); ?>"><span>Role</span></a>
        </li>

        <li <?php if($menu == 'user_pemakai'){ ?> class="active" <?php } ?>>
            <a href="<?php echo base_url('userPemakai'); ?>"><span>User Pemakai</span></a>
        </li>
    </ul>
</li>

<li <?php if($hirarki_menu == 'agenda'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('agenda'); ?>">
        <i class="entypo-calendar"></i>
        <span>Agenda</span>
    </a>
</li>

<li <?php if($menu == 'pengajuan_surat'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Surat/daftarPengajuan'); ?>">
        <i class="entypo-pencil"></i>
        <span>Kelola pengajuan Surat</span>
    </a>
</li>
<li <?php if($menu == 'laporan_penduduk'){ ?> class="active opened active" <?php } ?>>
    <a href="<?php echo base_url('Laporan'); ?>">
        <i class="entypo-chart-area"></i>
        <span>Laporan</span>
    </a>
</li>