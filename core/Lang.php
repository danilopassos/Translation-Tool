<?php

require_once 'util.php';

class Lang {

    private $value;

    function __construct($value) {
        $this->value = $value;
    }

    public function __toString() {
        return $this->value;
    }

    public function getRegion() {
        if ($this->value == "pt_BR") {
            return "BR";
        } else {
            if (substr($this->value, -2) == "US") {
                return "US";
            } else {
                return "EU";
            }
        }
    }

    public function getNameValue() {
        return $this->value;
    }

    public function getName() {
        return $this->getNameLang($this->value);
    }
    
    public static function getUmaUnicaLang() {
        return new Lang("en_US");
    }
    public static function getLangs() {
        //$europeias = array("de_DE","en_GB","es_ES","fr_FR", "it_IT","nl_NL");
        //$americanas = array("eu_US", "es_US", "fr_US");
        return array(
            
            //new Lang("en_GB"),
            new Lang("en_US"),
            //new Lang("es_ES"),
            new Lang("es_US"),
            //new Lang("fr_FR"),
            new Lang("fr_US"),
            //new Lang("it_IT"),
            //new Lang("de_DE"),
            //new Lang("nl_NL"),
        );
    }

    public static function getNameLang($lang) {
        $nomes = array();

        $nomes["pt_BR"] = "Português brasileiro";

        $nomes["de_DE"] = "Alemão";
        $nomes["en_GB"] = "Inglês";
        $nomes["en_US"] = "Inglês";
        $nomes["es_ES"] = "Espanhol";
        $nomes["es_US"] = "Espanhol";
        $nomes["fr_FR"] = "Francês";
        $nomes["fr_US"] = "Francês";
        $nomes["it_IT"] = "Italiano";
        $nomes["nl_NL"] = "Holandês";
        
        if(isset($nomes["$lang"])){
            return $nomes["$lang"];
        }else{
            return "idioma desconhecido";
        }
        
        
    }

}

?>