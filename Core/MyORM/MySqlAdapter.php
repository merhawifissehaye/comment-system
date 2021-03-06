<?php

// MySQLAdapter.php

namespace Core\MyORM;

class MySQLAdapter implements DatabaseAdapterInterface
{

    protected $_config = array();
    protected $_link;
    protected $_result;

    /**
     * MySQLAdapter constructor.
     * @param array $_config
     */
    public function __construct(array $_config)
    {
        if(count($_config) !== 4) {
            throw new \InvalidArgumentException('Invalid number of connection parameters');
        }
        $this->_config = $_config;
    }


    function connect()
    {
        if($this->_link === null) {
            list($host, $user, $password, $database) = $this->_config;
            if(!$this->_link = @mysqli_connect($host, $user, $password, $database)) {
                throw new \RuntimeException('Error connecting to the server : ' . mysqli_connect_error());
            }
            unset($host, $user, $password, $database);
        }
        return $this->_link;
    }

    function query($query)
    {
        if(!is_string($query) || empty($query)) {
            throw new \InvalidArgumentException('The specified query is not valid.');
        }
        $this->connect();
        if(!$this->_result = mysqli_query($this->_link, $query)) {
            throw new \RuntimeException('Error executing the specified query : ' . $query . mysqli_error($this->_link));
        }
    }

    function fetch()
    {
        if($this->_result !== null) {
            if(($row = mysqli_fetch_array($this->_result, MYSQLI_ASSOC)) === false) {
                $this->freeResult();
            }
            return $row;
        }
        return false;
    }

    function select($table, $conditions = '', $fields = '*', $order = '', $limit = null, $offset = null)
    {
        $query = 'SELECT ' . $fields . ' FROM ' . $table
            .(($conditions) ? ' WHERE ' . $conditions : '')
            .(($limit) ? ' LIMIT ' . $limit : '')
            .(($offset && $limit) ? ' OFFSET ' . $offset : '')
            .(($order) ? ' ORDER BY ' . $order : '');

        $this->query($query);
        return $this->countRows();
    }

    function insert($table, array $data)
    {
        $fields = implode(',', array_keys($data));
        $values = implode(',', array_map(array($this, 'quoteValue'), array_values($data)));
        $query = 'INSERT INTO ' . $table . ' (' . $fields . ') ' . ' VALUES (' . $values . ')';
        $this->query($query);
        return $this->getInsertId();
    }

    function update($table, array $data, $conditions)
    {
        $set = array();
        foreach($data as $field=>$value) {
            $set[] = $field . '=' . $this->quoteValue($value);
        }
        $set = implode(',', $set);
        $query = 'UPDATE ' . $table . ' SET ' . $set . (($conditions) ? ' WHERE ' . $conditions : '');
        $this->query($query);
        return $this->getAffectedRows();
    }

    function delete($table, $conditions)
    {
        $query = 'DELETE FROM ' . $table
            . (($conditions) ? ' WHERE ' . $conditions : '');
        $this->query($query);
        return $this->getAffectedRows();
    }

    function getInsertId()
    {
        return $this->_link !== null
            ? mysqli_insert_id($this->_link) : null;
    }

    function countRows()
    {
        return $this->_result !== null
            ? mysqli_num_rows($this->_result) : 0;
    }

    function getAffectedRows()
    {
        return $this->_link !== null
            ? mysqli_affected_rows($this->_link) : 0;
    }

    public function quoteValue($value) {
        $this->connect();
        if($value === null) {
            $value = 'NULL';
        }
        else if(!is_numeric($value)) {
            $value = "'" . mysqli_real_escape_string($this->_link, $value) . "'";
        }
        return $value;
    }

    public function freeResult() {
        if($this->_result === null) {
            return false;
        }
        mysqli_free_result($this->_result);
        return true;
    }

    function disconnect()
    {
        if($this->_link === null) {
            return false;
        }
        mysqli_close($this->_link);
        $this->_link = null;
        return true;
    }

    function __destruct()
    {
        $this->disconnect();
    }


}