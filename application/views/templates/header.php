<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>f class official | <?php echo $title; ?></title>
      <link rel="shorcut icon" href="<?php echo site_url().'asset/icon/brand.jpg'; ?>">
      <link rel="stylesheet" href="<?php echo site_url().'asset/css/style.css';?>" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   </head>
   <body>
       <header style="margin-bottom: 4%">
           <h1> F Class Family </h1>
           <h5> Website Resmi Kelas F Teknik Informatika UIN SUSKA RIAU '15 </h5>
           
           <ul>
               
               <li><a href="<?php echo site_url(); ?>">Home</a></li>
               <li><a href="<?php echo site_url().'blog'; ?>">Blog</a></li>     
               <li><a href="<?php echo site_url().'member'; ?>">member</a></li>
               
              <?php if (isset($_SESSION['username'])){ ?>
               <li><a href="<?php echo site_url().'member/logout'; ?>">logout</a></li>
               <li><a href="<?php echo site_url().'member/profil/'.$_SESSION['username']; ?>">profil</a></li>
              <?php }else{ ?>
               <li><a href="<?php echo site_url().'member/login'; ?>">login</a></li>
              <?php } ?>
           </ul>
       </header>
      