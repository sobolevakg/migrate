<?php


use Phinx\Migration\AbstractMigration;

class UpdateCoreLogData extends AbstractMigration
{

    public function up()
    {
	$this->execute('UPDATE core_log_data
		SET ordi=(SELECT @a:=IF(@aid=ref_id,@a+1, IF( (SELECT @aid:=ref_id),0,0)))
		WHERE 1=1
    		AND (SELECT @aid:=ref_id) AND (SELECT @a:=-1)=-1 -- default values
		ORDER BY ref_id ASC, ordi ASC;');
    }
}
