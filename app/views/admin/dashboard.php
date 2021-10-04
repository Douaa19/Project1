<?php include_once APPROOT . '../views/inc/header.php'; ?>


<main>
    <div class="container row p-0">
        <div class="vid col-2 p-0"></div>
        <div class="content col-10 p-0">
            <h2 class="h2">dashboard</h2>
            <table class="table">
                <thead class="thead">
                    <tr>
                        <th scope="col-3">nom</th>
                        <th scope="col-3">prénom</th>
                        <th scope="col-3">email</th>
                        <th scope="col-3">cv</th>
                        <th scope="col-3">plus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $user) : ?>
                    <tr>
                        <td><?= $user->lName; ?></td>
                        <td><?= $user->fName; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><a id="cv" href="<?= URLROOT?>/uploads/<?= $user->name_file; ?>"><?= $user->name_file; ?></a></td>
                        <td>
                            <div id="more">
                                <form action="<?= URLROOT ?>/AminsController/addMore" method="post">
                                    <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
                                    <button type="submit" class="addMore">Ajouter plus</button>
                                </form>
                                <form action="<?= URLROOT ?>/AminsController/viewMore" method="post">
                                    <input type="hidden" name="id_user" value="<?= $user->id_user; ?>">
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