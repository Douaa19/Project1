<?php include_once APPROOT . '../views/inc/header.php'; ?>


<main>
    <div class="container row p-0">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h1>dashboard</h1>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col-3">nom</th>
                        <th scope="col-3">prénom</th>
                        <th scope="col-3">email</th>
                        <th scope="col-3">cv</th>
                        <th scope="col-3">Offres d'emploi</th>
                        <th scope="col-3">CNSS</th>
                        <th scope="col-3">Fiches de paie</th>
                        <th scope="col-3">Attestations</th>
                        <th scope="col-3">Dossiers de maladie</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $user) : ?>
                    <tr>
                        <td><?= $user->lName; ?></td>
                        <td><?= $user->fName; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><a href="<?= URLROOT?>/uploads/<?= $user->name_file; ?>"><?= $user->name_file; ?></a></td>
                        <td><?= "offres_d'emploi"; ?></td>
                        <td><?= "cnss"; ?></td>
                        <td><?= "fiches_de_paie"; ?></td>
                        <td><?= "attestations"; ?></td>
                        <td><?= "dossiers_de_maladie"; ?></td>
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