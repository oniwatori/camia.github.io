<?php
class Fw_Validator_Required extends Fw_Validator_Base{
 
    public function validate(){
        if(!isset($this->value) || null == $this->value || trim($this->value) == '')
            $this->setError('Field "'. $this->config['label'] .'" is required.');
    }
}