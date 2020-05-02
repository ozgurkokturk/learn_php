<?php

if (!isset($_SESSION["kadi"])){
    echo "Session Sorunu <br> Çıkartılıyorsun..";
    header("refresh:2;url=../index.php");
}else{ ?>

    <?php include "header.php"?>
    

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <table class="table table-striped table-hover" id="content-table">
                <thead class="thead-dark">
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Text</th>
                        <th>Tarih</th>
                        <th>Etiketler</th>
                        <th>Visibility</th>
                        <th>Kategori</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($infos as $info) { ?>

                <tr data-id="<?php echo $info->blogId ?>">
                    <td><?php echo $info->blogId ?></td>
                    <td><?php echo $info->blogTitle; ?></td>
                    <td id="content-text-td">
                        <p id="content-text-p">
                            <?php echo $info->blogText; ?>
                        </p>
                    </td>
                    <td><?php echo turkcetarih_formati('j F Y',$info->blogTarih); ?></td>
                    <td id="content-label-td">
                        <?php echo $info->blogLabels; ?>
                    </td>
                    <td><?php echo $info->blogVisibility; ?></td>
                    <td><?php echo $info->blogCategoryTitle ?></td>
                    <td>
                        <a class="updateContent" href="index.php?url=duzenle&id=<?php echo $info->blogId; ?>" style="color: goldenrod; padding-right: 10px; font-weight: 600;">Düzenle</a>
                        <a  data-id="<?php echo $info->blogId; ?>" class="deleteContent" href="index.php?url=sil&id=<?php echo $info->blogId; ?>" style="color: red; font-weight: 600;">Sil</a>
                    </td>
                </tr>

                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>

</div>



    <?php include "footer.php"?>



<?php } ?>
