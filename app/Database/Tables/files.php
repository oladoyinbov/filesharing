<?php

declare(strict_types=1);

namespace App\Database\Tables;

use FastVolt\Core\Database\Mysql\Table;
use FastVolt\Core\Database\Mysql\Table\Schema;

class files
{

    /**
     * Run Database Migration.
     *
     * @return void
     */
    public function up()
    {
        Table::create('files')->colomn(function (Schema $schema) {

            $schema->intField('id', length: 11, auto_increment: true);
            $schema->varCharField('uuid');
            $schema->varCharField('user');
            $schema->varCharField('name');
            $schema->varCharField('type');
            $schema->varCharField('description');
            $schema->varCharField('size');
            $schema->varCharField('path');
            $schema->timeStamp('last_modified');
            $schema->timeStamp();

        });
    }  
     
     
    /**
     * Drop Database Table
     *
     * @return void
     */
    public function down()
    {
        Table::drop('files');
    }
     
}    
