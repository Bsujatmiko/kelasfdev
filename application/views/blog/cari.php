<div class="container">
        <form action="<?php echo site_url().'blog/cari'; ?>" method="get">
            <input type="search" name="cari" placeholder="catatan..">
        </form>
        <h3>hasil cari untuk : <?php echo $title; ?></h3>
        
        <?php foreach ($cari as $key): ?>
            <div class="main">
                <h1><?php echo $key['judul']; ?></h1>
                <p>
                    <?php 
                        $data =  $key['isi']; 
                        echo substr($data, 0,35).'...';
                    ?>
                </p>
                <i>post on : <?php echo date('d/F/y',  strtotime($key['waktu'])); ?></i><br>
                <a href="<?php echo site_url().'blog/'.$key['slug']; ?>">baca selengkapnya</a><br>
                <i>editor : </i><a href="<?php echo site_url().'member/profil/'.$key['editor']; ?>"><?php echo $key['editor']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>