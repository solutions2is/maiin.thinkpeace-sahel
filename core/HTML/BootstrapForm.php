<?php
namespace Core\HTML;
class BootstrapForm extends Form{

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    protected function surround($html){
        return "<div class=\"form-group\">{$html}</div>";
    }

    /**
     * @param $name string
     * @param $label
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea'){
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name) . '</textarea>';
        } else{
            $input = '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    public function inputOnline($name, $label, $options = []){
        $type = isset($options['type']) ? $options['type'] : 'text';
        $required = isset($options['field']) ? $options['field'] : '';
        $disabeld = isset($options['field_status']) ? $options['field_status'] : '';
        $placeholder = isset($options['placeholder']) ? $options['placeholder'] : $name;
        if ($type === 'textarea') {
            $input = '<textarea name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control" rows="10" '.$required.'>' . $this->getValue($name) . '</textarea>';
        } else {
            $input = '<input type="' . $type . '" id="' . $name . '" name="' . $name . '" value="' . $this->getValue($name) . '" class="form-control" placeholder="' . $label . '" '.$required.' '.$disabeld.'/>';
        }

        return $this->surround($input);

    }

    public function select($name, $label, $options){
        //$label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '" id="' . $name . '" >';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($label . $input);
    }

    public function selectOnline($name, $label, $options){
        //$label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name="' . $name . '" id="' . $name . '" '.$label.'>';
        foreach($options as $k => $v){
            $attributes = '';
            if($k == $this->getValue($name)){
                $attributes = ' selected';
            }
            $input .= "<option value='$k'$attributes>$v</option>";
        }
        $input .= '</select>';
        return $this->surround($input);
    }

    /**
     * @return string
     */
    public function submit(){
        return $this->surround('<button type="submit" class="btn btn-primary">Enregistrer</button>');
    }
}