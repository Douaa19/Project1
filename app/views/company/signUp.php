<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>
<!-- <?php 
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
?> -->
<main>
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2">Espace entreprise</h2>
            <form action="<?php echo URLROOT ?>/CompanyController/createAccount" method="post">
                <table class="table">
                    <tbody>
                        <tr id="error">
                            <span class="text-danger error_message text-center text-uppercase"><?php if(isset($data['error_message'])) { echo $data['error_message'];} ?></span>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="raison_sociale" <?php if(!empty($data['error_raison_sociale'])) : ?> class="text-danger" <?php endif; ?>>Raison sociale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="raison_sociale" id="raison_sociale" <?php if(!empty($data['raison_sociale'])) : ?> value="<?php echo $data['raison_sociale']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="activite" <?php if(!empty($data['error_activite'])) : ?> class="text-danger" <?php endif; ?>>Activité</label>
                            </td>
                            <td class="input">
                                <input type="text" name="activite" id="activite" <?php if(!empty($data['activite'])) : ?> value="<?php echo $data['activite']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="effectif" <?php if(!empty($data['error_effectif'])) : ?> class="text-danger" <?php endif; ?>>Effectif</label>
                            </td>
                            <td class="input">
                                <input type="text" name="effectif" id="effectif" <?php if(!empty($data['effectif'])) : ?> value="<?php echo $data['effectif']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="adresse_sociale" <?php if(!empty($data['error_adresse_sociale'])) : ?> class="text-danger" <?php endif; ?>>Adresse sociale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="adresse_sociale" id="adresse_sociale" <?php if(!empty($data['adresse_sociale'])) : ?> value="<?php echo $data['adresse_sociale']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="zip_code" <?php if(!empty($data['error_zip_code'])) : ?> class="text-danger" <?php endif; ?>>Code postale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="zip_code" id="zip_code" <?php if(!empty($data['zip_code'])) : ?> value="<?php echo $data['zip_code']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="city" <?php if(!empty($data['error_city'])) : ?> class="text-danger" <?php endif; ?>>Ville</label>
                            </td>
                            <td class="input">
                                <input type="text" name="city" id="city" <?php if(!empty($data['city'])) : ?> value="<?php echo $data['city']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="phone" <?php if(!empty($data['error_phone'])) : ?> class="text-danger" <?php endif; ?>>Numéro de téléphone</label>
                            </td>
                            <td class="input">
                                <input type="tel" name="phone" id="phone" <?php if(!empty($data['phone'])) : ?> value="<?php echo $data['phone']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="email" <?php if(!empty($data['error_email'])) : ?> class="text-danger" <?php endif; ?>>Adresse email</label>
                            </td>
                            <td class="input">
                                <input type="email" name="email" id="email" <?php if(!empty($data['email'])) : ?> value="<?php echo $data['email']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="rc" <?php if(!empty($data['error_rc'])) : ?> class="text-danger" <?php endif; ?>>RC</label>
                            </td>
                            <td class="input">
                                <input type="text" name="rc" id="rc" <?php if(!empty($data['rc'])) : ?> value="<?php echo $data['rc']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="ice" <?php if(!empty($data['error_ice'])) : ?> class="text-danger" <?php endif; ?>>ICE</label>
                            </td>
                            <td class="input">
                                <input type="text" name="ice" id="ice" <?php if(!empty($data['ice'])) : ?> value="<?php echo $data['ice']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="cnss" <?php if(!empty($data['error_cnss'])) : ?> class="text-danger" <?php endif; ?>>CNSS</label>
                            </td>
                            <td class="input">
                                <input type="text" name="cnss" id="cnss" <?php if(!empty($data['cnss'])) : ?> value="<?php echo $data['cnss']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="forme_juridique" <?php if(!empty($data['error_forme_juridique'])) : ?> class="text-danger" <?php endif; ?>>Forme juridique</label>
                            </td>
                            <td class="input">
                                <input type="text" name="forme_juridique" id="forme_juridique" <?php if(!empty($data['forme_juridique'])) : ?> value="<?php echo $data['forme_juridique']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="nom_dirigeant" <?php if(!empty($data['error_nom_dirigeant'])) : ?> class="text-danger" <?php endif; ?>>Nom du dirigeant</label>
                            </td>
                            <td class="input">
                                <input type="text" name="nom_dirigeant" id="nom_dirigeant" <?php if(!empty($data['nom_dirigeant'])) : ?> value="<?php echo $data['raison_sociale']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="rib" <?php if(!empty($data['error_rib'])) : ?> class="text-danger" <?php endif; ?>>RIB</label>
                            </td>
                            <td class="input">
                                <input type="text" name="rib" id="rib" <?php if(!empty($data['rib'])) : ?> value="<?php echo $data['rib']; endif ?>">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="password" <?php if(!empty($data['error_password'])) : ?> class="text-danger" <?php endif; ?>>Mots de passe</label>
                            </td>
                            <td class="input">
                                <input type="password" name="password" id="password" <?php if(!empty($data['password'])) : ?> value="<?php echo $data['password']; endif ?>">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td></td>
                            <td class="button">
                                <div class="submit">
                                    <button type="submit" name="submit" class="btn" id="btn">Envoyer</button>
                                    <span>Vous avez un compte <a href="<?php echo URLROOT; ?>/CompanyController/index">Connecter vous!</a></span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</main>