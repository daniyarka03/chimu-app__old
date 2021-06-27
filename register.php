<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.css">
    <link rel="stylesheet" href="css/register.css">
    <title>Register page</title>
</head>
<body>

<?php
    try {
        require "php/includes/db.php";

        $option =  array (
            'AU' => 'Австралия',
            'AT' => 'Австрия',
            'AZ' => 'Азербайджан',
            'AX' => 'Аландские о-ва',
            'AL' => 'Албания',
            'DZ' => 'Алжир',
            'AS' => 'Американское Самоа',
            'AI' => 'Ангилья',
            'AO' => 'Ангола',
            'AD' => 'Андорра',
            'AQ' => 'Антарктида',
            'AG' => 'Антигуа и Барбуда',
            'AR' => 'Аргентина',
            'AM' => 'Армения',
            'AW' => 'Аруба',
            'AF' => 'Афганистан',
            'BS' => 'Багамы',
            'BD' => 'Бангладеш',
            'BB' => 'Барбадос',
            'BH' => 'Бахрейн',
            'BY' => 'Беларусь',
            'BZ' => 'Белиз',
            'BE' => 'Бельгия',
            'BJ' => 'Бенин',
            'BM' => 'Бермудские о-ва',
            'BG' => 'Болгария',
            'BO' => 'Боливия',
            'BQ' => 'Бонэйр, Синт-Эстатиус и Саба',
            'BA' => 'Босния и Герцеговина',
            'BW' => 'Ботсвана',
            'BR' => 'Бразилия',
            'IO' => 'Британская территория в Индийском океане',
            'BN' => 'Бруней-Даруссалам',
            'BF' => 'Буркина-Фасо',
            'BI' => 'Бурунди',
            'BT' => 'Бутан',
            'VU' => 'Вануату',
            'VA' => 'Ватикан',
            'GB' => 'Великобритания',
            'HU' => 'Венгрия',
            'VE' => 'Венесуэла',
            'VG' => 'Виргинские о-ва (Великобритания)',
            'VI' => 'Виргинские о-ва (США)',
            'UM' => 'Внешние малые о-ва (США)',
            'TL' => 'Восточный Тимор',
            'VN' => 'Вьетнам',
            'GA' => 'Габон',
            'HT' => 'Гаити',
            'GY' => 'Гайана',
            'GM' => 'Гамбия',
            'GH' => 'Гана',
            'GP' => 'Гваделупа',
            'GT' => 'Гватемала',
            'GN' => 'Гвинея',
            'GW' => 'Гвинея-Бисау',
            'DE' => 'Германия',
            'GG' => 'Гернси',
            'GI' => 'Гибралтар',
            'HN' => 'Гондурас',
            'HK' => 'Гонконг (САР)',
            'GD' => 'Гренада',
            'GL' => 'Гренландия',
            'GR' => 'Греция',
            'GE' => 'Грузия',
            'GU' => 'Гуам',
            'DK' => 'Дания',
            'JE' => 'Джерси',
            'DJ' => 'Джибути',
            'DM' => 'Доминика',
            'DO' => 'Доминиканская Республика',
            'EG' => 'Египет',
            'ZM' => 'Замбия',
            'EH' => 'Западная Сахара',
            'ZW' => 'Зимбабве',
            'IL' => 'Израиль',
            'IN' => 'Индия',
            'ID' => 'Индонезия',
            'JO' => 'Иордания',
            'IQ' => 'Ирак',
            'IR' => 'Иран',
            'IE' => 'Ирландия',
            'IS' => 'Исландия',
            'ES' => 'Испания',
            'IT' => 'Италия',
            'YE' => 'Йемен',
            'CV' => 'Кабо-Верде',
            'KZ' => 'Казахстан',
            'KH' => 'Камбоджа',
            'CM' => 'Камерун',
            'CA' => 'Канада',
            'QA' => 'Катар',
            'KE' => 'Кения',
            'CY' => 'Кипр',
            'KG' => 'Киргизия',
            'KI' => 'Кирибати',
            'CN' => 'Китай',
            'KP' => 'КНДР',
            'CC' => 'Кокосовые о-ва',
            'CO' => 'Колумбия',
            'KM' => 'Коморы',
            'CG' => 'Конго - Браззавиль',
            'CD' => 'Конго - Киншаса',
            'CR' => 'Коста-Рика',
            'CI' => 'Кот-д’Ивуар',
            'CU' => 'Куба',
            'KW' => 'Кувейт',
            'CW' => 'Кюрасао',
            'LA' => 'Лаос',
            'LV' => 'Латвия',
            'LS' => 'Лесото',
            'LR' => 'Либерия',
            'LB' => 'Ливан',
            'LY' => 'Ливия',
            'LT' => 'Литва',
            'LI' => 'Лихтенштейн',
            'LU' => 'Люксембург',
            'MU' => 'Маврикий',
            'MR' => 'Мавритания',
            'MG' => 'Мадагаскар',
            'YT' => 'Майотта',
            'MO' => 'Макао (САР)',
            'MW' => 'Малави',
            'MY' => 'Малайзия',
            'ML' => 'Мали',
            'MV' => 'Мальдивы',
            'MT' => 'Мальта',
            'MA' => 'Марокко',
            'MQ' => 'Мартиника',
            'MH' => 'Маршалловы Острова',
            'MX' => 'Мексика',
            'MZ' => 'Мозамбик',
            'MD' => 'Молдова',
            'MC' => 'Монако',
            'MN' => 'Монголия',
            'MS' => 'Монтсеррат',
            'MM' => 'Мьянма (Бирма)',
            'NA' => 'Намибия',
            'NR' => 'Науру',
            'NP' => 'Непал',
            'NE' => 'Нигер',
            'NG' => 'Нигерия',
            'NL' => 'Нидерланды',
            'NI' => 'Никарагуа',
            'NU' => 'Ниуэ',
            'NZ' => 'Новая Зеландия',
            'NC' => 'Новая Каледония',
            'NO' => 'Норвегия',
            'BV' => 'о-в Буве',
            'IM' => 'о-в Мэн',
            'NF' => 'о-в Норфолк',
            'CX' => 'о-в Рождества',
            'SH' => 'о-в Св. Елены',
            'PN' => 'о-ва Питкэрн',
            'TC' => 'о-ва Тёркс и Кайкос',
            'HM' => 'о-ва Херд и Макдональд',
            'AE' => 'ОАЭ',
            'OM' => 'Оман',
            'KY' => 'Острова Кайман',
            'CK' => 'Острова Кука',
            'PK' => 'Пакистан',
            'PW' => 'Палау',
            'PS' => 'Палестинские территории',
            'PA' => 'Панама',
            'PG' => 'Папуа — Новая Гвинея',
            'PY' => 'Парагвай',
            'PE' => 'Перу',
            'PL' => 'Польша',
            'PT' => 'Португалия',
            'PR' => 'Пуэрто-Рико',
            'KR' => 'Республика Корея',
            'RE' => 'Реюньон',
            'RU' => 'Россия',
            'RW' => 'Руанда',
            'RO' => 'Румыния',
            'SV' => 'Сальвадор',
            'WS' => 'Самоа',
            'SM' => 'Сан-Марино',
            'ST' => 'Сан-Томе и Принсипи',
            'SA' => 'Саудовская Аравия',
            'MK' => 'Северная Македония',
            'MP' => 'Северные Марианские о-ва',
            'SC' => 'Сейшельские Острова',
            'BL' => 'Сен-Бартелеми',
            'MF' => 'Сен-Мартен',
            'PM' => 'Сен-Пьер и Микелон',
            'SN' => 'Сенегал',
            'VC' => 'Сент-Винсент и Гренадины',
            'KN' => 'Сент-Китс и Невис',
            'LC' => 'Сент-Люсия',
            'RS' => 'Сербия',
            'SG' => 'Сингапур',
            'SX' => 'Синт-Мартен',
            'SY' => 'Сирия',
            'SK' => 'Словакия',
            'SI' => 'Словения',
            'US' => 'Соединенные Штаты',
            'SB' => 'Соломоновы Острова',
            'SO' => 'Сомали',
            'SD' => 'Судан',
            'SR' => 'Суринам',
            'SL' => 'Сьерра-Леоне',
            'TJ' => 'Таджикистан',
            'TH' => 'Таиланд',
            'TW' => 'Тайвань',
            'TZ' => 'Танзания',
            'TG' => 'Того',
            'TK' => 'Токелау',
            'TO' => 'Тонга',
            'TT' => 'Тринидад и Тобаго',
            'TV' => 'Тувалу',
            'TN' => 'Тунис',
            'TM' => 'Туркменистан',
            'TR' => 'Турция',
            'UG' => 'Уганда',
            'UZ' => 'Узбекистан',
            'UA' => 'Украина',
            'WF' => 'Уоллис и Футуна',
            'UY' => 'Уругвай',
            'FO' => 'Фарерские о-ва',
            'FM' => 'Федеративные Штаты Микронезии',
            'FJ' => 'Фиджи',
            'PH' => 'Филиппины',
            'FI' => 'Финляндия',
            'FK' => 'Фолклендские о-ва',
            'FR' => 'Франция',
            'GF' => 'Французская Гвиана',
            'PF' => 'Французская Полинезия',
            'TF' => 'Французские Южные территории',
            'HR' => 'Хорватия',
            'CF' => 'Центрально-Африканская Республика',
            'TD' => 'Чад',
            'ME' => 'Черногория',
            'CZ' => 'Чехия',
            'CL' => 'Чили',
            'CH' => 'Швейцария',
            'SE' => 'Швеция',
            'SJ' => 'Шпицберген и Ян-Майен',
            'LK' => 'Шри-Ланка',
            'EC' => 'Эквадор',
            'GQ' => 'Экваториальная Гвинея',
            'ER' => 'Эритрея',
            'SZ' => 'Эсватини',
            'EE' => 'Эстония',
            'ET' => 'Эфиопия',
            'GS' => 'Южная Георгия и Южные Сандвичевы о-ва',
            'ZA' => 'Южно-Африканская Республика',
            'SS' => 'Южный Судан',
            'JM' => 'Ямайка',
            'JP' => 'Япония',
        );
        

        $firstname = filter_var(trim($_POST['firstname'] ?? ""), FILTER_SANITIZE_STRING);
        $lastname = filter_var(trim($_POST['lastname'] ?? ""), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email'] ?? ""), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password'] ?? ""), FILTER_SANITIZE_STRING);
        $pass2 = filter_var(trim($_POST['password_2'] ?? ""), FILTER_SANITIZE_STRING);
        $country = filter_var(trim($_POST['country'] ?? ""), FILTER_SANITIZE_STRING);
        // $city = filter_var(trim($_POST['city'] ?? ""), FILTER_SANITIZE_STRING);
        $birthdate = filter_var(trim($_POST['birthdate'] ?? ""), FILTER_SANITIZE_STRING);
        $gender = filter_var(trim($_POST['gender'] ?? ""), FILTER_SANITIZE_STRING);
        $descr = filter_var(trim($_POST['descr'] ?? ""), FILTER_SANITIZE_STRING);

        // $social_media_vk = filter_var(trim($_POST['social_media_vk'] ?? ""), FILTER_SANITIZE_STRING);
        // $social_media_facebook = filter_var(trim($_POST['social_media_facebook'] ?? ""), FILTER_SANITIZE_STRING);
        $social_media_instagram = filter_var(trim($_POST['social_media_instagram'] ?? ""), FILTER_SANITIZE_STRING);
        $social_media_telegram = filter_var(trim($_POST['social_media_telegram'] ?? ""), FILTER_SANITIZE_STRING);

        $profile_photo_id = uniqid(rand(), true);
        $profile_photo_item = R::findAll('users');
        foreach ($profile_photo_item as $item) {
            if ($item->avatar == $profile_photo_id) {
                $profile_photo_id = uniqid(rand(), true);
            }
        }

        $fileExt = pathinfo($_FILES['file']['name'] ?? "", PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['file']['tmp_name'] ?? "", "uploades/profile_photo/".$profile_photo_id.'.'.$fileExt);

        

        if ($_POST['do_signup'] ?? "") {


            if ($pass != $pass2) {
                echo 'Пароли не совпадают!';
            } else {

            $work_activity = implode(', ', $_REQUEST['work_activity']);
            $keywords_profile = implode(', ', $_REQUEST['keywords_profile']);
            $id = uniqid(rand(), true);

            $users = R::findAll('users');
            foreach ($users as $item) {
                if ($item->id_user == $id) {
                    $id = uniqid(rand(), true);
                }
            }

            $user = R::dispense('users');
            $user->id_user = $id;
            $user->first_name = $firstname;
            $user->last_name = $lastname;
            $user->email = $email;
            $user->pass = password_hash($pass, PASSWORD_DEFAULT);
            $user->country = $country;
            // $user->city = $city;
            $user->work_activity = $work_activity;
            $user->keywords_profile = $keywords_profile;
            $user->birthdate = $birthdate;
            $user->gender = $gender;
            $user->descr = $descr;
            // $user->social_media_vk = $social_media_vk;
            // $user->social_media_facebook = $social_media_facebook;
            $user->social_media_instagram = $social_media_instagram;
            $user->social_media_telegram = $social_media_telegram;
            $user->avatar = $profile_photo_id.'.'.$fileExt;

            R::store($user);

            setcookie('temporary_email', $email, time() + 120, "/");
            header('Location: login');
            }
        }



    } catch (Throwable $e) {
        echo $e;
    }
?>
   
    <form action="./register.php" method="POST" enctype="multipart/form-data">
        <?php include 'php/components/register_user/step_1.php' ?>    
        <?php include 'php/components/register_user/step_2.php' ?>    
        <?php include 'php/components/register_user/step_3.php' ?>    
        <?php include 'php/components/register_user/step_4.php' ?>    
    </form>

    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>
    <script src="js/inputs.js"></script>
    <script>
            const block = document.querySelectorAll(`.section-register`);
            const button = document.querySelectorAll(`.section-register__button_next`);
            const button_back = document.querySelectorAll(`.section-register__button_back`);
            const require_input = document.querySelectorAll('.require');
            
    </script>
    <script src="js/multiple_windows.js"></script>
    <script>

    // step_function(4, block, button, button_back, 5, 4, 1);
    // step_function(4, block, button, button_back);

        $(document).ready(function(){
            $('#mselectCountry').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_single: "Страна проживания", allow_single_deselect: true});
            $('#mselectCity').chosen();
            $('#mselectWork').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_multiple: "Интересующая область"});
            $('#mselectKeywords').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_multiple: "Навыки"});
            $('#mselectGender').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_single: "Выберите пол"});
        });

    </script>
    <script src="js/register.js"></script>
</body>
</html>