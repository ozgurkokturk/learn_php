<?php require "header.php" ?>

<div class="kapsul">
    <div class="container">
        <div class="row">

            <?php foreach ($veriler as $veri): ?>
                <div class="col-2 bg-warning mt-2">
                    <?php echo date("d.m.Y", strtotime($veri[3])); ?>
                </div>

                <div class="col-10 bg-warning mt-2">
                    <a href="sayfa/<?php echo $veri[0];?>/<?php echo permalink($veri[1]);?>">
                        <?php echo $veri[1]; ?>
                    </a>
                </div>
            <?php  endforeach; ?>

        </div>
    </div>
</div>

<?php require "footer.php" ?>
