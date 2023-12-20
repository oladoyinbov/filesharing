<?php

declare(strict_types=1);

namespace App\Database\Tables;

use Fastvolt\Core\Database\Mysql\Table;
use Fastvolt\Core\Database\Mysql\Table\Schema;

class users
{

    /**
     * Run Database Migration.
     *
     * @return void
     */
    public function up()
    {
        Table::create('users')->colomn(function (Schema $schema) {

            $schema->intField('id', length: 11, auto_increment: true);
            $schema->varCharField('uuid');
            $schema->varCharField('first_name');
            $schema->varCharField('last_name');
            $schema->varCharField('email');
            $schema->varCharField('password');
            $schema->timeStamp('created_at');

        });
    }


    /**
     * Drop Database Table
     *
     * @return void
     */
    public function down()
    {
        Table::drop('users');
    }

}
