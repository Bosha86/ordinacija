<!DOCTYPE html>

<div class="container-fluid">
    <div class="row">
        
        
         <div id="myModal" class="modal">
                <div class="modal-content" id="modal-content">

                    <div class="modal-header">
                        <h4>Informacije o terminu</h4>
                        <span class="close">&times;</span>
                    </div>
                    
                    <div class="modal-body" id="modal-body">
                                               
                    </div>


                    <div class="modal-footer">
                        <div id="modal-buttons"> 
                            <button id="odustajanjeDugme" class="btn btn-success" onclick="uradjeno()">Uradjeno</button>
                            <button id="zakazivanjeDugme" class="btn btn-danger" onclick="otkazi()">Otkazi</button>
                        </div>
                    </div>

                </div>
            </div>
        
        
    <div class="col-2">
        <div class="admin-meni">
            <a href="<?php echo site_url('Kalendar/show/1/1') ?>"><div class="admin-meni-dugme">Termini</div></a>
            <br/>
            <a href="<?php echo site_url('Admin/korisnici')?>"><div class="admin-meni-dugme">Korisnici</div></a>
            <br/>
            <a href=""><div class="admin-meni-dugme">Novi korisnik</div></a>
            <br/>
            <a href=""><div class="admin-meni-dugme">Statistika</div></a>
            <br/>
            <a href=""><div class="admin-meni-dugme">Komentari</div></a>
        </div>
    </div> 
    
    <?php if(isset($kalendar)){?>
        <div class="col-5">
            <?php echo $kalendar ?>
        </div>
        <div class="col-5 termini-okvir">
            <div id="datum-termini"></div>
            <div id="termini-div-admin"></div> 
        </div>

    <?php }else if(isset($korisnici)){ ?>
    <div class="col-7">
        <div class="text-center pretraga-div">
            <form method="GET" action="<?php echo site_url('Admin/pretraga') ?>">
            <input type="text" placeholder="Korisnicko" name="korisnicko" class="form-control pretraga">
            <input type="text" placeholder="Ime" name="ime" class="form-control pretraga">
            <input type="text" placeholder="Prezime" name="prezime" class="form-control pretraga">
            <input type="email" placeholder="E-mail" name="email" class="form-control pretraga">
            <input type="number" placeholder="Telefon" name="telefon" class="form-control pretraga">
            <input type="date" placeholder="Rodjendan" name="rojendan" class="form-control pretraga">
            <input type="submit" value="Pretrazi" class="btn btn-primary form-control" style="width: 93% !important;">
            </form>
        </div>
        <br/>    
                <table class="table table-striped">
            <thead>
              <tr>
                
                <th scope="col">Id korisnika</th>
                <th scope="col">Korisnickoime</th>
                <th scope="col">Ime</th>
                <th scope="col">Prezime</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefon</th>
                <th scope="col">Datum rodjenja</th>
                <th>Izmena</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($korisnici as $korisnik){
                    $idKor = $korisnik['idKor'];
                    $korisnicko = $korisnik['korisnicko'];
                    ?>
              <tr>
                  <th scope="row"><a href='<?php echo site_url("User/index?id=$idKor")?>'><?php echo $korisnik['idKor']?></a></th>
                  <td><a href='<?php echo site_url("User/index?id=$idKor")?>'><?php echo $korisnik['korisnicko']?></a></td>
                <td><?php echo $korisnik['ime']?></td>
                <td><?php echo $korisnik['prezime']?></td>
                <td><?php echo $korisnik['email']?></td>
                <td><?php echo $korisnik['telefon']?></td>
                <td><?php echo $korisnik['rodjen']?></td>
                <td><a href='<?php echo site_url("Admin/izmenaPodataka/$idKor")?>'>Izmeni</a></td>
              </tr>
                <?php } ?>
            </tbody>
          </table>
            <?php }else{
                echo $msgPret;
            }
?>
        
        

   
   
        </div>  
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
                        document.getElementById('datum-termini').classList.add('datum-termin-sredjeno');
                        document.getElementById('datum-termini').innerHTML = "Termini za datum: "+datum;   
                        document.getElementById('termini-div-admin').innerHTML = (this.responseText);
                 }
                };
                xmlhttp.open("GET", "<?php echo site_url('Admin/termini') ?>?datum="+datum, true);
                xmlhttp.send();

    }
    
    function prikaziInfo(idTer){
        
        document.getElementById("myModal").style.display = "block";
        
         xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("modal-body").innerHTML = this.responseText;
                 }
                };
                xmlhttp.open("GET", "<?php echo site_url('Admin/dohvatiInfoZaTermin') ?>?idTer="+idTer, true);
                xmlhttp.send();
        
        

    }
    
    function uradjeno(){
        
        var idTer = document.getElementById("idTermina").value;
        
         xmlhttp=new XMLHttpRequest();
             xmlhttp.onreadystatechange=function(){
                   if(this.readyState==4&&this.status==200){ 
                       document.getElementById("modal-body").innerHTML = this.responseText; 
                       document.getElementById("modal-buttons").innerHTML = "";
//                       
                   }
               };
            xmlhttp.open("POST", "<?php echo site_url('Admin/uradjeno'); ?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("idTer="+idTer); 
    }
    
    function otkazi(){
         var idTer = document.getElementById("idTermina").value;
        
         xmlhttp=new XMLHttpRequest();
             xmlhttp.onreadystatechange=function(){
                   if(this.readyState==4&&this.status==200){ 
                       document.getElementById("modal-body").innerHTML = this.responseText; 
                       document.getElementById("modal-buttons").innerHTML = "";
//                       
                   }
               };
            xmlhttp.open("POST", "<?php echo site_url('Admin/otkazi'); ?>", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("idTer="+idTer); 
        
        
    }
    
    var span = document.getElementsByClassName("close")[0];

    var modal = document.getElementById("myModal");    

    span.onclick = function() {
      modal.style.display = "none";
    };

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
    </script>