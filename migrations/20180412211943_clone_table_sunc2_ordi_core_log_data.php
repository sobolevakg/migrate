<?php


use Phinx\Migration\AbstractMigration;

class CloneTableSunc2OrdiCoreLogData extends AbstractMigration
{

    public function up()
    {
	$this->execute("CALL clone_table_sync2_ordi('core_log_data',0);");
    }
}
