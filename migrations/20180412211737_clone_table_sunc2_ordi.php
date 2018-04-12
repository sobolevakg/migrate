<?php


use Phinx\Migration\AbstractMigration;

class CloneTableSunc2Ordi extends AbstractMigration
{

    public function up()
    {
	$this->execute("SET @sql=CONCAT('INSERT IGNORE INTO `',table_namex,'`
        		(`ref_id`, `ordi`, `u_id`, `start_ts`, `stop_ts`, `module`, `descr`, `log_index`, `vars`, `u_id_ref`)
        		SELECT `ref_id`,
            		(SELECT @a:=IF(@aid=ref_id,@a+1, IF( (SELECT @aid:=ref_id),0,0))) AS `ordi`,
            		`u_id`, `start_ts`, `stop_ts`, `module`, `descr`, `log_index`, `vars`, `u_id_ref` FROM `',table_namexs,
        		'` WHERE ref_id>',idx,' AND ref_id<=',(idx+5000),' AND log_index NOT IN(323,326,7653,7656,7650)
        		AND (SELECT @aid:=ref_id) AND (SELECT @a:=-1)=-1 -- default values
        		ORDER BY ref_id ASC, start_ts ASC');"
	);
    }
}
