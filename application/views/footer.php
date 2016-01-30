  <!-- Start Footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row"> 
        <!-- Start Footer Widgets -->
        <div class="col-md-4 col-sm-4 widget footer-widget">
          <h4 class="footer-widget-title">About Indonesia Mendidik</h4>
          <img src="<?php echo site_url() ?>assets/uploads/identitas/<?php echo $this->webidentitas->get()->logo; ?>" alt="Logo">
          <div class="spacer-20"></div>
          <p>Gagasan Indonesia Mendidik lahir sebagai media atau labortorium pendidikan bagi anak-anak Bangsa sekaligus mendampingi pemerintah dalam mensukseskan pendidikan bagi kemajuan bangsa Indonesia dimasa yang akan datang. Dimana Indonesia Mendidik ikut berperan serta dalam mempersiapkan Generasi Emas Indonesia di Ulang Tahun Indonesia yang Ke 100 Tahun</p>
        </div>
        <div class="col-md-4 col-sm-4 widget footer-widget">
          <h4 class="footer-widget-title">Contact Info</h4>
          <dl>
            <dt>Adderss</dt>
            <dd>Jl. Sultan Iskandar Muda No. 8 Arteri Pondok Indah, Jakarta Selatan</dd>
            <dt>Phone</dt>
            <dd>+62 21 726 747</dd>
            <dt>Email</dt>
            <dd><a href="mailto:info@indonesiamendidik.org">info@indonesiamendidik.org</a></dd>
          </dl>
        </div>
        <div class="col-md-4 col-sm-4 widget footer-widget">
          <h4 class="footer-widget-title">STATISTICS VISITORS</h4>
            <?php
                $ip      = $_SERVER['REMOTE_ADDR'];
                $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
                $waktu   = time();
                $bataswaktu  = time() - 300;
                $bln=date("m");
                $thn=date("Y");

                $q1 = $this->db->get_where("statistikuser",array('ip' => $ip,'tanggal' => $tanggal));

                if($q1->num_rows()== 0)
                {
                    $this->db->insert("statistikuser", array('ip' => $ip,'tanggal' => $tanggal,'online' => $waktu));
                }
                else
                {
                    $this->db->where('ip', $ip);
                    $this->db->where('tanggal', $tanggal);
                    $this->db->update("statistikuser", array('hits' => $q1->row()->hits+1,'online' => $waktu));
                }

                $hari_ini = $this->db->group_by("ip")->get_where("statistikuser",array('tanggal'=> $tanggal))->num_rows();
                $kemarin = $this->db->query("SELECT * FROM statistikuser WHERE DATE(tanggal) >= (CURDATE() - INTERVAL 1 DAY)")->num_rows();
                $bulan_ini = $this->db->query("SELECT * FROM statistikuser WHERE MONTH(tanggal)=MONTH(NOW()) AND YEAR(tanggal)=YEAR(NOW())")->num_rows();
                $tahun_ini = $this->db->query("SELECT * FROM statistikuser WHERE YEAR(tanggal) = YEAR(NOW())")->num_rows();
                $total = $this->db->count_all("statistikuser");
                $online = $this->db->get_where("statistikuser",array('online >' => $bataswaktu))->num_rows();

                echo '<ul>
                       <li><img src="'.base_url('/assets/theme/frontend/images/useronline/pengunjunghariini.png').'" />&nbsp;&nbsp;Hari ini&nbsp;&nbsp;:&nbsp;&nbsp;'.$hari_ini.'</li>
                       <li><img src="'.base_url('/assets/theme/frontend/images/useronline/pengunjunghariini.png').'" />&nbsp;&nbsp;Kemarin&nbsp;&nbsp;:&nbsp;&nbsp;'.$kemarin.'</li>
                       <li><img src="'.base_url('/assets/theme/frontend/images/useronline/bulan_ini.png').'" />&nbsp;&nbsp;Bulan ini&nbsp;&nbsp;:&nbsp;&nbsp;'.$bulan_ini.'</li>
                       <li><img src="'.base_url('/assets/theme/frontend/images/useronline/tahun_ini.png').'" />&nbsp;&nbsp;Tahun ini&nbsp;&nbsp;:&nbsp;&nbsp;'.$tahun_ini.'</li>
                       <li><img src="'.base_url('/assets/theme/frontend/images/useronline/total_pengunjung.png').'" />&nbsp;&nbsp;Total&nbsp;&nbsp;:&nbsp;&nbsp;'.$total.'</li>
                       <li><img src="'.base_url('/assets/theme/frontend/images/useronline/pengunjungonline.png').'" />&nbsp;&nbsp;Pengunjung Online&nbsp;&nbsp;:&nbsp;&nbsp;<strong>'.$online.'</strong></li>
                    </ul>';
            ?> 
        </div>
      </div>
    </div>
  </footer>
  <footer class="site-footer-bottom">
    <div class="container">
      <div class="row">
        <div class="copyrights-col-left col-md-6 col-sm-6">
          <p><?php echo $this->webidentitas->get()->copyright; ?></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer --> 
</div>


</body>
</html>