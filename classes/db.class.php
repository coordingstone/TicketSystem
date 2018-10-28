<?php

class Db extends MySQLi
{
    private static $_instance;

    private function __construct()
    {
        $port = 3306;

        parent::__construct('127.0.0.1', 'root', 'root', 'ticketsystem', $port);

        if ($this->connect_error) {
            throw new DbException("Connect error ({$this->connect_error}) {$this->connect_error}");

        }

        $this->set_charset('utf8');
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * @param string $query
     * @return DbStatement
     * @throws DbException
     */
    public function prepare($query)
    {
        $stmt = new DbStatement($this, '');
        $result = $stmt->prepare($query);
        if (!$result) {
            throw new DbException("Query error({$stmt->errno}) {$stmt->error}");
        }
        return $stmt;
    }

    /**
     * @param string $query
     * @param $resultMode
     * @return bool|mysqli_result
     * @throws DbException
     */
    public function query($query, $resultMode = null)
    {
        $result = parent::query($query);
        if (mysqli_error($this)) {
            $error = mysqli_error($this);
            $errno = mysqli_errno($this);
            throw new DbException("Query error ($errno) $error for \"$query\"");
        }
        return $result;
    }

    public function startTransaction() {
        $this->query('START TRANSACTION');
    }

    public function commitTransaction() {
        $this->query('COMMIT');
    }

    public function rollbackTransaction() {
        $this->query('ROLLBACK');
    }
}