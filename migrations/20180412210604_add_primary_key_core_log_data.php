<?php


use Phinx\Migration\AbstractMigration;

class AddPrimaryKeyCoreLogData extends AbstractMigration
{

    public function up()
    {
	if ($this->hasTable('core_log_data')) {
	 $this->table('core_log_data')
		->addIndex(['is_active', 'ordi'], ['type' => 'PRIMARY'])
		->save();
	}

    }

    public function down()
    {
	if ($this->hasTable('core_log_data')) {
	 $this->table('core_log_data')
		->removeIndex(['is_active'])
		->removeIndex(['ordi']);
	}
    }
}
