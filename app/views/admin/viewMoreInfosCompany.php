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
                    
                    <tr>
                        <td><?= $data->raison_sociale; ?></td>
                        <td><?= $data->effectif; ?></td>
                        <td><?= $data->ice; ?></td>
                        <td><?= $data->cnss; ?></td>
                        <td><?= $data->forme_juridique; ?></td>
                        <td><?= $data->nom_dirigeant; ?></td>
                        <td><?= $data->rib; ?></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $data->contract; ?>" class="text-uppercase text-decoration-none">contract</a></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $data->contract_salarie; ?>" class="text-uppercase text-decoration-none">contract salarie</a></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $data->facture; ?>" class="text-uppercase text-decoration-none">facture</a></td>
                        <td><a href="<?= URLROOT ?>/uploads/<?= $data->liste_personnel; ?>" class="text-uppercase text-decoration-none">liste personnel</a></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>
</body>
</html>