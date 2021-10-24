<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main id="main">
    <div class="container row p-0" id="container">
        <div class="vid col-2 p-0"></div>
            <div class="content col-10 p-0">
            <h2 class="h2">Ajouter des fichiers</h2>
            <form action="<?php echo URLROOT; ?>/AdminsController/insertMoreInfosCompany" method="post" enctype="multipart/form-data">
            <?php if(isset($data['error_message'])) { ?><h6 class="text-danger"><?= $data['error_message']; ?></h6><?php } ?>
                <div class="inputs">
                    <div id ="group" class="contract">
                        <?php if(!empty($data['error_contract'])) { ?><h6 class="text-danger"><?= $data['error_contract']; ?></h6><?php } ?>
                        <label for="contract">Contrats: </label>
                        <input type="file" name="contract" id="contract">
                    </div>
                    <div id ="group" class="contract_salarie">
                        <?php if(!empty($data['error_contract_salarie'])) { ?><h6 class="text-danger"><?= $data['error_contract_salarie']; ?></h6><?php } ?>
                        <label for="contract_salarie">Contrat salariés: </label>
                        <input type="file" name="contract_salarie" id="contract_salarie">
                    </div>
                    <div id ="group" class="facture">
                        <?php if(!empty($data['error_facture'])) { ?><h6 class="text-danger"><?= $data['error_facture']; ?></h6><?php } ?>
                        <label for="facture">Factures: </label>
                        <input type="file" name="facture" id="facture">
                    </div>
                    <div id ="group" class="liste_personnel">
                        <?php if(!empty($data['error_liste_personnel'])) { ?><h6 class="text-danger"><?= $data['error_liste_personnel']; ?></h6><?php } ?>
                        <label for="liste_personnel">Liste du personnel: </label>
                        <input type="file" name="liste_personnel" id="liste_personnel">
                    </div>
                    <input type="hidden" name="id_company" value="<?= $data; ?>">
                    <div class="button">
                        <button type="submit">Ajouter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>

</body>
</html>