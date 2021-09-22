<?php include_once APPROOT . '../views/inc/header.php'; ?>


<main>
    <h1>dashboard</h1>
    <ul>
        <?php foreach($data as $user) { ?>
        <li><?php echo $user->id_user ?></li>
        <li><?php echo $user->email ?></li>
        <li><?php echo $user->phone ?></li>
        <li><?php echo $user->name_file ?></li>
        <p>---------------------------------------</p>
        <?php } ?>
        
    </ul>
</main>