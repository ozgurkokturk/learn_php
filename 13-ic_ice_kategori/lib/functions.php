<?php
$a = 0;

/* Array yapısı oluşturmak için */
function buildTree($elements, $parentId = 0){

    $branch = array();

    foreach ($elements as $element){

//        Kaç kere döndüğünü hesaplamak için
//        echo "<br>************".$GLOBALS["a"]++."****************<br>";

        if ($element["parent_id"] == $parentId){

            /* foreach'i daha az döndürüyor normalde 701 kere dönerken 580'e düşüyor veri kaybı yok */
            //$children = buildTree($elements = array_splice($elements,intval($element),intval(count($elements))), $element["id"]);

            $children = buildTree($elements, $element["id"]); // Normal hali

            if ($children){
                $element["children"] = $children;
            }
            else{
                $element["children"] = array();
            }

            $branch[] = $element;
        }
    }

    return $branch;

}

/* buildTree ile oluşturulan array yapısını ul li olarak ekrana bastırmak için */
function drawElements($items){

    echo "<ul>";

    foreach ($items as $item){

        echo "
         <li>
        {$item['title']}
        </li>";

        if(sizeof($item['children']) > 0 ){
            drawElements($item['children']);
        }

    }

    echo "</ul>";
}
