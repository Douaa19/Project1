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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data as $user) : ?>
                    <tr>
                        <td><?= $user->lName; ?></td>
                        <td><?= $user->fName; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><a href="<?= URLROOT?>/uploads/<?= $user->name_file; ?>"><?= $user->name_file; ?></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>