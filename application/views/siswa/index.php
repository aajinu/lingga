

   <section id="content">
  <div class="container">
    <div class="row">
	  </div>
<!--slider-->
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="middle_content">
        <?php foreach ($profil as $p): ?>
			<br><h3><center><b>Profil Sekolah</b></center></h3>
<br>
<?= $p->profil ?>
<br>
<h3><center><b>Visi</b></center></h3><br>
<center><?= $p->visi ?></center>
<br>
<h3><center><b>Misi</b></center></h3><br>
<?= $p->misi ?>
<?php endforeach ?>
      </div>
    </div>
   </div>
</div>
</section><br><br><br><br>

    
    