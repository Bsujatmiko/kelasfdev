    <div class="container">
        <h3>Blog kelas F Tif '15</h3>
        <form action="<?php echo site_url().'blog/cari'; ?>" method="get">
            <input type="search" name="cari" placeholder="catatan..">
        </form>
        
        <?php if (isset($_SESSION['username'])): ?>
        <a href="<?php echo site_url().'blog/tambah'; ?>">tulis catatan di blog</a>
        <?php endif; ?>
        
        <?php foreach ($berita as $brt): ?>
            <div class="main">
                <h1><?php echo $brt['judul']; ?></h1>
                <p>
                    <?php 
                        $data =  $brt['isi']; 
                        echo substr($data, 0,35).'...';
                    ?>
                </p>
                <i>post on : <?php echo date('F-d-y',  strtotime($brt['waktu'])); ?></i><br>
                <a href="<?php echo site_url().'blog/'.$brt['slug']; ?>">baca selengkapnya</a><br>
                <i>editor : </i><a href="<?php echo site_url().'member/profil/'.$brt['editor']; ?>"><?php echo $brt['editor']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>