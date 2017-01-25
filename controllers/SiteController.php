<?php
include_once (ROOT.'/models/Product.php');
include_once (ROOT.'/models/Category.php');

/**
 * Контроллер SiteController
 */
class SiteController
{
    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = array();
        $categories = Category::getCategoriesList();


        // Список последних товаров
        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(Product::SHOW_BY_DEFAULT);

        //список товаров для слайдера
        //$sliderProducts = array();
        $sliderProducts = Product::getRecommendedProducts();

        // Подключаем вид
        require_once (ROOT.'/views/site/index.php');

        return true;
    }
    /**
     * Action для страницы "Контакты"
     */
    public function actionContact()
    {

        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору
                $adminEmail = 'php.start@mail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }

    /**
     * Action для страницы "О магазине"
     */
    public function actionAbout()
    {
        // Подключаем вид
        require_once(ROOT . '/views/site/about.php');
        return true;
    }


}