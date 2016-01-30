<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="user">
    <div class="info">
        <div class="name">
            <a href="<?php echo base_url('beranda');?>"><?php echo $_SESSION['nama_lengkap']; ?></a>
        </div>
        <div class="buttons">
            STATUS ADMin
        </div>
    </div>
</div>

<ul class="navigation">
    <li><a href="<?php echo site_url() ;?>adminpanel/beranda"><span class="i-arrow-right-3 text-danger"></span> Beranda</a></li>
    <?php
        $id_users = $this->session->userdata('id_users');
        $query = $this->db->query('Select * from usrmgr_access a join modul b on a.id_modul=b.id_modul WHERE id_users='.$id_users.' ORDER BY a.priority');
        foreach ($query->result() as $row) :
    ?>
    <li><a href="<?php echo base_url('adminpanel/'.$row->class_name) ;?>"><span class="i-arrow-right-3 text-danger"></span> <?php echo $row->nama_modul;?></a></li>
    <?php endforeach;?>
</ul>