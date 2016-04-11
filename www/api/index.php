<?php
/**
 * Created by PhpStorm.
 * User => planet17
 * Date => 08.04.16
 * Time => 23:50
 */
$list = [
    (object)([
        "country" => "Украина",
        "city" => "Одесса",
        "address" => "Адмиральский проспект",
        "filtersData" => ([
            "name" => "clickky family clickkyfamily.com",
            "position" => "php middle developer",
            "location" => "украина одесса адмиральский проспект"
        ]),
        "name" => "Clickky Family",
        "link" => "clickkyfamily.com",
        "r_link" => "http://www.clickkyfamily.com",
        "image" => "c_family.png",
        "short_info" => "Неудачно",
        "mp" => 100,
        "rating_position" => 1,
        "season" => "55687957be03898545bf7fd5",
        "position" => "PHP Middle Developer",
        "id" => 5
    ]), (object)([
        "country" => "Украина",
        "city" => "Одесса",
        "address" => "Трц Афина",
        "filterData" => ([
            "name" => "cqr. seo&security family cqr.com.ua",
            "position" => "full stack developer",
            "location" => "украина одесса трц афина"
        ]),
        "name" => "CQR. Seo&Security",
        "link" => "cqr.com.ua",
        "r_link" => "http://cqr.com.ua",
        "image" => "cqr.com.ua.jpg",
        "short_info" => "> 2 лет",
        "mp" => 50,
        "rating_position" => 2,
        "technology" => "55687957be03898545bf7fd5",
        "position" => "Full Stack Developer",
        "id" => 6
    ]), (object)([
        "filterData" => ([
            "name" => "cqr. seo&security family cqr.com.ua",
            "position" => "full stack developer",
            "location" => "украина одесса трц афина"
        ]),
    ])
];

header('Content-type:application/json;charset=utf-8');
echo json_encode(["total" => count($list), "count" => count($list), "list" => $list]);
exit();
?>

<?php
$pathHome = __DIR__ . '/../../home';
// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
require($pathHome . '/myLittleHelper/dir.php');
require($pathHome . '/yii2/vendor/autoload.php');
require($pathHome . '/yii2/vendor/yiisoft/yii2/Yii.php');
$config = require($pathHome . '/apps/rest/config/main.php');
(new yii\web\Application($config))->run();