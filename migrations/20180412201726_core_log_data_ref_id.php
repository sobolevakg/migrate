<?php


use Phinx\Migration\AbstractMigration;

class CoreLogDataRefId extends AbstractMigration
{

    public function up()
    {
       $this->execute('CALL clone_table("core_log_data");');

	if ($this->hasTable('core_log_data')) {
            $this->table('core_log_data')
		 ->changeColumn('ref_id', 'biginteger', ['limit' => 20, 'signed' => false, 'default' => 0, 'null' => false])
		 ->addColumn('ordi', 'boolean', ['signed' => false, 'after' => 'name', 'default' => 0, 'null' => false])
              	 ->update();
        }
 
    }

    public function down()
    {
	if ($this->hasTable('core_log_data')) {
	 $this->table('core_log_data')
		->removeColumn('ordi');
	}
    }
}
