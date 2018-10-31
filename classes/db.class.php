<?php

class Db extends MySQLi
{
    private static $_instance;

    private function __construct()
    {
        $conf = Config::getInstance();
        $host = $conf->Database['host'];
        $username = $conf->Database['username'];
        $password = $conf->Database['password'];
        $name = $conf->Database['name'];
        $port = $conf->Database['port'];
        $encoding = $conf->Database['encoding'];

        parent::__construct($host, $username, $password, $name, $port);

        if ($this->connect_error) {
            throw new DbException("Connect error ({$this->connect_error}) {$this->connect_error}");

        }

        $this->set_charset($encoding);
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