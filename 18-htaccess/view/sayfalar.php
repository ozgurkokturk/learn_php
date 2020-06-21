<?php require "header.php" ?>

<div class="kapsul">
    <div class="container">
        <div class="row">

            <?php foreach ($veriler as $veri): ?>

                <div class="col-12 bg-warning text-center mt-2">
                    <?php echo $veri[1]; ?>
                </div>

                <div class="col-12 mt-2 text-center">
                    <?php echo $veri[2]; ?>
                </div>
            <?php  endforeach; ?>

        </div>
    </div>
</div>

<?php require "footer.php" ?>
