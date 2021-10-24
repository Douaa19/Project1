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
                        <th scope="col-3">contract</th>
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
                        <td><a href="<?= URLROOT ?>/uploads/<?= $company->contract; ?>" class="text-uppercase text-decoration-none">contract</a></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $company->contract_salarie; ?>" class="text-uppercase text-decoration-none">contract salarie</a></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $company->facture; ?>" class="text-uppercase text-decoration-none">facture</a></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $company->liste_personnel; ?>" class="text-uppercase text-decoration-none">liste personnel</a></td>
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