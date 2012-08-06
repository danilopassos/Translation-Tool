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
        if ($this->value == "ja_JP") {
            return "JP";
        }

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
        return array(
//            new Lang("pt_BR"),
//            new Lang("en_US"),
//            new Lang("es_US"),
//            new Lang("fr_US"),
//            new Lang("it_IT"),
//            new Lang("de_DE"),
            new Lang("ja_JP")
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

        if (isset($nomes["$lang"])) {
            return $nomes["$lang"];
        } else {
            return "idioma desconhecido";
        }
    }

    public static function getId($lang) {
        $ids = array();
        $ids["en_US"] = "1";
        $ids["es_US"] = "2";
        $ids["fr_US"] = "3";
        $ids["it_IT"] = "4";
        $ids["de_DE"] = "5";
        $ids["ja_JP"] = "6";
        $ids["pt_BR"] = "7";

        if (isset($ids["$lang"])) {
            return $ids["$lang"];
        } else {
            die("lang $lang unknown");
        }
    }

    public static function getLangName($id) {
        $names = array();
        $names["1"] = "en_US";
        $names["2"] = "es_US";
        $names["3"] = "fr_US";
        $names["4"] = "it_IT";
        $names["5"] = "de_DE";
        $names["6"] = "ja_JP";
        $names["7"] = "pt_BR";

        if (isset($names["$id"])) {
            return $names["$id"];
        } else {
            die("lang_id $id unknown");
        }
    }

}

?>