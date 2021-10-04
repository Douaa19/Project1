<?php include_once APPROOT . '../views/inc/header.php'; ?>
<!-- <?php var_dump($_SESSION); ?> -->

<main>
    <div class="container row">
        <div class="vid col-2"></div>
        <div class="content col-10">
            <h2 class="h2">Offres</h2>
            <div class="offres">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="th_offre">Date</th>
                            <th scope="col" class="th_offre">Intitulé du poste</th>
                            <th scope="col" class="th_offre">Ville</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $offre) : ?>
                        <tr>
                            <td><?= $offre->date; ?></td>
                            <td class="form">
                                <form action="<?= URLROOT ?>/UsersController/detailsOffre" method="post">
                                    <input type="hidden" name="id_offre" value="<?= $offre->id_offre; ?>">
                                    <button type="submit"><?= $offre->title; ?></button>
                                </form>
                            </td>
                            <td><?= $offre->city; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include_once APPROOT . '../views/inc/footer.php'; ?>
</body>
</html>