<?php
class Fw_Helper{

    /**
    * Get relative URL
    * isDef: is default module
    * isRes: is resource URL
    */
    public static function getBaseURL($isDef, $isRes){
        $url = FwBase::$baseUrl;
        $url .= $isDef ? '' : '/..';
        $url .= $isRes ? '/public' : '';
        return $url;
    }

    public static function getModuleURL($category, $thread) {
        $url = Fw_helper::getBaseURL(true, false);
        if($category) {
            $url .= '/' . $category->alias;
            $url .= $thread ? '/' . $thread->alias : '';
        }        
        return $url;
    }

    public static function doDrawMenu($horzFunc, $func, $isMain = false){
        
        if($isMain){
            if($func->horizontal_id == 0) {
                Fw_Helper::doDrawMenu($horzFunc, $func);
            }
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="./' . $func->alias . '.html" title="' . $func->alias . '">' . $func->name . '</a>';
            $o = false;
            $p = false;
            foreach ($horzFunc as $child) {
                if($child->horizontal_id == $func->id){
                    if(!$o) {
                        echo '<ul style="display:none;">';
                        $p = true;
                    }
                    Fw_Helper::doDrawMenu($horzFunc, $child);
                }
            }
            if($p)
                echo '</ul>';
            echo '</li>';
        }
        
    }

    public static function getActivedUser($id){
        return Users::model()->find('id=:id', array(':id' => $id));
    }

    public static function getActivedUsername($id){
        $u = Fw_Helper::getActivedUser($id);
        return $u ? $u->username : "Unknown";
    }
    
    public static function getPage($page){
        return ($page != null && trim($page) != '' && $page > 0 && is_numeric($page)) ? $page : 1;
    }
     
    public static function getCurrentUrl(){
        return 'http'.(empty($_SERVER['HTTPS'])?'':'s').'://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
    }
     
    public static function convertAlias($str){
        $str = strtolower(trim($str));
        $str = trim($str, '-');
        $str = preg_replace('/[^a-z0-9-]/', '-', $str);
        $str = preg_replace('/-+/', "-", $str);
        return $str;
    }

    public static function getEspaceId($name = 'default'){
        $es = FwBase::$config['module'];
        if(array_key_exists($name, $es)){
            return $es[$name];
        }
        return -1;
    }
    
    public static function getPagingArray($page, $total, $rank){
        $paging = array();        
        $i = 1;
        $begin = (int)($page / $rank);
        $begin = ($page % $rank == 0 ? $begin - 1 : $begin) * $rank;
        $begin = $begin > 0 ? $begin + 1 : 1;
        $begin = $begin <= $total ? $begin : $total;
        $end = $begin + $rank - 1 < $total ? $begin + $rank - 1 : $total;
        if($page > $rank)
            $paging[] = $begin - $rank;
        while(!($begin > $end || $i > $rank)){
            $paging[] = $begin++;
            $i++;
        }
        if($end < $total)
            $paging[] = $end + $rank;
        return $paging;
    }
    
    public static function getPageValue($p, $paging){
        $rank = Fw::$config['pageRank'];
            if( sizeof($paging) > 1 && $p + $rank == $paging[1])
                return "Previous";
            if(sizeof($paging) > $rank && $paging[sizeof($paging) - 2] + $rank == $p)
                return "Next";
        return $p;
    }

    public static function getPageURL($p, $i, $paging){
        $url = '';
        if($i == 0 && sizeof($paging) > 1 && $p + 1 < $paging[$i + 1]) {
            $url = $paging[$i + 1] - 1;
        } else if (sizeof($paging) > 1 && $i == sizeof($paging) - 1 && $p - 1 > $paging[$i - 1]) {
            $url = $paging[$i - 1] + 1;
        } else {
            $url = $p;
        }
        $url .= '.html';
        return $url; 
    }
    
    public static function saveImageAsResource($name, $dir, $hasThumb = true, $w = 320, $h = 240, $tw = 50, $th = 50){
        // Save image to resource
        $image = new Fw_Image(Fw_Request::file('ImageUpload')['tmp_name']);
        Fw_Helper::saveImage($image, $name, "public/images/".$dir, $w, $h);
        if($hasThumb){
            Fw_Helper::saveImage($image, $name, "public/images/".$dir."/thumbs", $tw, $th);
        }
    }

    private static function saveImage($image, $name, $path, $w, $h){
        $image->resize($w, $h);

        if (!file_exists($path)) {
            mkdir($path, 0777, true);            
        }

        $path .= Fw_Helper::endsWith($path,"/") ? "" : "/";
        $image->save($path.$name);
    }
    
    public static function deleteResourceImage($name, $dir, $delThumb){
        if (file_exists("public/images/".$dir."/".$name)) {
            unlink("public/images/".$dir."/".$name);
        }
        if ($delThumb && file_exists("public/images/".$dir."/thumbs/".$name)) {
            unlink("public/images/".$dir."/thumbs/".$name);
        }
    }
    
    public static function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }
    
    public static function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    }

    public static function getTagsAsArr($s) {
        $ts = explode(',', $s);
        return isset($ts[0]) ? $ts : [];
    }

    public static function tagToAlias($t) {
        $a = Fw_Helper::tagToKeywords($t);
        $a= preg_replace( "/(\W+)/" ,' ', $a);
        $a = str_replace("-", "_", $a);
        $a = str_replace(" ", "-", $a);
        return trim($a);
    }

    public static function revertAliasToTag($a){
        $a = str_replace("-", " ", $a);
        return str_replace("_", "-", $a);
    }

    public static function tagToKeywords($t){
        $a = trim(strtolower($t));
        $a = preg_replace("/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/", "a", $a);
        $a= preg_replace("/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/","e", $a);  
        $a= preg_replace("/ì|í|ị|ỉ|ĩ/","i", $a);  
        $a= preg_replace("/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/","o", $a);  
        $a= preg_replace("/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/","u", $a);  
        $a= preg_replace("/ỳ|ý|ỵ|ỷ|ỹ/","y", $a);  
        $a= preg_replace("/đ/","d", $a);
        return $a;
    }

    function isInt($number){
        $number = filter_var($number, FILTER_VALIDATE_INT);
        return ($number !== FALSE);
    }


}