<?php
//###############################################################
use artemy\MySQL;
use artemy\UserInfo;
include_once "../artemy_helpers/cooler_helpers.php";
include_once "../artemy_helpers/UserInfo.php";
include_once "../artemy_helpers/CategoriesInfo.php";
include_once "../artemy_helpers/ImageCoder.php";
include_once "../artemy_helpers/ImageCoderExceptions/FileNotImageException.php";
include_once "../artemy_helpers/ImageCoderExceptions/FileNotFoundException.php";
include_once "../artemy_helpers/ImageCoderExceptions/FileUploadException.php";
include_once "../artemy_helpers/ImageCoderExceptions/MaxFileSizeException.php";

$_POST["DBname"] = "u1184374_second_company_bd";
$_POST["token"] = "lera_token";
$link = \artemy_helper\getLink($_POST["DBname"]);
$user = new UserInfo($link, $_POST["token"]);
//$user->checkAccess(UserInfo::ACCESS_LEVEL_ADMIN);
//###############################################################


$email = $_POST["email"];
$password = $_POST["password"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$phone_number = $_POST["phone_number"];
$categories = json_decode($_POST["set_categories_list"]);
$new_categories = json_decode($_POST["add_new_categories_list"]);
$role = $_POST["role"] === '3' ? 3 : ($_POST["role"] === '4' ? 4 : die("wrong role"));

//##############   Добавление новых категорий   #################
if ($new_categories !== null){
    foreach ($new_categories as $new_category){
        $insert_id = CategoriesInfo::addNew(\artemy_helper\getLink("u1184374_second_company_bd"), $new_category);
        array_push($categories, $insert_id);
    }
}
$categories = json_encode($categories);

//################   Подготовка изображения   ###################
const MAX_FILE_SIZE = 6291456;
$image = new ImageCoder("image", MAX_FILE_SIZE);
try {
    $encoded_image = mysqli_real_escape_string($link, $image->encode());
} catch (Exception $e) {
    die($e->getMessage());
}
$mime_image = mysqli_real_escape_string($link, $image->getMimeType());

//###################   Генерация токена    #####################
$token = \artemy_helper\generateToken();

//###########   Добавление нового сисадмина в БД   ##############
MySQL::insert($link, "Users_AdminsSysadmins", "name, surname, password, token, logo, logo_mime_type, categoriesJSON, email", "'$name', '$surname', '$password', '$token', '$encoded_image', '$mime_image', '$categories', '$email'");