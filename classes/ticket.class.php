<?php

class Ticket extends DbObject
{
    const STATUS_OPEN = 'OPEN';
    const STATUS_CLOSED = 'CLOSED';

    /**
     * Unique id for ticket
     * @var int
     */
    public $ticketId;

    /**
     * Name of the person who opened this ticket
     * @var string
     */
    public $openerName;

    /**
     * Description of the bug/issue
     * @var string
     */
    public $issueDescription;

    /**
     * Name of the person who closed this ticket
     * @var string
     */
    public $closerName;

    /**
     * @var string ENUM(OPEN, CLOSED)
     */
    public $status;

    /**
     * Timestamp of creation
     */
    public $createtime;

    /**
     * Timestamp of soft delete
     */
    public $deletetime;

    public function loadData(&$res) {
        $this->ticketId         = $res['ticket_id'];
        $this->openerName       = $res['opener_name'];
        $this->issueDescription = $res['issue_description'];
        $this->closerName       = $res['closer_name'];
        $this->status           = $res['status'];
        $this->createtime       = $res['createtime'];
        $this->deletetime       = $res['deletetime'];
    }

    /**
     * @param int $ticketId
     * @return Ticket|False
     */
    public static function load($ticketId) {
        $query = "SELECT * FROM ticket " .
                 "WHERE ticket_id = ? AND deletetime IS NULL";
        $ticket = static::loadById($query, $ticketId);
        return $ticket;
    }

    public function update() {
        $query = "UPDATE ticket set opener_name = ?, issue_description = ?, closer_name = ?, status = ? " .
                 "WHERE ticket_id = ?";
        $typeString = 'ssssi';
        $values = array(
            $this->openerName,
            $this->issueDescription,
            $this->closerName,
            $this->status,
            $this->ticketId
        );

        return static::queryByParams($query, $typeString, $values);
    }

    public function insert() {
        $query = "INSERT INTO ticket(opener_name, issue_description, closer_name, status, createtime) " .
                 "VALUES (?, ?, ?, ?, NOW())";
        $typeString = 'ssss';
        $values = array(
            $this->openerName,
            $this->issueDescription,
            $this->closerName,
            $this->status
        );

        return static::insertByParams($query, $typeString, $values);
    }

    public function delete() {
        $query = "UPDATE ticket set deletetime = NOW() WHERE ticket_id = ?";
        return static::queryByParams($query, 'i', array($this->ticketId));
    }

    /**
     * @return Ticket[]
     */
    public static function listAllTickets(){
        $query = "SELECT * FROM ticket " .
                 "WHERE deletetime IS NULL";
        return static::loadAllByParams($query);
    }

}