 <?php 
	$iden = $this->model_utama->view_where('identitas',array('id_identitas' => 1))->row_array();
	$alamat = $this->model_utama->view_where('mod_alamat',array('id_alamat' => 1))->row_array();
	$link = $this->model_utama->view('pasangiklan');
 ?>
    <div class="container">
        <div class="row">
        <div class="col-md-4">
                <div class="header-logo"> 
                    <?php 
                        $logo = $this->model_utama->view_ordering_limit('logo','id_logo','DESC',0,1);
                        foreach ($logo->result_array() as $row) {
                        echo "<img src='".base_url()."asset/logo/$row[gambar]'/>";
                        }
                    ?>	
                </div>
                <span class="phone"><?php echo $iden['no_telp']; ?></span>
                <?php
				echo $alamat["alamat"];
				?>
                <ul class="social-icons mt-xl">
                <?php
                    $sosmed = $this->model_utama->view('identitas')->row_array();
                    $bagi = explode(",", $sosmed['facebook']);
                    ?>
                        <li>
                            <a class="sc-1" href="<?php echo $bagi[0]; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a class="sc-2" href="<?php echo $bagi[1]; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a class="sc-11" href="<?php echo $bagi[2]; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a class="sc-3" href="<?php echo $bagi[3]; ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                        </li>
                </ul>

            </div>
            
            <div class="col-md-4">
               <h5 class="mb-sm">LOKASI KANTOR</h5>
            	<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$iden[maps]"; ?>"></iframe>

            </div>
			<div class="col-md-4">
                <h5 class="mb-sm" style="padding-left:15px;">ALBUM FOTO</h5>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				<?php
				$bannerhome = $this->model_utama->view_ordering_limit('album','id_album','ASC',0,10);            
				$no = 0;
				foreach ($bannerhome->result_array() as $ban1){ 
					if($no == 0){
					?>
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<?php
					}else{
					?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $no; ?>" class=""></li>
					<?php
					}
					$no++;
				}
				?>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				<?php
				$no = 0;
				foreach ($bannerhome->result_array() as $ban2){ 
					if($no == 0){
					?>
						 <div class="item active"><img src="asset/img_album/<?php echo $ban2['gbr_album']; ?>"></div>
					<?php
					}else{
					?>
						<div class="item "><img src="asset/img_album/<?php echo $ban2['gbr_album']; ?>"></div>
					<?php
					}
					$no++;
				}
				?>
					   
				</div>
				<!-- Left and right controls --> <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a>
			</div>
				
                
        </div>
		</div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-11">
                    <p>© <?php echo Date('Y'); ?> Dinas Pendidikan & Kebudayaan Provinsi Kalimantan Selatan</p>
                </div>
            </div>
        </div>
    </div>
