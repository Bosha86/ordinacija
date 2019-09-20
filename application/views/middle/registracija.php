<!DOCTYPE html>
<?php echo '..' ?>


<div class="col-md-10 offset-2" id="reg">

    <form name="registracija" method="POST" action="<?php echo site_url('Registracija/regKor') ?>" >

        <div class="row">

            <div class="form-group col-md-3 offset-2">      

                <input type="text" name='ime' value="<?php echo set_value('ime') ?>" class="form-control" placeholder="Ime"><?php echo form_error('ime') ?><br>
                <input type="text" name='korisnicko' value="<?php echo set_value('korisnicko') ?>" class="form-control" placeholder="Korisnicko ime"><?php echo form_error('korisnicko') ?><br>
                <input type="text" name="lozinka" value="<?php echo set_value('lozinka') ?>" class="form-control" placeholder="Lozinka"><?php echo form_error('lozinka') ?><br>
                <input type="text" name="telefon" value="<?php echo set_value('telefon') ?>" class="form-control", placeholder="Broj telefona"><?php echo form_error('telefon') ?><br>
                <small class="float-left text-muted">* lozinka 8-12 karaktera, bar 2 mala, 3 velika slova, bar 1 broj, bez uzastopnih istih znakova.
                    Početno slovo je veliko.</small>
              

            </div>
            <div class="form-group col-md-3">
                <input type="text" name='prezime' value="<?php echo set_value('prezime') ?>" class="form-control" placeholder="Prezime"><?php echo form_error('prezime') ?><br>
                <input type="email" name='email' value="<?php echo set_value('email') ?>" class="form-control" placeholder="E-mail adresa"><?php echo form_error('email') ?><br>
                <input type="text" name='ponLozinka' value="<?php echo set_value('ponLozinka') ?>" class="form-control" placeholder="Ponovi lozinku"><?php echo form_error('ponLozinka') ?><br>
                <input type="date" name='rodjen'  value="<?php echo set_value('rodjen') ?>" class="form-control" placeholder="Datum rodjenja"><?php echo form_error('rodjen') ?><br>
                <input type="submit" name="regbtn "class="btn btn-primary float-right" value="Registruj se">    
                 <small class="float-left  text-muted"> *sva polja su obavezna</small>
            </div>

        </div>
    </form>
</div>

