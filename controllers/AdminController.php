<?php
/**
 *контроллер  AdminController
 *главная страница в админпанели
 */
class AdminController extends AdminBase
{
    /**
     * Action для стартовой страницы в панели администратора
     */
    public function actionIndex()
    {
        //проверка доступа
        self::checkAdmin();

        //подключаем вид
        require_once (ROOT.'/views/admin/index.php');
        return true;
    }

}