<?php

require_once 'model/mDialog.php';
require_once 'core/User.php';

class aDialog extends mDialog {

    protected $sqlUpdate = "UPDATE `tt_dialog_lang` SET `dialog` = '%s',`dialog_status_id` = 2,`last_updated`= now() WHERE `lang_id`= 7 and `version` = 'last' and `dialog_id` = '%s'";
    protected $sqlUpdateHist = "INSERT INTO `tt_dialog_hist`(`dialog_lang_id`, `user_id`, `dialog_changed`, `last_updated`) VALUES (%s, %s, '%s', now())";
    protected $sqlUpdateDialogApproved = "UPDATE `tt_dialog_lang` SET `dialog_status_id` = 4,`last_updated`= now() WHERE `lang_id`= 7 and `version` = 'last' and `dialog_id` = '%s'";
    protected $sqlUpdateDialogRejected = "UPDATE `tt_dialog_lang` SET `dialog_status_id` = 5,`last_updated`= now() WHERE `lang_id`= 7 and `version` = 'last' and `dialog_id` = '%s'";

    public function updateDialog() {
        $sql = sprintf($this->sqlUpdate, mysql_real_escape_string($this->getDialogTagHex()), $this->getDialogId());
        $this->RunQuery($sql);

        $sqlHist = sprintf($this->sqlUpdateHist, $this->getDialogId(), User::getId(), mysql_real_escape_string($this->getDialogTagHex()));
        $this->RunQuery($sqlHist);
    }

    public function updateDialogApproved() {
        $sql = sprintf($this->sqlUpdateDialogApproved, $this->getDialogId());
        $this->RunQuery($sql);
    }

    public function updateDialogRejected() {
        $sql = sprintf($this->sqlUpdateDialogRejected, $this->getDialogId());
        $this->RunQuery($sql);
    }

}

?>
