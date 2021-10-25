<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($data); ?> -->

<main>
    <div class="container row p-0">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2">entreprises</h2>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col-3">raison sociale</th>
                        <th scope="col-3">effectif</th>
                        <th scope="col-3">ICE</th>
                        <th scope="col-3">CNSS</th>
                        <th scope="col-3">forme juridique</th>
                        <th scope="col-3">nom dirigeant</th>
                        <th scope="col-3">rib</th>
                        <th scope="col-3">contrats</th>
                        <th scope="col-3">contract salarie</th>
                        <th scope="col-3">facture</th>
                        <th scope="col-3">liste personnel</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($data as $company) : ?>
                    <tr>
                        <td><?= $company->raison_sociale; ?></td>
                        <td><?= $company->effectif; ?></td>
                        <td><?= $company->ice; ?></td>
                        <td><?= $company->cnss; ?></td>
                        <td><?= $company->forme_juridique; ?></td>
                        <td><?= $company->nom_dirigeant; ?></td>
                        <td><?= $company->rib; ?></td>
                        <td>
                            <form action="<?= URLROOT; ?>/AdminsController/download" method="post">
                                <input type="hidden" name="file" value="<?= $company->contract; ?>">
                                <button type="submit" id="download">contrats</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= URLROOT; ?>/AdminsController/download" method="post">
                                <input type="hidden" name="file" value="<?= $company->contract_salarie; ?>">
                                <button type="submit" id="download">contract salarie</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= URLROOT; ?>/AdminsController/download" method="post">
                                <input type="hidden" name="file" value="<?= $company->facture; ?>">
                                <button type="submit" id="download">facture</button>
                            </form>
                        </td>
                        <td>
                            <form action="<?= URLROOT; ?>/AdminsController/download" method="post">
                                <input type="hidden" name="file" value="<?= $company->liste_personnel; ?>">
                                <button type="submit" id="download">liste du personnel</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>
</body>
</html>