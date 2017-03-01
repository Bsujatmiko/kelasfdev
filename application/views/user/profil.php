    <div class="container">
        <h1><?php echo $user['nama']; ?></h1>
        <h4><?php echo $user['username'].' - '.$user['gender'].' / '.$user['birthday']; ?></h4>
        <h5>Nim : <?php echo $user['nim']; ?></h5>
        <p><?php echo $user['alamat']; ?></p><br>
        
        <h1>tulisan saya</h1>
        <?php foreach ($notes as $note): ?>
            <div class="main">
                <h1><?php echo $note['judul']; ?></h1>
                <p>
                    <?php 
                        $data =  $note['isi']; 
                        echo substr($data, 0,35).'...';
                    ?>
                </p>
                <i>post on : <?php echo date('F-d-y',  strtotime($note['waktu'])); ?></i><br>
                <a href="<?php echo site_url().'blog/'.$note['slug']; ?>">baca selengkapnya</a><br>
                <i>editor : </i><a href="<?php echo site_url().'member/profil/'.$note['editor']; ?>"><?php echo $note['editor']; ?></a>
            </div>
        <?php endforeach; ?>
    </div>