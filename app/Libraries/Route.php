<?php 
namespace App\Libraries; 
class Route 
{ 
    public static function route_site() 
    { 
        // var_dump(isset($_REQUEST["option"])); 
        // var_dump(isset($_REQUEST["cat"])); 
        // var_dump(isset($_REQUEST["slug"])); 
        $pathView='views/frontend/'; 
         
 
        if(isset($_REQUEST['option'])){ 
            $pathView.=$_REQUEST['option']; 
            if(isset($_REQUEST['slug'])) { 
                $pathView .='-detail.php'; 
            }else { 
                if(isset($_REQUEST['cat'])) { 
                    $pathView .='-category.php'; 
                }else { 
                    $pathView .='.php'; 
                } 
            } 
        }else { 
            $pathView .= 'home.php'; 
        } 
        require_once($pathView); 
    } 
    public static function route_admin() 
    { 
        //admin/index.php-->Bang dieu khien 
        //admin/index.php?option=product-->Quan li san pham 
        //admin/index.php?option=product&cat=create-->Add san pham 
        $pathView ='../views/backend/'; 
        if(isset($_REQUEST['option'])) { 
            $pathView .=$_REQUEST['option'] . '/'; 
            if (isset($_REQUEST['cat'])) { 
                $pathView .=$_REQUEST['cat'] . '.php'; 
            } else { 
                $pathView .='index.php'; 
            } 
        }else { 
            $pathView .='dashboard/index.php'; 
        } 
        require_once($pathView); 
    } 
     
}