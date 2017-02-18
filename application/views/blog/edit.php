    <div class="container">
        <h3 style="color:crimson"><?php echo validation_errors(); ?><h3>
        
        <?php echo form_open('berita/edit/'.$berita['id']); ?>
        
            <input type="text" name="judul" value="<?php echo $berita['judul']; ?>"><br>
            <textarea name="isi" rows="8" cols="80" ><?php echo $berita['isi']; ?></textarea><br>
            
            <input type="submit" name="tambah" value="edit">
            
        <?php echo form_close(); ?>
    </div>
