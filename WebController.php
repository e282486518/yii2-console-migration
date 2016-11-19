<?php

namespace e282486518\migration;

use Yii;
use yii\console\Exception;
use yii\helpers\Console;


/**
 * This is just an example.
 */
class WebController extends BaseController
{
    /**
     * Creates a new migration. php yii migrate/create all
     * 
     * @param string $name  
     * @throws Exception if the name argument is invalid.
     */
    public function actionCreate($name){
        if (!preg_match('/^\w+$/', $name)) {
            throw new Exception('The migration name should contain letters, digits and/or underscore characters only.');
        }
        /* 备份所有数据 */
        if ($name == 'all') {
            # 
        }
        $this->stdout("backup success.\n", Console::FG_GREEN);
    }
}
