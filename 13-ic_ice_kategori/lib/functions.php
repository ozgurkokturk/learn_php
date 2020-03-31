<?php
$a = 0;

function buildTree($elements, $parentId = 0){

    $branch = array();

    foreach ($elements as $element){

        echo "<br>************".$GLOBALS["a"]++."****************<br>";

        if ($element["parent_id"] == $parentId){

//            $children = buildTree($elements = array_splice($elements,intval($element),intval(count($elements))), $element["id"]);
            $children = buildTree($elements, $element["id"]);


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
