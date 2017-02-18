    <div class="container">
        <h3 style="color:crimson"><?php echo validation_errors(); ?><h3>
        
        <?php echo form_open('blog/tambah'); ?>
        
            <input type="text" name="judul" placeholder="masukkan judul berita ..."><br>
            <textarea name="isi" rows="8" cols="80" placeholder="isi berita..."></textarea><br>
            
            <input type="submit" name="tambah" value="tambahkan">
            
        <?php echo form_close(); ?>
    </div>
