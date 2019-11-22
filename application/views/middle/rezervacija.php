

<div class="col-md-10 offset-1 text-center" id="rezervacija">
    
    <h2 class="naslov">Odaberite uslugu</h2>
    <?php 
    foreach ($usluge as $usluga){
        $naziv = $usluga['naziv'];
        $slika = $usluga['slika'];
        $idUsl = $usluga['idUsl'];
    ?>
    <div class="slika-div">
    <img src="<?php echo base_url().'/usluge/'.$slika?>" class="usluga-slika">
    <a href='<?php echo site_url("Kalendar/show")?>'>
        <div class="slika-hover">
            <span class="usluga-naziv"><?php echo $naziv; ?></span>
        </div>
    </a>
    </div>
      
   
    <?php
    }
    ?>
    

    

    <?php if ($this->session->flashdata('zauzeto')) { ?>
    <div class="alert alert-warning"> <?= $this->session->flashdata('zauzeto') ?> </div>
<?php } ?>
</div>
</form>

    
    <script>
         function sledeciMesec() {
               
                xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                document.getElementById('kalendar').innerHTML = (this.responseText);
                 }
                };
                xmlhttp.open("GET", "<?php echo site_url('Rezervacije/draw_calendar') ?>?mesec=" +mesec, true);
                xmlhttp.send();
           
            } 
        </script>