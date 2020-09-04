<?php

namespace PHPMVC\Models;

class EmployeeModel extends AbstractModel
{
    public $id;
    public $name;
    public $age;
    public $address;
    public $tax;
    public $salary;

    protected static $tableName = 'employees';
    protected static $tableSchema = array(
        'id'        => self::DATA_TYPE_INT,
        'name'      => self::DATA_TYPE_STR,
        'age'       => self::DATA_TYPE_INT,
        'address'   => self::DATA_TYPE_STR,
        'salary'    => self::DATA_TYPE_DECIMAL,
        'tax'       => self::DATA_TYPE_DECIMAL
    );

    protected  static $primaryKey = 'id';

    // Fetch using Constractor


    public function getTableName() {
        return self::$tableName;
    }


}