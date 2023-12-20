<?php

declare(strict_types=1);

namespace App\Model;

class Users extends \FastVolt\Core\Model
{

    /**
     * The table name to fetch datas from
     *
     * @var string
     */
    protected $tableName = 'Users'; 
        

     /**
     * The default primary key
     *
     * @var string
     */
    protected $primaryKey = 'id'; 
     
}