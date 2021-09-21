<?php include_once APPROOT . '../views/inc/header-pvf.php'; ?>
<!-- MAIN -->
    <main>
        <div class="photos mt-5 footer-margin-bot">
            <h1>vidéos</h1>
                <?php if (!isset($data['error'])) { ?>
            <div class="videos row m-0">
                <?php foreach($data as $row) : ?>
                <div class="video col-6">
                    <video controls="controls" src="<?= URLROOT ?>/uploads/<?php echo $row->video ?>" class="d-block w-100" type="video/mp4"></video>
                    <h3><?php echo $row->title ?></h3>
                    <span><?php echo $row->description; ?></span><br/>
                    <span><?php echo $row->tag; ?></span>
                </div>
                <?php endforeach; ?>
                <?php }else { ?>
                <div class="error text-light text-center text-uppercase fw-bold bg-danger p-1">
                    <span><?php echo $data['error'];?></span>
                </div>
                <?php } ?>
            </div>
        </div>
    </main>
<!-- MAIN -->
</body>
</html>