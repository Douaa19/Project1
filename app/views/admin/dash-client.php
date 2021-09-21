<?php include_once APPROOT . '../views/inc/header-dash.php'; ?>

<main class="row m-0">
    <div class="container col-10">
        <h1 class="mt-5 text-uppercase">Dashboard clients</h1>
        <table class="table table-dark table-hover footer-margin-bot">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Télephone</th>
                <th scope="col">Genre</th>
                <th scope="col">Occasion</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $key => $value) : ?>
              <tr>
                <th scope="row"><?php echo $value->id ?></th>
                <td><?php echo $value->email?></td>
                <td><?php echo $value->phone ?></td>
                <td><?php echo $value->gender ?></td>
                <td><?php echo $value->occasion ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>
<!-- MAIN -->