<?php include_once APPROOT . '../views/inc/headerSignUp.php'; ?>
<?php 
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
?>
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
                                <input type="text" name="raison_sociale" id="raison_sociale">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="activite" <?php if(!empty($data['error_activite'])) : ?> class="text-danger" <?php endif; ?>>Activité</label>
                            </td>
                            <td class="input">
                                <input type="text" name="activite" id="activite">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="effectif" <?php if(!empty($data['error_effectif'])) : ?> class="text-danger" <?php endif; ?>>Effectif</label>
                            </td>
                            <td class="input">
                                <input type="text" name="effectif" id="effectif">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="adresse_sociale" <?php if(!empty($data['error_adresse_sociale'])) : ?> class="text-danger" <?php endif; ?>>Adresse sociale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="adresse_sociale" id="adresse_sociale">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="zip_code" <?php if(!empty($data['error_zip_code'])) : ?> class="text-danger" <?php endif; ?>>Code postale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="zip_code" id="zip_code">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="city" <?php if(!empty($data['error_city'])) : ?> class="text-danger" <?php endif; ?>>Ville</label>
                            </td>
                            <td class="input">
                                <input type="text" name="city" id="city">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="phone" <?php if(!empty($data['error_phone'])) : ?> class="text-danger" <?php endif; ?>>Numéro de téléphone</label>
                            </td>
                            <td class="input">
                                <input type="tel" name="phone" id="phone">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="email" <?php if(!empty($data['error_email'])) : ?> class="text-danger" <?php endif; ?>>Adresse email</label>
                            </td>
                            <td class="input">
                                <input type="email" name="email" id="email">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="rc" <?php if(!empty($data['error_rc'])) : ?> class="text-danger" <?php endif; ?>>RC</label>
                            </td>
                            <td class="input">
                                <input type="text" name="rc" id="rc">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="ice" <?php if(!empty($data['error_ice'])) : ?> class="text-danger" <?php endif; ?>>ICE</label>
                            </td>
                            <td class="input">
                                <input type="text" name="ice" id="ice">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="cnss" <?php if(!empty($data['error_cnss'])) : ?> class="text-danger" <?php endif; ?>>CNSS</label>
                            </td>
                            <td class="input">
                                <input type="text" name="cnss" id="cnss">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="forme_juridique" <?php if(!empty($data['error_forme_juridique'])) : ?> class="text-danger" <?php endif; ?>>Forme juridique</label>
                            </td>
                            <td class="input">
                                <input type="text" name="forme_juridique" id="forme_juridique">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="nom_dirigeant" <?php if(!empty($data['error_nom_dirigeant'])) : ?> class="text-danger" <?php endif; ?>>Nom du dirigeant</label>
                            </td>
                            <td class="input">
                                <input type="text" name="nom_dirigeant" id="nom_dirigeant">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="rib" <?php if(!empty($data['error_rib'])) : ?> class="text-danger" <?php endif; ?>>RIB</label>
                            </td>
                            <td class="input">
                                <input type="text" name="rib" id="rib">
                            </td>
                        </tr>
                        <tr class="light">
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