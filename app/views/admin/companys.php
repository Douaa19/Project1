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
                        <th scope="col-3">Activté</th>
                        <th scope="col-3">Adresse sociale</th>
                        <th scope="col-3">Code Postale</th>
                        <th scope="col-3">Ville</th>
                        <th scope="col-3">Numéro de Téléphone</th>
                        <th scope="col-3">Email</th>
                        <th scope="col-3">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $company) : ?>
                    <tr>
                        <td><?= $company->activite; ?></td>
                        <td><?= $company->adresse_sociale; ?></td>
                        <td><?= $company->zip_code; ?></td>
                        <td><?= $company->city; ?></td>
                        <td><?= $company->phone; ?></td>
                        <td><?= $company->email; ?></td>
                        <td>
                            <div id="more">
                                <form action="<?= URLROOT ?>/AminsController/addMoreInfosCompany" method="post">
                                    <input type="hidden" name="id_company" value="<?= $company->id; ?>">
                                    <button type="submit" class="addMore">Ajouter plus</button>
                                </form>
                                <form action="<?= URLROOT ?>/AminsController/viewMoreInfosCompany" method="post">
                                    <input type="hidden" name="id_company" value="<?= $company->id; ?>">
                                    <button type="submit" class="viewMore">Voir plus</button>
                                </form>
                            </div>
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