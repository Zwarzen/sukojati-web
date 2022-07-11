<?php

function laySubMenus($nn){
    foreach($nn as $k => $row){
        if(count($row->child)>0){
            echo '<li>
            <a class="dropdown-item dropdown-toggle" href="#" >
            '.$row->nama.'
            </a>';
                echo ' <ul title="'.$row->desc.'"
                class="submenu submenu-left dropdown-menu" >';
                laySubMenus($row->child);
                echo '</ul>';


            echo "</li>";
        }else{
            layTheMenus($row->child);
        }
    }
}

function layTheMenus($n,$sub = null){
    foreach($n as $k => $row){
        $fontweight = (count($row->child)>0) || ($row->parent_id==0) ? 'bold' :'normal';
        $parent = count($row->child)>0? "xparent":null;
        $active = (url()->current() == $row->url ? 'xactive' : '');

        if(count($row->child)>0){

            if($row->parent_id != 0){
                if($sub!=null){
                    echo '<li>
                    <a class="dropdown-item dropdown-toggle submenu-mom" href="#" data-toggle="dropdown">
                    '.$row->nama.'
                    </a>';
                        echo ' <ul title="'.$row->desc.'"
                        class="submenu submenu-left dropdown-menu" >';
                        layTheMenus($row->child,"submenu");
                        echo '</ul>';


                    echo "</li>";
                }else{
                    echo '<li>
                    <a class="nav-link a-nav dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                    '.$row->nama.'
                    </a>';
                        echo ' <ul title="'.$row->desc.'"
                        class="submenu submenu-left dropdown-menu" >';
                        //submenu
                        layTheMenus($row->child,null);
                        echo '</ul>';
                    echo "</li>";
                }
            }
            // $(document).ready(function(){
            //     $('.dropdown-submenu a.test').on("click", function(e){
            //       $(this).next('ul').toggle();
            //       e.stopPropagation();
            //       e.preventDefault();
            //     });
            //   });
            else{
                echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                '.$row->nama.'
                </a>';
                    echo ' <ul title="'.$row->desc.'"
                    class="dropdown-menu dropdown-menu-right" >';
                    layTheMenus($row->child);
                    echo '</ul>';


                echo "</li>";
            }
        }

        else{
            if(count($row->child)==0 && $row->parent_id ==0  ){
                if($row->is_statis == 1){
                    if(strlen($row->url)>3){
                        $base = url( $row->url."/".$row->slug);
                    }else{
                        $base = url('/');
                    }

                }else{

                    if(strlen($row->url)>3){
                        $base = url($row->url);
                    }else{
                        $base =url('/');
                    }



                }
                echo '<li  class=" nav-item  ">
                <a title="'.$row->desc.'"
                href="'.$base.'"
                onclick="loc(\''.$base.'\')"
                    class="nav-link">
                    '.$row->nama.'
                    </a> </li>';

            }else{
                if($row->is_statis == 1){
                    $base = url( $row->url."/".$row->slug);
                }else{
                    $base = url( $row->url);
                }


                echo '<li class=" nav-item  ">
                <a class="dropdown-item" title="'.$row->desc.'"
                href="'.$base.'"
                onclick="loc(\''.$base.'\')"
                class="nav-link">
                '.$row->nama.'
                </a>';
                echo "</li>";

            }
        }
    };
}


function getChildren($dataPage,$parent) {
    // dd($dataPage);

    $r = array();
    foreach($dataPage as $row) {
        if ($row->parent_id ==$parent) {
            $row->child = getChildren($dataPage,$row->id);
            $r[$row->id] = $row;
        }
    }
    return $r;
}



function drawSelectListBeringkat($data,$mPage=null,$parent_id_for_sub){
    static $i =0;
    $tab = str_repeat("-",$i);
    $i++;
    foreach($data as $k => $v){
        if($mPage == null){//variable $parent_id_for_sub bisa diisi langusng dari controller untuk menentukan parent saat membuat sub halaman
            if($parent_id_for_sub){
                if($v->id == $parent_id_for_sub){
                    echo "<option value='$v->id' selected >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                }else{
                    echo "<option value='$v->id' >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
                }
            }
            else{

                echo "<option value='$v->id' >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
            }

        }else{
            if($v->id != $mPage->id){
                if($v->id == $mPage->parent_id){
                    $selected ="selected";
                }else{
                    $selected ="";
                }
                echo "<option value='$v->id' $selected>$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
            }
        }

        if(count($v->child)>0){
            drawSelectListBeringkat($v->child,$mPage,$parent_id_for_sub);
            $i--;
        }else{

        }
    }
}

function drawSelectListBeringkatEditPage($data,$mPage=null,$parent_id_for_sub){
    static $i =0;
    $tab = str_repeat("-",$i);
    $i++;
    foreach($data as $k => $v){


        if($parent_id_for_sub){
            if($v->id == $parent_id_for_sub){
                echo "<option value='$v->id' selected >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
            }else{
                echo "<option value='$v->id' >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
            }
        }
        else{

            if($v->id != $mPage->id){
                if($v->id == $mPage->parent_id){
                    $selected ="selected";
                }else{
                    $selected ="";
                }
                echo "<option value='$v->id' $selected>$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
            }

            // echo "<option value='$v->id' >$tab".' '."$v->nama <small> [ level: $i ]</small></option>";
        }

        if(count($v->child)>0){
            drawSelectListBeringkatEditPage($v->child,$mPage,$parent_id_for_sub);
            $i--;
        }else{

        }
    }
}