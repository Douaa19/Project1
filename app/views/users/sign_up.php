<?php include_once APPROOT . '../views/inc/header.php'; ?>


<main>
    <div class="container">
        <form action="<?php echo URLROOT; ?>/UsersController/stepOneInsertUser" method="post" class="" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                  <tr>
                    
                      <span class="text-danger error_message text-center text-uppercase"><?php if(isset($data['error_message'])) { echo $data['error_message'];} ?></span>
                    
                  </tr>
                  <tr>
                    <td class="row">
                    <label for="sexe" <?php if(!empty($data['error_sexe'])) : ?> class="text-danger" <?php endif; ?>>civilité: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <select name="sexe" id="sexe">
                          
                          <?php if(!empty($data['sexe'])) { ?><option value="<?php echo $data['sexe']; ?>"><?php echo $data['sexe']; ?></option> <?php } ?>
                          <option value="null">- Sélectionner -</option>
                          <option value="m">M</option>
                          <option value="mme">Mme</option>
                          <option value="mlle">Mlle</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="lName" <?php if(!empty($data['error_lName'])) : ?> class="text-danger" <?php endif; ?>>nom: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <input type="text" name="lName" id="lName" <?php if(!empty($data['lName'])) : ?> value="<?php echo $data['lName']; endif ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="fName" <?php if(!empty($data['error_fName'])) : ?> class="text-danger" <?php endif; ?>>prénom: <span class="text-danger">*</span></label>
                    </td>
                    <td colspan="fName">
                        <input type="text" name="fName" id="fName" <?php if(!empty($data['fName'])) : ?> value="<?php echo $data['fName']; endif ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="activity" <?php if(!empty($data['error_activity'])) : ?> class="text-danger" <?php endif; ?>>secteur d'activité:</label>
                    </td>
                    <td>
                        <select name="activity" id="activity">
                          <?php if(!empty($data['activity'])) { ?><option value="<?php echo $data['activity']; ?>"><?php echo $data['activity']; ?></option> <?php } ?>                          
                          <option value="null">- Sélectionner -</option>

                          <!-- Foreach Loop For Areas -->
                          <?php foreach ($data as $area) : ?>
                            <option value="<?php echo $area->name_area; ?>"><?php echo $area->name_area; ?></option>
                          <?php endforeach ?>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="">
                        <label for="date_naissance" <?php if(!empty($data['error_date_birth'])) : ?> class="text-danger" <?php endif; ?>>date de naissance: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <?php if(empty($data['date_birth'])) { ?> <input type="date" id="date_naissance" class="control text" name="date_birth"> <?php } else { ?> <input type="text" name="date_birth" id="date_naissance" class="control text" value="<?php echo $data['date_birth']; ?>"> <?php } ?>
                    </td>
                  </tr>
                  <tr>
                    <td class="">
                        <label for="email" <?php if(!empty($data['error_email'])) : ?> class="text-danger" <?php endif; ?>>email: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <input type="text" class="control text" name="email" id="email" <?php if(!empty($data['email'])) : ?> value="<?php echo $data['email']; endif ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="phone" <?php if(!empty($data['error_phone'])) : ?> class="text-danger" <?php endif; ?>>téléphonne portable: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <input type="text" class="control text" name="phone" id="phone" <?php if(!empty($data['phone'])) : ?> value="<?php echo $data['phone']; endif ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="cp" <?php if(!empty($data['error_zip_code'])) : ?> class="text-danger" <?php endif; ?>>code postal:</label>
                    </td>
                    <td>
                        <input type="text" class="control text" name="zip_code" id="cp" <?php if(!empty($data['zip_code'])) : ?> value="<?php echo $data['zip_code']; endif ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="address" <?php if(!empty($data['error_address'])) : ?> class="text-danger" <?php endif; ?>>adresse: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <textarea name="address" id="address" cols="80" rows="5" class="control show-character-counter" maxlength="140" ><?php if(!empty($data['address'])) { echo $data['address']; } ?></textarea>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="pays" <?php if(!empty($data['error_country'])) : ?> class="text-danger" <?php endif; ?>>pays:</label>
                    </td>
                    <td>
                        <select name="country" id="pays">
                          <?php if(!empty($data['country'])) { ?><option value="<?php echo $data['country']; ?>"><?php echo $data['country']; ?></option> <?php } ?>
                          <option value="null">- Sélectionner -</option>
                          <option value="maroc">Maroc</option>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="ville" <?php if(!empty($data['error_city'])) : ?> class="text-danger" <?php endif; ?>>ville:</label>
                    </td>
                    <td>
                        <select name="city" id="ville">
                          <?php if(!empty($data['city'])) { ?><option value="<?php echo $data['city']; ?>"><?php echo $data['city']; ?></option> <?php } ?>
                          <option value="null">- Sélectionner -</option>

                          <!-- Foreach Loop For Cities -->
                          <?php foreach ($data1 as $city) : ?>
                            <option value="<?php echo $city->name_city; ?>"><?php echo $city->name_city; ?></option>
                          <?php endforeach ?>
                        </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="row">
                        <label for="cv" <?php if(!empty($data['error_name_file'])) : ?> class="text-danger" <?php endif; ?>>Télecharger votre CV: <span class="text-danger">*</span></label>
                    </td>
                    <td>
                        <input type="file" name="name_file" id="cv" accept=".doc,.docx,.pdf,application/msword,application/vnd.ms-office,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/zip,application/msword,application/x-zip,application/pdf,application/force-download,application/x-download,binary/octet-stream">
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                      <span class="text-danger">( Importer votre cv en format (*. doc), (*.docx)ou (*. pdf) - Les fichiers doivent peser moins de 2 Mo. »),</span>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>
                        <div class="submit">
                            <button type="submit" name="submit" class="btn btn-primary">envoyer</button>
                        </div>
                    </td>
                  </tr>
                  <tr>
                  <td></td>
                    <td>
                      <span>Vous avez un compte <a href="<?php echo URLROOT; ?>/UsersController/index">Connecter vous!</a></span>
                    </td>
                  </tr>
                </tbody>
            </table>
        </form>
    </div>
</main>