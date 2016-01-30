<script type="text/javascript">

     jQuery(document).ready(function() {

        $('#form-update').submit(function() { // catch the form's submit event
            $.ajax({ // create an AJAX call...
                data: $(this).serialize(), // get the form data
                type: $(this).attr('method'), // GET or POST
                url: $(this).attr('action'), // the file to call
                success: function(response) { // on success..
                    //$('#output').html(response); // update the DIV
                    jQuery("#listview").load('<?php echo base_url('adminpanel/gallery/listfilejpg/'.$this->uri->segment(4));?>');
                    jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil diupdate<button type="button" class="close" data-dismiss="alert">&times;</button></div>'); 
                }
            });
            return false; // cancel original event to prevent form submitting
        });

        $('.delete').click(function() { // catch the form's submit event
            $.ajax({ // create an AJAX call...
                data: $(this).serialize(), // get the form data
                type: $(this).attr('method'), // GET or POST
                url: $(this).attr("href"), // the file to call
                success: function(response) { // on success..
                    //$('#output').html(response); // update the DIV
                    jQuery("#listview").load('<?php echo base_url('adminpanel/gallery/listfilejpg/'.$this->uri->segment(4));?>');
                    jQuery("#msg").html('<div class="alert alert-success"><strong>Success</strong> Data Berhasil dihapus<button type="button" class="close" data-dismiss="alert">&times;</button></div>'); 
                }
            });
            return false; // cancel original event to prevent form submitting
        });
                
    }); 
</script> 
<div class="col-md-12">
    
    <div class="block">
        <div class="head">
            <h2>List Pictures</h2>
        </div>
        
        <form action="<?php echo base_url(); ?>adminpanel/gallery/actionupdatetitle" method="POST" id="form-update">
        <div class="content messages npr">
            <div class="scroll" style="height: 250px;">
                <?php
                $i=1;
                $query = $this->db->get_where('gallery_pictures',array('id_gallery' =>$this->uri->segment(4)));
                foreach ($query->result() as $row) : ?>

                <div class="item">
                    <div class="img">
                    <a title="<?php echo $row->title; ?>" href="<?php echo base_url('assets/uploads/gallery/'.$row->images); ?>"><img src="<?php echo base_url('assets/uploads/gallery/'.$row->images); ?>" height="120" width="120" class="img-thumbnail"/></a>
                    </div>
                    <div class="info">
                        <a href="#" class="name"><?php echo $row->title; ?></a> <span class="muted"><?php //echo Tanggal::formatindo($row->deo_tg); ?></span>  <a href="<?php echo base_url('adminpanel/gallery/deletefile/'.$row->id); ?>" class="delete">Hapus</a>
                        <div class="text">
                            <input type="hidden" name="id[<?php echo $i;?>]" value="<?php echo $row->id; ?>">
                            <input type="text" name="title[<?php echo $i;?>]" value="<?php echo $row->title; ?>" size="50">                                                                                                     
                        </div>
                    </div>
                </div>
                <?php $i++; endforeach ?>

            </div>
        </div>
        <div class="footer">
            <div class="side fl">
                <button type="submit" name="submit" id="submit-button" value="submit" class="btn btn-primary"> Simpan</button>
            </div>
        </div>
        </form>
    </div>
                                    
</div>
