<?php


use Phinx\Migration\AbstractMigration;

class CreateExamplesTable extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $this->table('examples')
            ->addColumn('foo', 'string', ['limit' => 20])
            ->addColumn('bar', 'string', ['limit' => 40])
            ->create();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->table('examples')->drop()->save();
    }
}
