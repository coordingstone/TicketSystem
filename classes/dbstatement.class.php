<?php
/**
 * Created by PhpStorm.
 * User: joelsvensson
 * Date: 2018-10-25
 * Time: 15:33
 */

class DbStatement extends mysqli_stmt
{

    public function __construct($link)
    {
        parent::__construct($link, '');
    }

    /**
     * @return bool
     * @throws DbException
     */
    public function execute()
    {
        $result = parent::execute();
        if (!$result) {
            throw new DbException("Query error({$this->errno}) {$this->error}");
        }
        return $result;
    }

    public function fetchRow() {
        $variables = array();
        $data = array();
        $meta = $this->result_metadata();

        while ($field = $meta->fetch_field()) {
            $variables[] = &$data[$field->name];
        }

        $ref = new ReflectionClass('mysqli_stmt');
        $method = $ref->getMethod('bind_result');
        $method->invokeArgs($this, $variables);

        if ($this->fetch()) {
            return $data;
        }

        return false;
    }

    public function fetchRows() {
        $rows = array();
        $variables = array();
        $data = array();
        $meta = $this->result_metadata();

        while ($field = $meta->fetch_field()) {
            $variables[] = &$data[$field->name];
        }

        $ref = new ReflectionClass('mysqli_stmt');
        $method = $ref->getMethod('bind_result');
        $method->invokeArgs($this, $variables);

        $i = 0;
        while ($this->fetch()) {
            $rows[$i] = array();
            foreach ($data as $k => $v) {
                $rows[$i][$k] = $v;
            }
            $i++;
        }

        return $rows;
    }

}