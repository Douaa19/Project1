<?php include_once APPROOT . '../views/inc/header-pvf.php'; ?>
<!-- MAIN -->
    <main>
        <div class="photos mt-5 footer-margin-bot">
            <h1>photos</h1>
                <?php if (!isset($data['error'])) { ?>
            <div class="galery">
                <?php foreach($data as $row) : ?>
                <div class="img">
                    <h3><?php echo $row->title ?></h3>
                    <img src="<?= URLROOT ?>/uploads/<?php echo $row->image ?>">
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