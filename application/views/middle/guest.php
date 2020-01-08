<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!--AKO POSTOJI PORUKA U SESIJI (PORUKA SE UPISUJE NAKON STO SE USPESNO REGISTRUJEMO)
OVDE SE ISPISUJE-->
<?php if($this->session->flashdata('regPoruka')!==null){ ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0">
        <strong><?php echo $this->session->flashdata('regPoruka');?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<?php } ?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 pocetna-slider">
            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100 slide-slika" src="<?php echo base_url().'/images/doktor.jpg'?>" alt="First slide">
                    <div class="carousel-caption">
                            <div class="row">
                                <div class="col-sm-8 offset-sm-2 tekst"> 
                                    <h1>Stomatološka ordinacija "Unident PRO"</h1>    
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-2 podtekst">
                                 <p>Već 20 godina brinemo o Vašem osmehu</p>
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-5 offset-sm-2">
                                <a href="<?php echo site_url('Stranice/oNama')?>" class="dugme-vise">Detaljnije</a>
                            </div>
                        </div>
                        </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 slide-slika" src="<?php echo base_url().'/images/doktor2.jpg'?>" alt="Second slide">
                    <div class="carousel-caption">
                        <div class="row">
                                <div class="col-sm-8 offset-sm-2 tekst"> 
                                    <h1>Naš tim čine najbolji stručnjaci u zemlji</h1>    
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-2 podtekst">
                                 <p>Iz naše ordinacije se ne izlazi bez osmeha</p>
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-5 offset-sm-2">
                                <a href="<?php echo site_url('Stranice/tim')?>" class="dugme-vise">Detaljnije</a>
                            </div>
                        </div>
                        </div>
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100 slide-slika" src="<?php echo base_url().'/images/doktor6.jpg'?>" alt="Third slide">
                    <div class="carousel-caption">
                        <div class="row">
                                <div class="col-sm-8 offset-sm-2 tekst"> 
                                    <h1>Nudimo sve vrste usluga na jednom mestu</h1>    
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-5 offset-sm-2 podtekst">

                                 <p>Smejemo se zajedno sa vama od 1999. godine</p>
                            </div>
                        </div>
                        <div clas="row">
                            <div class="col-sm-5 offset-sm-2">
                                <a href="<?php echo site_url('Stranice/usluge')?>" class="dugme-vise">Detaljnije</a>
                            </div>
                        </div>
                        </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
        </div> 
      </div>
    </div>
    
    <div class="row">
        <div class="col-8 offset-2 podnaslov text-center">
            <p style="color:gray">DUGOGODIŠNJE ISKUSTVO - NAJSAVREMENIJA TEHNOLOGIJA - STRUČNJACI OD POVERENJA</p>
            <h1 style="color:#894186; font-weight: bold;">Ostanite nasmejani i zdravi</h1>
            <p style="color:gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Consectetur, mollitia amet nihil! Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
    </div>
    
    <div class="container marketing">
    <div class="row">
      <div class="col-lg-4 text-center">
          <img src="<?php echo base_url().'/usluge/beljenje.jpg'?>" class="rounded-circle img-round" width="140" height="140">
        <h2 style="color:#894186">Beljenje</h2>
        <p style="color:#894186">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
        <p><a class="btn btn-outline-info btn-pocetna" href="<?php echo site_url('Stranice/usluge')?>#beljenje" role="button">Detaljnije &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
        <img src="<?php echo base_url().'/usluge/vadjenje.jpg'?>" class="rounded-circle img-round" width="140" height="140">
        <h2 style="color:#894186">Vađenje</h2>
        <p style="color:#894186">Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
        <p><a class="btn btn-outline-info btn-pocetna" href="<?php echo site_url('Stranice/usluge')?>#vadjenje" role="button">Detaljnije &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
       <img src="<?php echo base_url().'/usluge/anestezija.jpg'?>" class="rounded-circle img-round" width="140" height="140">
        <h2 style="color:#894186">Lečenje</h2>
        <p style="color:#894186">Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-outline-info btn-pocetna" href="<?php echo site_url('Stranice/usluge')?>#lecenje" role="button">Detaljnije &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    </div>
    
    <div class="container-fluid" style="padding: 0;" id="oNama">
    <div class="row">
        <div class="col-12" style="padding: 0;">
           
            <div class="parallax">
                 <div class="parallax-unutra">
                     <div class="parallax-sadrzaj">
                         <br/><br/>
                            <div class="row">
                                <div class="col-10 offset-1 text-center">
                                <h1 style="color:white; font-weight: bold">Zbog čega izabrati baš "Unident PRO"</h1>
                                </div>
                            </div>
<!--                         <br/><br/>-->
                         <div class="row parallax-pasus">
                             <div class="col-2 offset-lg-2">
                                 <img src="<?php echo base_url().'/images/dental-care.png'?>" class="parallax-img img-fluid">     
                             </div>
                             <div class="col-6">
                                 <h2 style="color: white">Dve decenije poverenja</h2>
                                 <p style="color: white">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                             </div>
                         </div>
                         <div class="row parallax-pasus">
                             <div class="col-2 offset-lg-2">
                                 <img src="<?php echo base_url().'/images/dental.png'?>" class="parallax-img img-fluid">     
                             </div>
                             <div class="col-6">
                                 <h2 style="color: white">Lider u protetici</h2>
                                 <p style="color: white">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                             </div>
                         </div>
                         <div class="row parallax-pasus">
                             <div class="col-2 offset-lg-2">
                                 <img src="<?php echo base_url().'/images/smile.png'?>" class="parallax-img img-fluid">     
                             </div>
                             <div class="col-6">
                                 <h2 style="color: white">Vaš osmeh je naš posao</h2>
                                 <p style="color: white">Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod.</p>
                             </div>
                         </div>
                           <br/>
                        <div class="row parallax-btn">
                            <div class="col-4 offset-4 text-center">
                                <a href="<?php echo site_url('Stranice/oNama')?>" class="btn btn-pocetna">Vise o nama</a>
                            </div>
                         </div> 
                           <br/>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="container-fluid doktori-pocetna">  
     <div class="row">
         <div class="col-10 offset-1 text-center">
             <h1 style="margin-bottom: 30px; color:#894186">Upoznajte naš tim</h1>
         </div>
     </div>
    <div class="card-group">
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor.jpg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Stranice/tim')?>#markovic"><h3 class="card-title">Dr Marko Markovic</h3></a>
          <h6 class="card-text"> Specijalista ortopedije vilica</h6>
          
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor4.jpeg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Stranice/tim')?>#brankovic"><h3 class="card-title">Aleksandra Brankovic</h3></a>
          <h6 class="card-text">Viši zubni tehnicar</h6>
          
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor2.jpg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Stranice/tim')?>#rasic"><h3 class="card-title">Dr Biljana Rasic</h3></a>
          <h6 class="card-text">Specijalista oralne horurgije</h6>
          
        </div>
      </div>
        <div class="card">
        <img class="card-img-top" src="<?php echo base_url().'/doktori/doktor5.jpg'?>" alt="Card image cap">
        <div class="card-body">
            <a href="<?php echo site_url('Stranice/tim')?>#glisic"> <h3 class="card-title">Dr Bojan Glisic</h3></a>
          <h6 class="card-text">Decija stomatologija</h6>
          
        </div>
      </div>
    </div>
 </div>
       
    <div class="container-fluid onlajn-zakazivanje">
        <div class="row">
            <div class="col-12" style="padding: 0">
            <div class="parallax1">
                <div class="row">
                <div class="parallax1-unutra col-lg-6 offset-lg-6 col-md-8 offset-md-4 col-sm-10 offset-sm-2">
                    <div class="parallax1-sadrzaj">
                        <div class="row">
                            <div class="col-10 offset-1">
                                <h2 class="hidden"> Brzo i jednostavno online zakazivanje </h2>
                            </div>
                                
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 col-lg-6 grafika-korak hidden">
                                <span class="broj-korak">
                                    <img src="<?php echo base_url().'/images/registracija.png'?>" class="parallax1-img">
                                </span>
                                
                                <span class="tekst-korak">
                                    <h4>Napravite nalog</h4>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 offset-lg-3 col-lg-6 grafika-korak-desno hidden">
                                <span class="broj-korak-desno">
                                    <img src="<?php echo base_url().'/images/stolica.png'?>" class="parallax1-img">
                                </span>
                                <span class="tekst-korak-desno">
                                <h4>Odaberite uslugu</h4>
                                </span>
                            </div>                         
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 col-lg-6 grafika-korak hidden">
                                <span class="broj-korak">
                                    <img src="<?php echo base_url().'/images/kalendar.png'?>" class="parallax1-img">
                                </span>
                                <span class="tekst-korak">
                                <h4>Odaberite termin</h4>
                                </span>
                            </div>                         
                            
                        </div>
                        <div class="row">
                            <div class="col-10 offset-1 offset-lg-3 col-lg-6 grafika-korak-desno hidden">
                                <span class="broj-korak-desno">
                                    <img src="<?php echo base_url().'/images/ok.png'?>" class="parallax1-img">
                                </span>
                                <span class="tekst-korak-desno">
                                <h4>Rezervisano!</h4>
                                </span>
                            </div>                         
                        </div>
                        <div class="row hidden"> 
                            <div class="col-10 offset-1 text-center">
                                <a href="<?php echo site_url('Registracija')?>" class="btn btn-pocetna" style="margin-top: 15px;">Registrujte se</a>
                                <br/>
                                <a href="#" onclick="prikaziLogin()"><small class="malo">Vec imate nalog?</small></a>
                            </div>
                        </div>
                        
                    </div> 
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
<!--    OVDE SAMO ISPISUJEMO CEO DIV SA KONTAKT INFORMACIJAMA
    PREKO PROMENLJIVE KOJU SMO POSLALI IZ KONTROLERA, A VIEW FAJL SMO NAPRAVILI ODVOJENO (KONTAKT_DEO, TAKO SE ZOVE)-->
    <?php echo $kontakt; ?>

</div>

<script>
//    OVO JE SVE SKRIPTA ZA PRIKAZIVANJE ELEMENATA KAD SKROLUJEMO DO NJIH
    (function() {
  var elements;
  var windowHeight;
//  DOHVATAMO SVE ELEMENTE SA KLASOM HIDDEN
  function init() {
    elements = document.querySelectorAll('.hidden');
    windowHeight = window.innerHeight;
  }

  function checkPosition() {
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      var positionFromTop = elements[i].getBoundingClientRect().top;

      if (positionFromTop - windowHeight <= 0) {
        element.classList.add('fade-in-element-naslov');
        element.classList.remove('hidden');
      }
    }
  }

  window.addEventListener('scroll', checkPosition);
  window.addEventListener('resize', init);

  init();
  checkPosition();
})();
    
    </script>



  

   


