<?php

declare(strict_types=1);

namespace App\Database\Tables;

use FastVolt\Core\Database\Mysql\Table;
use FastVolt\Core\Database\Mysql\Table\Schema;

class folders
{

    /**
     * Run Database Migration.
     *
     * @return void
     */
    public function up()
    {
        Table::create('folders')->colomn(function (Schema $schema) {

            $schema->intField('id', length: 11, auto_increment: true);
            $schema->varCharField('name');
            $schema->varCharField('icon');

        });
    }  
     
     
    /**
     * Drop Database Table
     *
     * @return void
     */
    public function down()
    {
        Table::drop('folders');
    }
     
}    
