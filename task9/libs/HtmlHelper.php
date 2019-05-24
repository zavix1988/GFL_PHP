<?php
class HtmlHelper
{
    public static function viewTable($table, $attr="")
    {
        $result = "<table {$attr}>\n<tbody>\n";
        for ($i=0; $i < count($table) ; $i++) {
            if($i == 0){
                $result .= "<tr>\n";
                for ($j=0; $j < count($table[$i]); $j++) { 
                    $result .= "<th>{$table[$i][$j]}</th>\n";
                }
                $result .= "</tr>\n";
            } else {
                $result .= "<tr>\n";
                for ($j=0; $j<count($table[$i]); $j++) {
                    $result .= "<td>{$table[$i][$j]}</td>\n";
                }
                $result .= "</tr>\n";
            }
        }
        $result .= "</tbody>\n</table>\n";
        return $result;
    }

    public static function drawingSelect($array, $id="", $multiple=false, $attr="")
    {
        $result = "<select {$id}";
        if($multiple) $result .= "multiple";
        $result .= " {$attr}>\n";
        foreach($array as $key => $value){
            $result .= "<option id=".$key." name=".$key." value=".$key.">$value</option>\n";
        }
        $result .= "</select>\n";
        return $result;
    }

    public static function drawingList($array, $ol=false,  $attr="")
    {
        $result = ($ol)? ("<ol {$attr}>\n"):("<ul {$attr}>\n");
        foreach($array as $value){
            $result .= "<li>$value</li>\n";
        }
        $result .= ($ol)?("</ol>\n"):("</ul>\n");
        return $result;
    }

    public static function descriptionListDraw($dt, $dd, $attr="")
    {
        $result = "<dl {$attr}>\n";
        $result .= "<dt>{$dt}</dt>\n";
        $result .= "<dd>{$dd}</dd>\n";
        $result .= "</dl>";
        return $result;
    }

    public static function checkboxesDraw($array, $checked=1, $attr="")
    {
        $result = "";
        $i=1;
        foreach ($array as $key => $value){
            $result .= "<div {$attr}>\n";
            if($i == $checked) $result .= "<input type='checkbox' id='{$key}' name='{$key}' checked>\n";
            else $result .= "<input type='checkbox' id='{$key}' name='{$key}'>\n";
            $result .= "<label for='{$key}'>{$value}</label>\n";
            $i++;
            $result .= "</div>\n";
        }
        return $result;
    }

    public static function radioButtonGroupDraw($array, $attr="", $name="radio"){
        $result = "<div {$attr}>\n";
        $i=1;
        foreach ($array as $key => $value){
            $result .= "<input type='radio' id='{$name}1' name='{$name}' value='{$key}'>\n";
            $result .= "<label for='{$name}1'>{$value}</label>\n";
            $i++;
        }
        $result .= "</div>\n";
        return $result;
    }

}
