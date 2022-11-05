<?php

namespace console\controllers;

use Yii;

class RbacController extends \yii\console\Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // add "updateUser" permission
        $updateUser = $auth->createPermission('update');
        $updateUser->description = 'Update user';
        $auth->add($updateUser);

        // add "delete" permission
        $delete = $auth->createPermission('delete');
        $delete->description = 'Delete ability';
        $auth->add($delete);

        // add "author" role and give this role the "updateUser" permission
        $manager = $auth->createRole('manager');
        $auth->add($manager);
        $auth->addChild($manager, $updateUser);

        // add "admin" role and give this role the "delete" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $delete);
        $auth->addChild($admin, $manager);
    }

}
