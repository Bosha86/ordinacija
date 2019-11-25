<!DOCTYPE html>
<?php

foreach ($zauzetiTermini as $termin){
    $zauzeto = $termin['vreme'];
}


//date("g:i a", strtotime("15:30:00"));

?>

<div class="termini" id="skrol">
    <div class="lekar">
    Odaberite lekara: 
    
    <select class="select-doktor" id="doktor" onchange="prikaziDan('<?php echo $datum?>')">
        <?php
        foreach ($doktori as $doktor){
            $id = $doktor['idDok'];
            $ime = $doktor['ime'];
            $prezime = $doktor['prezime'];
            if($id == $odabraniDoktor){
                echo "<option value='$id' selected>$ime"." "."$prezime</option>";
            }else{
                echo "<option value='$id'>$ime"." "."$prezime</option>";
            }   
        }
        ?>
    </select>
    <br/>
    Odaberite termin za datum <?php echo date("d.m.Y", strtotime($datum));?>:
    </div>
    <div class="lista-termini">
<!--    <ul>-->
    <?php
    foreach ($sati as $sat){
        $satZaIspis=date("H:i", strtotime($sat));
    if(isset($zauzeto)){
    if($sat == $zauzeto){
        echo "<input type='radio' name='vreme' id='$satZaIspis' value='$satZaIspis' disabled><label for='$satZaIspis' class='zauzeto vreme-dan' data-toggle='tooltip' title='Ovaj termin je zauzet'>$satZaIspis</label>";
//        echo "<div class='zauzeto vreme-dan' data-toggle='tooltip' title='Ovaj termin je zauzet'>".$satZaIspis."</span>";
    }
    else{
        echo "<input type='radio' name='vreme' id='$satZaIspis' value='$satZaIspis'><label for='$satZaIspis' class='slobodno vreme-dan'>$satZaIspis</label>";
    }
    }else{
        echo "<input type='radio' name='vreme' id='$satZaIspis' value='$satZaIspis'><label for='$satZaIspis' class='slobodno vreme-dan'>$satZaIspis</label>";
    }
}
    
    ?>
<!--    </ul>-->
    </div>
    <div class="zakazi-dugme-div">
        <button class="zakazi-dugme" onclick="zakaziTermin('<?php echo $datum?>')">Zakaži</button>
    </div>
</div>
