<?php

namespace e282486518\migration;

use Yii;
use yii\console\Exception;
use yii\helpers\Console;
use yii\helpers\ArrayHelper;

/**
 * This is just an example.
 */
class ConsoleController extends BaseController
{
    /**
     * Creates a new migration. php yii migrate/create all
     * 
     * @param string $name 
     * @throws Exception if the name argument is invalid.
     */
    public function actionCreate($name){
        /* 所有数据表 */
        $alltables  = Yii::$app->db->createCommand('SHOW TABLE STATUS')->queryAll();
        $alltables  = array_map('array_change_key_case', $alltables);
        $alltables  = ArrayHelper::getColumn($alltables, 'name');

        /* 备份所有数据 */
        $name = trim($name,',');
        if ($name == 'all') {
            $tables  = $alltables;
        } else if(strpos($name, ',')){
            $tables = explode(',', $name);
        } else {
            $tables = [$name];
        }
        /* 检查表是否存在 */
        foreach ($tables as $table) {
            if (!in_array($table,$alltables)) {
                $this->stdout($table." table no find...\n", Console::FG_RED);
                die();
            }
        }
        /* 创建migration */
        foreach ($tables as $table) {
            $this->create($table);
        }

        $this->stdout("backup success.\n", Console::FG_GREEN);
    }
}
