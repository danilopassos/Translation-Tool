<?php

require_once 'model/mDialogo.php';

class mDialogoOriginal extends mDialogo{
    protected $lang; 

    public function getLang(){
        return $this->lang;
    }
    
    public function setLang($lang){
        $this->lang = $lang;
    }
    
    public function getLangName() {
        return Lang::getNameLang($this->lang);
    }
    
    public function getPathTmpFile() {
        return getDirTMP() .
                $this->lang . DIRECTORY_SEPARATOR .
                $this->arc . ".d" . DIRECTORY_SEPARATOR .
                $this->msbt . ".d" . DIRECTORY_SEPARATOR . $this->posicao;
    }

    public function getLerDoArquivoTmp() {
        $file = $this->getPathTmpFile();
        
        
        if (file_exists($file)) {
            $handle = fopen($file, "r");
            $fileBin = fread($handle, filesize($file));
            $this->dialogoBase64 = base64_encode($fileBin);
        } else {
            printLog("Arquivo não encontrado : " . $file);
        }
    }
    
}

?>
