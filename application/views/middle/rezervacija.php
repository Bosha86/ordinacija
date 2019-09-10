<?php
echo '.. ';
$usluge = $this->RezervacijaModel->dohvatiUsluge();

?>

<div class="col-md-10 offset-2" id="rezervacija">
<form name="rezervisi" method="POST" action="<?php echo site_url('Rezervacija/rezervacija')?>">
    
     <div class="row">
<h4>Zakažite termin</h4>
            <div class="form-group col-md-3 offset-2"> 
  <input type="date" name="datum" class="form-control"><br>
   <select name="vreme" class="form-control">
       <option disabled selected value="">Izaberi vreme</option>
       <?php 
      
        for($i = 9; $i <= 19; $i++){
            echo "<option value='$i'>$i</option>";
        }
       ?>
  
      
  </select><br>
            </div>
    
     <div class="form-group col-md-3">
    <select name="idDok" class="form-control">
         <option disabled selected value="">Izaberi doktora</option>
         <option value="1">Vuki Vukotic</option>
         <option value="2">Ivana Ivanovic</option>
    </select><br>
    <select name="idUsl" class="form-control">
        <option disabled selected value="">Izaberi uslugu</option>
        <?php 
            foreach($usluge as $u){
                $idUsl = $u['idUsl'];
                $naziv = $u['naziv'];
                echo "<option value='$idUsl'>$naziv</option>";
            }
        ?>
    </select><br>
    <input type="submit" name="rez" value="Rezervisi termin" class="btn btn-primary float-right" >
           </div>

        </div>
    <?php if ($this->session->flashdata('zauzeto')) { ?>
    <div class="alert alert-warning"> <?= $this->session->flashdata('zauzeto') ?> </div>
<?php } ?>
</div>
</form>