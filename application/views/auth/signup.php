    <div class="container">
        <div class="container main" style="box-sizing: border-box;padding: 3%">
         <h2><?php echo validation_errors(); ?></h2>
         <?php echo form_open('member/signup'); ?>
            <input type="text" name="nama" placeholder="nama lengkap.."><br>
            <input type="text" name="nim" placeholder="nim..."><br>
            <input type="text" name="username" placeholder="username gunakan @.."><br>
            <input type="password" name="pass" placeholder="password.."><br>
            <input type="text" name="gender" placeholder="Pria/Wanita"><br>
            <input type="text" name="alamat" placeholder="alamat.."><br>
            <label for="birthday">tanggal lahir</label>
            <input type="text" name="birthday" placeholder="tahun-bulan-tanggal"><br>

            <input type="submit" name="register" value="daftar">
  
            <h5>sudah memilki akun ??</h5>
            <a href="<?php echo site_url().'member/login'; ?>">login</a>
         <?php echo form_close(); ?>
         </div>
    </div>