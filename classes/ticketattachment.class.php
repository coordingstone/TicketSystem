<?php


class TicketAttachment extends DbObject
{

    public $ticketAttachmentId;

    /**
     * @var int
     */
    public $ticketId;

    /**
     * @var string
     */
    public $fileName;

    /**
     * @var string
     */
    public $extension;

    /**
     * @var string
     */
    public $createtime;

    /**
     * @var string
     */
    public $deletetime;

    function loadData(&$res)
    {
        $this->ticketAttachmentId = $res['ticket_attachment_id'];
        $this->ticketId = $res['ticket_id'];
        $this->fileName = $res['file_name'];
        $this->extension = $res['extension'];
        $this->createtime = $res['createtime'];
        $this->deletetime = $res['deletetime'];
    }

    public static function load($ticketAttachmentId){
        $query = "SELECT * FROM ticket_attachment " .
        "WHERE ticket_attachment_id = ? AND deletetime IS NULL";
        return static::loadById($query, $ticketAttachmentId);
    }

    public function update() {
        $query = "UPDATE ticket_attachment SET extension = ?, file_name = ? " .
                 "WHERE ticket_id = ?";
        $typeString = 'ssi';
        $values = array(
            $this->extension,
            $this->fileName,
            $this->ticketId
        );

        return static::queryByParams($query, $typeString, $values);
    }

    public function insert() {
        $query = "INSERT INTO ticket_attachment (ticket_id, file_name, extension, createtime) " .
            "VALUES (?, ?, ?, NOW())";
        $typeString = 'iss';
        $values = array(
            $this->ticketId,
            $this->fileName,
            $this->extension
        );


        $this->ticketAttachmentId = static::insertByParams($query, $typeString, $values);
    }

    public function setFileName($fileName){
        $query = "UPDATE ticket_attachment SET file_name = ? " .
                 "WHERE ticket_attachment_id = ?";
        static::queryByParams($query, 'si', array($fileName, $this->ticketAttachmentId));
        $this->fileName = $fileName;
    }

    public function delete(){
        $query = "UPDATE ticket_attachment SET deletetime = NOW() WHERE ticket_attachment_id = ?";
        self::queryByParams($query, 'i', array($this->ticketAttachmentId));
    }

    public function getAttachmentDirectory() {
        return dirname(__FILE__, 2) . '/resources/attachments/' . $this->ticketId;
    }

    public function getAttachmentPath(){
        return $this->getAttachmentDirectory() . '/' . $this->fileName;
    }

    public function getAttachmentData() {
        $path = $this->getAttachmentPath();
        $data = file_get_contents($path);
        return $data;
    }

    public function getAttachmentBase64Encoded() {
        return base64_encode($this->getAttachmentData());
    }

    /**
     * @param int $ticketId
     * @param string $extension
     * @param string $attachmentData
     * @return TicketAttachment
     * @throws Exception
     */
    public static function createAttachment($ticketId, $fileName, $extension, $attachmentData) {
        $newAttachment = new self();
        $newAttachment->ticketId = $ticketId;
        $newAttachment->fileName = $fileName;
        $newAttachment->extension = $extension;
        $newAttachment->insert();

        $newAttachment->setFileName($newAttachment->fileName . "." . strtolower($extension));

        $attachmentDirectory = $newAttachment->getAttachmentDirectory();

        $fullAttachmentPath = $attachmentDirectory . '/' . $newAttachment->fileName;

        if (!file_exists($attachmentDirectory) || !is_dir($attachmentDirectory)) {
            if (!@mkdir($attachmentDirectory)) {
                throw new Exception("Failed to create directory '$attachmentDirectory'");
            }
        }

        if (file_put_contents($fullAttachmentPath, base64_decode($attachmentData)) == false) {
            throw new Exception("Failed to write attachment data to '$fullAttachmentPath'");
        }

        return $newAttachment;
    }

    public function updateAttachment($extension, $fileName, $attachmentData) {
        $attachmentDirectory = $this->getAttachmentDirectory();

        $fullAttachmentPath = $attachmentDirectory . '/' . $this->fileName;

        if (!file_exists($attachmentDirectory) || !is_dir($attachmentDirectory)) {
            if (!@mkdir($attachmentDirectory)) {
                throw new Exception("Failed to create directory '$attachmentDirectory'");
            }
        }

        unlink($fullAttachmentPath);



        $this->fileName = $fileName;
        $this->extension = $extension;

        $this->setFileName($this->fileName . "." . strtolower($extension));
        $fullAttachmentPath = $attachmentDirectory . '/' . $this->fileName;

        $this->update();

        if (file_put_contents($fullAttachmentPath, base64_decode($attachmentData)) == false) {
            throw new Exception("Failed to write attachment data to '$fullAttachmentPath'");
        }
    }

    /**
     * @param $ticketId
     * @return TicketAttachment[]
     */
    public static function loadByTicketId($ticketId) {
        $query = "SELECT * FROM ticket_attachment WHERE ticket_id = ? AND deletetime IS NULL";
        return self::loadAllByParams($query, 'i', array($ticketId));

    }
}