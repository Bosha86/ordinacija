<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="container-fluid reset-lozinke">
    <div class="lozinka-filter">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-10 offset-1 lozinka-wrap">
                <div class="modal-content-lozinka">

                    <div class="modal-header-lozinka">
                        <h4>Promena lozinke</h4>
                    </div>
                    <div class="modal-body-lozinka">
                        <form name="lozinkaForma" method="POST" action="<?php echo site_url('Registracija/promenaLozinke') ?>">
                            <?php if(isset($err)) echo $err; ?>
                            <input type="text" name="korisnicko" value="<?php echo set_value('ime') ?>" class="form-control" placeholder="Korisnicko ime"><?php echo form_error('korisnicko') ?>
                           <br/> <input type="password" name="staraLozinka" class="form-control" placeholder="Stara lozinka"><?php echo form_error('staraLozinka') ?>
                           <br/> <input type="password" name="novaLozinka" class="form-control" placeholder="Nova lozinka"><?php echo form_error('novaLozinka') ?>
                           <br/> <input type="password" name="novaLozinkaPon" class="form-control" placeholder="Ponovite novu lozinku"><?php echo form_error('novaLozinkaPon') ?>
                           <br/><small class="text-muted">* Lozinka mora da sadrzi 8-12 karaktera, bar 2 mala, 3 velika slova, bar 1 broj, bez uzastopnih istih znakova.
                            Početno slovo je veliko.</small><br/>
                           <br/> <input type="submit" class="btn btn-md btn-warning" value="Promeni lozinku">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>