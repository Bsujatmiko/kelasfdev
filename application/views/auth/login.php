    <div class="container">
        <div class="container main" style="box-sizing: border-box;padding: 3%">
            <h2><?php echo validation_errors(); ?></h2>
         <?php echo form_open('member/login'); ?>
            <input type="text" name="username" placeholder="username.."><br>
            <input type="password" name="pass" placeholder="password.."><br>

            <input type="submit" name="login" value="masuk">
  
            <h5>belum punya akun ??</h5>
            <a href="<?php echo site_url().'member/signup'; ?>">sign up</a>
         <?php echo form_close(); ?>
         </div>
    </div>