    <div class="container">
        <h1><?php echo $berita['judul']; ?></h1>
        <p>
            <?php echo $berita['isi']; ?>
        </p><br>
        <p>di post pada : <?php echo date('d/F/y',  strtotime($berita['waktu'])); ?></p>
        <a href="<?php echo site_url().'blog/edit/'.$berita['id']; ?>">edit tulisan</a>
        <a href="<?php echo site_url().'blog/hapus/'.$berita['id']; ?>">hapus tulisan</a><br>
        <i>editor : </i><a href="<?php echo site_url().'member/profil/'.$berita['editor']; ?>"><?php echo $berita['editor']; ?></a>

        
    </div>