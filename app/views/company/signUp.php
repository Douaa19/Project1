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
                                <label for="activite">Activité</label>
                            </td>
                            <td class="input">
                                <input type="text" name="activite" id="activite">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="effectif">Effectif</label>
                            </td>
                            <td class="input">
                                <input type="text" name="effectif" id="effectif">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="adresse_sociale">Adresse sociale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="adresse_sociale" id="adresse_sociale">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="zip_code">Code postale</label>
                            </td>
                            <td class="input">
                                <input type="text" name="zip_code" id="zip_code">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="city">Ville</label>
                            </td>
                            <td class="input">
                                <input type="text" name="city" id="city">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="phone">Numéro de téléphone</label>
                            </td>
                            <td class="input">
                                <input type="text" name="phone" id="phone">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="rc">RC</label>
                            </td>
                            <td class="input">
                                <input type="text" name="rc" id="rc">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="ice">ICE</label>
                            </td>
                            <td class="input">
                                <input type="text" name="ice" id="ice">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="cnss">CNSS</label>
                            </td>
                            <td class="input">
                                <input type="text" name="cnss" id="cnss">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="forme_juridique">Forme juridique</label>
                            </td>
                            <td class="input">
                                <input type="text" name="forme_juridique" id="forme_juridique">
                            </td>
                        </tr>
                        <tr class="dark">
                            <td class="row">
                                <label for="nom_dirigeant">Nom du dirigeant</label>
                            </td>
                            <td class="input">
                                <input type="text" name="nom_dirigeant" id="nom_dirigeant">
                            </td>
                        </tr>
                        <tr class="light">
                            <td class="row">
                                <label for="rib">RIB</label>
                            </td>
                            <td class="input">
                                <input type="text" name="rib" id="rib">
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