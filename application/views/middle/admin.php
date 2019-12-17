<!DOCTYPE html>

<div class="container-fluid">
    <a href="<?php echo site_url('Kalendar/show/1/1') ?>">Kalendar</a>
    
    <?php if(isset($kalendar)) echo $kalendar ?>
    
    
    <div id="termini-div-admin">
        
    </div>
    
</div>

<script>
    function prikaziDan(datum){
  
        if(datum == ""){
            alert("Molimo vas, odaberite validan datum.");
        }
         xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                document.getElementById('termini-div-admin').innerHTML = (this.responseText);
                 }
                };
                xmlhttp.open("GET", "<?php echo site_url('Admin/prikaziTermine') ?>?datum="+datum, true);
                xmlhttp.send();

    }
    </script>