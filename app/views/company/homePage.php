<?php include_once APPROOT . '../views/inc/header.php'; ?>

<main>
    <div class="container row p-0">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2 text-uppercase">dashboard</h2>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col-3">Contrats</th>
                        <th scope="col-3">Contrat salariés</th>
                        <th scope="col-3">Factures</th>
                        <th scope="col-3">Liste du personnel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $company) : ?>
                        <tr>
                            <td>
                                <form action="<?php echo URLROOT; ?>/CompanyController/download" method="post">
                                    <input type="hidden" name="file" value="<?= $company->contract; ?>">
                                    <button type="submit" id="download">contract</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo URLROOT; ?>/CompanyController/download" method="post">
                                    <input type="hidden" name="file" value="<?= $company->contract_salarie; ?>">
                                    <button type="submit" id="download">contract salarie</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo URLROOT; ?>/CompanyController/download" method="post">
                                    <input type="hidden" name="file" value="<?= $company->facture; ?>">
                                    <button type="submit" id="download">facture</button>
                                </form>
                            </td>
                            <td>
                                <form action="<?php echo URLROOT; ?>/CompanyController/download" method="post">
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