<?php include_once APPROOT . '../views/inc/header-pvf.php'; ?>
<!-- MAIN -->
    <main>
        <div class="folders mt-5 footer-margin-bot">
            <h1>Dossiers</h1>
            <?php if(!isset($data['error'])) { ?>
            <div class="result">
                <!-- DISPLAY DATA AS OBJECT IN FOREACH LOOP -->
                <?php foreach($data as $row) : ?>
                <div class="card">
                    <img src="<?= URLROOT ?>/uploads/<?php echo $row->image ?>" alt="">
                    <form action="<?php echo URLROOT ?>/PostController/photos" method="post">
                        <div class="route strok">
                            <input type="hidden" name="id" value="<?php echo $row->id_folder; ?>">
                            <button name="submit"><h3 class="text-uppercase">Photos</h3></button>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>
                <?php foreach($data as $row) : ?>
                <div class="card">
                    <img src="<?= URLROOT ?>/uploads/<?php echo $row->image ?>" alt="">
                    <form action="<?php echo URLROOT ?>/PostController/videos" method="post">
                        <div class="route strok">
                            <input type="hidden" name="id" value="<?php echo $row->id_folder; ?>">
                            <button name="submit"><h3 class="text-uppercase">Vidéos</h3></button>
                        </div>
                    </form>
                </div>
                <?php endforeach; ?>
                <!-- DISPLAY DATA AS OBJECT IN FOREACH LOOP -->
            </div>
            <!-- DESPLAY ERROR -->
            <?php }else { ?>
                <div class="error text-light text-center text-uppercase fw-bold bg-danger p-1">
                    <span><?php echo $data['error'];?></span>
                </div>
            <?php } ?>
            <!-- DESPLAY ERROR -->
        </div>
    </main>
<!-- MAIN -->