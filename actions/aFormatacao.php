<?php

require_once 'model/mFormatacao.php';

class aFormatacao extends mFormatacao {

    protected $sqlInsert = "INSERT INTO `formatacao`(`HEX`, `TAG`, `HTML`) VALUES ( '%s',NULL,NULL)";
    protected $sqlSelect = "SELECT * FROM `formatacao` WHERE HEX='%s'";
    protected $sqlSelectByTag = "SELECT * FROM `formatacao` WHERE TAG='%s'";

        
    public function insert() {
        $sql = sprintf($this->sqlInsert, $this->getHex());
        return $this->RunQuery($sql);
    }

    #public function update(){
    #    
    #}
    public static function getHexOf($tag) {
        $o = new aFormatacao();
        $sql = sprintf($o->sqlSelectByTag, $tag);

        $r = $o->runSelect($sql);
        foreach ($r as $row) {
            return $row["HEX"];
        }
        
        return null;
    }
    
    
    protected function select() {
        $sql = sprintf($this->sqlSelect, $this->getHex());

        $r = $this->runSelect($sql);
        foreach ($r as $row) {
            $this->setTag($row["TAG"]);
            $this->setHTML($row["HTML"]);
        }
    }

    
    
/*
 * Usada para popular as tags não reconhecidas com #[um numero]
 * 
 */
//    public function gerarTags() {
//        $sqlNull = "SELECT * FROM  `formatacao` WHERE  `TAG` IS NULL ";
//        $sqlUpdate = "UPDATE  `zeldass_translate_tool`.`formatacao` SET  `TAG` = '%s' WHERE  `formatacao`.`HEX` =  '%s';";
//        $sql = $sqlNull;
//        $r = $this->runSelect($sql);
//        
//        $cont = 373;
//        
//        foreach ($r as $row) {
//            $cont++;
//            $sql2 = sprintf($sqlUpdate, "#".$cont ,$row["HEX"] );
//            $this->RunQuery($sql2);
//            echo "\n#$cont\t".$row["HEX"];
//        }
//    }
    
}

?>