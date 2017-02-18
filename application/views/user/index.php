    <div class="container">
         <?php foreach ($users as $user): ?>
            <div class="col3">
                <h3><?php echo $user['username']; ?></h3>
                <p><?php echo $user['alamat']; ?></p>
                <a href="<?php echo site_url().'member/profil/'.$user['username']; ?>">lihat profil</a>
            </div>
         <?php endforeach; ?>
    </div>