<?php

if (!isset($_SESSION["kadi"])){
    echo "Session Sorunu <br> Çıkartılıyorsun..";
    header("refresh:2;url=../index.php");
}else{ ?>

    <?php include "header.php"?>



<div class="container">
    <div class="row">
        <div class="col-lg-12">

           <div id="headerInfo">
               <ul id="headerInfoUl">
                   <li class="headerInfoLi">Siteye Gelen Toplam Ziyaretçi Sayısı: <span>598</span></li>
                   <li class="headerInfoLi">Toplam İçerik Sayısı: <span id="toplamSatiSayisi"> <?php echo $toplamSatirSayisi; ?> </span></li>
                   <li class="headerInfoLi">En Çok Okunan İçerik: <span>Php'e Nasıl Başlanır? - (144) </span></li>
               </ul>
           </div>

            <div id="tableHeaderContainer">
                <div id="pageNoDiv" class="tableHeaderDivs bg-success">
                    <select name="" id="pageNoSelect" class="">
                        <?php $sayfaSayilari = array(5,10,20,50);
                            foreach ($sayfaSayilari as $sayi) {
                                if(!isset($_COOKIE["gosterLimit"])){
                                    echo '
                                        <option value="'.$sayi.'">'.$sayi.'</option>
                                    ';
                                }
                                else{
                                    if($sayi == $_COOKIE["gosterLimit"]){
                                        echo '
                                        <option value="'.$sayi.'" selected>'.$sayi.'</option>
                                    ';
                                    }
                                    else{
                                        echo '
                                        <option value="'.$sayi.'">'.$sayi.'</option>
                                    ';
                                    }
                                }
                            }
                        ?>
                    </select>
                </div>

                <div class="tableHeaderDivs" id="deleteAll">
                    <button class="btn btn-danger">Seçilenleri Sil</button>
                </div>

                <div class="tableHeaderDivs" id="searchContent">
                    <form action="">
                        <input type="text" placeholder="Ara" readonly="re">
                        <button type="submit">
                            <i class="fas fa-search" ></i>
                        </button>
                    </form>
                </div>

            </div>


                <table class="table table-striped table-hover" id="content-table">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="theCheckBox"></th>
                            <th>id</th>
                            <th>Title</th>
                            <th>Tarih</th>
                            <th>Etiketler</th>
                            <th>Visibility</th>
                            <th>Kategori</th>
                            <th>+ Görüntülenme Sayısı - </th>
                            <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($posts as $post) { ?>

                        <tr data-id="<?php echo $post->blogId ?>">
                            <td class="firstTd"> <input type="checkbox" class="myCheckboxes"> </td>
                            <td><?php echo $post->blogId; ?></td>
                            <td><b><?php echo $post->blogTitle; ?></b></td>
                            <td><?php echo turkcetarih_formati('j F Y',$post->blogTarih); ?></td>
                            <td><?php echo $post->blogLabels; ?></td>
                            <td><?php echo $post->blogVisibility; ?></td>
                            <td><?php echo $post->blogCategoryTitle ?></td>
                            <td>Boş</td>
                            <td class="islemler">
                                <a class="updateContent" href="index.php?url=duzenle&id=<?php echo $post->blogId; ?>" style="color: darkgoldenrod; padding-right: 10px; font-weight: 600;">Düzenle</a>
                                <a  data-id="<?php echo $post->blogId; ?>" class="deleteContent" href="index.php?url=sil&id=<?php echo $post->blogId; ?>" style="color: darkred; font-weight: 600;">Sil</a>
                            </td>
                        </tr>

                    <?php } ?>

                    <tr>
                        <td colspan="9">
                            <ul class="pagination flex-wrap justify-content-center" style="margin: 0;" >
                                <?php for($i=1; $i<=$paginationCount; $i++): ?>
                                    <li class="page-item"><a class="page-link" href="index.php?sayfa=<?php echo $i;?>"><?php echo $i;?></a></li>
                                <?php endfor; ?>
                            </ul>
                        </td>
                    </tr>

                    </tbody>
                </table>



        </div>
    </div>

</div>



    <?php include "footer.php"?>



<?php } ?>
