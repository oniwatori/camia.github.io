<?php
class Fw_Utils {

	public static function getCategory($arr, $id){
		foreach ($arr as $c) {
			if($c->id == $id) {
				return $c;
			}
		}
		return null;
	}

	public function load($data){
        if($data != null){
            if(is_array($data)){
                foreach($data as $key => $value){
                    $this->$key = trim($value);
                }
            }else{
                $data = get_object_vars($data);
                foreach($data as $key => $value){
                    $this->$key = $value;
                }
            }
        }
    }

    public static function BundleStyle($name){
        $arrStyle = array(
            'animations' => array('animations', 'animations-ie-fix')
        );
    }

    public static function BundleScript($name){
        $arrScript = array(
            'animations' => array('css3-animate-it')
        );
    }

    public static function BundlePakage($name){
        $arrPakage = array(
            'animations'
        );
    }

}

?>