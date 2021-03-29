<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.min.css">
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

        $firstname = filter_var(trim($_POST['firstname']), FILTER_SANITIZE_STRING);
        $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
        $pass2 = filter_var(trim($_POST['password_2']), FILTER_SANITIZE_STRING);
        $country = filter_var(trim($option[$_POST['country']]), FILTER_SANITIZE_STRING);
        $city = filter_var(trim($_POST['city']), FILTER_SANITIZE_STRING);
        $birthdate = filter_var(trim($_POST['birthdate']), FILTER_SANITIZE_STRING);
        $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_STRING);
        $descr = filter_var(trim($_POST['descr']), FILTER_SANITIZE_STRING);




        if ($_POST['do_signup']) {

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
            $user->city = $city;
            $user->work_activity = $work_activity;
            $user->keywords_profile = $keywords_profile;
            $user->birthdate = $birthdate;
            $user->gender = $gender;
            $user->descr = $descr;

            R::store($user);

            // Beta code
            header('Location: /chimu-app');
            }
        }



    } catch (Throwable $e) {
        echo $e;
    }
?>


    <form action="./register.php" method="POST">
        <div>
            <span>Имя</span>
            <input type="text" name="firstname" value="<?php @$_POST['firstname'] ?>">
        </div>
        <div>
            <span>Фамилия</span>
            <input type="text" name="lastname" value="<?php @$_POST['lastname'] ?>">
        </div>
        <div>
            <span>Email</span>
            <input type="email" name="email" value="<?php @$_POST['email'] ?>">
        </div>
        <div>
            <span>Пароль</span>
            <input type="password" name="password" value="<?php @$_POST['password'] ?>">
        </div>
        <div>
            <span>Подтвердите пароль</span>
            <input type="password" name="password_2" value="<?php @$_POST['password_2'] ?>">
        </div>


       <div>
           <span>Страна</span>
           <select name="country" id="mselectCountry" style="width: 300px;">
               <option value="AU">Австралия</option><option value="AT">Австрия</option><option value="AZ">Азербайджан</option><option value="AX">Аландские о-ва</option><option value="AL">Албания</option><option value="DZ">Алжир</option><option value="AS">Американское Самоа</option><option value="AI">Ангилья</option><option value="AO">Ангола</option><option value="AD">Андорра</option><option value="AQ">Антарктида</option><option value="AG">Антигуа и Барбуда</option><option value="AR">Аргентина</option><option value="AM">Армения</option><option value="AW">Аруба</option><option value="AF">Афганистан</option><option value="BS">Багамы</option><option value="BD">Бангладеш</option><option value="BB">Барбадос</option><option value="BH">Бахрейн</option><option value="BY">Беларусь</option><option value="BZ">Белиз</option><option value="BE">Бельгия</option><option value="BJ">Бенин</option><option value="BM">Бермудские о-ва</option><option value="BG">Болгария</option><option value="BO">Боливия</option><option value="BQ">Бонэйр, Синт-Эстатиус и Саба</option><option value="BA">Босния и Герцеговина</option><option value="BW">Ботсвана</option><option value="BR">Бразилия</option><option value="IO">Британская территория в Индийском океане</option><option value="BN">Бруней-Даруссалам</option><option value="BF">Буркина-Фасо</option><option value="BI">Бурунди</option><option value="BT">Бутан</option><option value="VU">Вануату</option><option value="VA">Ватикан</option><option value="GB">Великобритания</option><option value="HU">Венгрия</option><option value="VE">Венесуэла</option><option value="VG">Виргинские о-ва (Великобритания)</option><option value="VI">Виргинские о-ва (США)</option><option value="UM">Внешние малые о-ва (США)</option><option value="TL">Восточный Тимор</option><option value="VN">Вьетнам</option><option value="GA">Габон</option><option value="HT">Гаити</option><option value="GY">Гайана</option><option value="GM">Гамбия</option><option value="GH">Гана</option><option value="GP">Гваделупа</option><option value="GT">Гватемала</option><option value="GN">Гвинея</option><option value="GW">Гвинея-Бисау</option><option value="DE">Германия</option><option value="GG">Гернси</option><option value="GI">Гибралтар</option><option value="HN">Гондурас</option><option value="HK">Гонконг (САР)</option><option value="GD">Гренада</option><option value="GL">Гренландия</option><option value="GR">Греция</option><option value="GE">Грузия</option><option value="GU">Гуам</option><option value="DK">Дания</option><option value="JE">Джерси</option><option value="DJ">Джибути</option><option value="DM">Доминика</option><option value="DO">Доминиканская Республика</option><option value="EG">Египет</option><option value="ZM">Замбия</option><option value="EH">Западная Сахара</option><option value="ZW">Зимбабве</option><option value="IL">Израиль</option><option value="IN">Индия</option><option value="ID">Индонезия</option><option value="JO">Иордания</option><option value="IQ">Ирак</option><option value="IR">Иран</option><option value="IE">Ирландия</option><option value="IS">Исландия</option><option value="ES">Испания</option><option value="IT">Италия</option><option value="YE">Йемен</option><option value="CV">Кабо-Верде</option><option value="KZ">Казахстан</option><option value="KH">Камбоджа</option><option value="CM">Камерун</option><option value="CA">Канада</option><option value="QA">Катар</option><option value="KE">Кения</option><option value="CY">Кипр</option><option value="KG">Киргизия</option><option value="KI">Кирибати</option><option value="CN">Китай</option><option value="KP">КНДР</option><option value="CC">Кокосовые о-ва</option><option value="CO">Колумбия</option><option value="KM">Коморы</option><option value="CG">Конго - Браззавиль</option><option value="CD">Конго - Киншаса</option><option value="CR">Коста-Рика</option><option value="CI">Кот-д&rsquo;Ивуар</option><option value="CU">Куба</option><option value="KW">Кувейт</option><option value="CW">Кюрасао</option><option value="LA">Лаос</option><option value="LV">Латвия</option><option value="LS">Лесото</option><option value="LR">Либерия</option><option value="LB">Ливан</option><option value="LY">Ливия</option><option value="LT">Литва</option><option value="LI">Лихтенштейн</option><option value="LU">Люксембург</option><option value="MU">Маврикий</option><option value="MR">Мавритания</option><option value="MG">Мадагаскар</option><option value="YT">Майотта</option><option value="MO">Макао (САР)</option><option value="MW">Малави</option><option value="MY">Малайзия</option><option value="ML">Мали</option><option value="MV">Мальдивы</option><option value="MT">Мальта</option><option value="MA">Марокко</option><option value="MQ">Мартиника</option><option value="MH">Маршалловы Острова</option><option value="MX">Мексика</option><option value="MZ">Мозамбик</option><option value="MD">Молдова</option><option value="MC">Монако</option><option value="MN">Монголия</option><option value="MS">Монтсеррат</option><option value="MM">Мьянма (Бирма)</option><option value="NA">Намибия</option><option value="NR">Науру</option><option value="NP">Непал</option><option value="NE">Нигер</option><option value="NG">Нигерия</option><option value="NL">Нидерланды</option><option value="NI">Никарагуа</option><option value="NU">Ниуэ</option><option value="NZ">Новая Зеландия</option><option value="NC">Новая Каледония</option><option value="NO">Норвегия</option><option value="BV">о-в Буве</option><option value="IM">о-в Мэн</option><option value="NF">о-в Норфолк</option><option value="CX">о-в Рождества</option><option value="SH">о-в Св. Елены</option><option value="PN">о-ва Питкэрн</option><option value="TC">о-ва Тёркс и Кайкос</option><option value="HM">о-ва Херд и Макдональд</option><option value="AE">ОАЭ</option><option value="OM">Оман</option><option value="KY">Острова Кайман</option><option value="CK">Острова Кука</option><option value="PK">Пакистан</option><option value="PW">Палау</option><option value="PS">Палестинские территории</option><option value="PA">Панама</option><option value="PG">Папуа &mdash; Новая Гвинея</option><option value="PY">Парагвай</option><option value="PE">Перу</option><option value="PL">Польша</option><option value="PT">Португалия</option><option value="PR">Пуэрто-Рико</option><option value="KR">Республика Корея</option><option value="RE">Реюньон</option><option value="RU">Россия</option><option value="RW">Руанда</option><option value="RO">Румыния</option><option value="SV">Сальвадор</option><option value="WS">Самоа</option><option value="SM">Сан-Марино</option><option value="ST">Сан-Томе и Принсипи</option><option value="SA">Саудовская Аравия</option><option value="MK">Северная Македония</option><option value="MP">Северные Марианские о-ва</option><option value="SC">Сейшельские Острова</option><option value="BL">Сен-Бартелеми</option><option value="MF">Сен-Мартен</option><option value="PM">Сен-Пьер и Микелон</option><option value="SN">Сенегал</option><option value="VC">Сент-Винсент и Гренадины</option><option value="KN">Сент-Китс и Невис</option><option value="LC">Сент-Люсия</option><option value="RS">Сербия</option><option value="SG">Сингапур</option><option value="SX">Синт-Мартен</option><option value="SY">Сирия</option><option value="SK">Словакия</option><option value="SI">Словения</option><option value="US">Соединенные Штаты</option><option value="SB">Соломоновы Острова</option><option value="SO">Сомали</option><option value="SD">Судан</option><option value="SR">Суринам</option><option value="SL">Сьерра-Леоне</option><option value="TJ">Таджикистан</option><option value="TH">Таиланд</option><option value="TW">Тайвань</option><option value="TZ">Танзания</option><option value="TG">Того</option><option value="TK">Токелау</option><option value="TO">Тонга</option><option value="TT">Тринидад и Тобаго</option><option value="TV">Тувалу</option><option value="TN">Тунис</option><option value="TM">Туркменистан</option><option value="TR">Турция</option><option value="UG">Уганда</option><option value="UZ">Узбекистан</option><option value="UA">Украина</option><option value="WF">Уоллис и Футуна</option><option value="UY">Уругвай</option><option value="FO">Фарерские о-ва</option><option value="FM">Федеративные Штаты Микронезии</option><option value="FJ">Фиджи</option><option value="PH">Филиппины</option><option value="FI">Финляндия</option><option value="FK">Фолклендские о-ва</option><option value="FR">Франция</option><option value="GF">Французская Гвиана</option><option value="PF">Французская Полинезия</option><option value="TF">Французские Южные территории</option><option value="HR">Хорватия</option><option value="CF">Центрально-Африканская Республика</option><option value="TD">Чад</option><option value="ME">Черногория</option><option value="CZ">Чехия</option><option value="CL">Чили</option><option value="CH">Швейцария</option><option value="SE">Швеция</option><option value="SJ">Шпицберген и Ян-Майен</option><option value="LK">Шри-Ланка</option><option value="EC">Эквадор</option><option value="GQ">Экваториальная Гвинея</option><option value="ER">Эритрея</option><option value="SZ">Эсватини</option><option value="EE">Эстония</option><option value="ET">Эфиопия</option><option value="GS">Южная Георгия и Южные Сандвичевы о-ва</option><option value="ZA">Южно-Африканская Республика</option><option value="SS">Южный Судан</option><option value="JM">Ямайка</option><option value="JP">Япония</option>
           </select>
       </div>
        <div>
            <span>Город</span>
            <select name="city" id="mselectCity" style="width: 300px;">
                    <option value=""></option>
                    <option value="Астана">Астана</option>
                    <option value="Актау">Актау</option>
                    <option value="Атырау">Атырау</option>
                    <option value="Алматы">Алматы</option>
                    <option value="Актобе">Алматы</option>
            </select>
        </div>
        <div>
            <span>Сфера деятельности</span>
            <select name="work_activity[]" id="mselectWork" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <option value="#iOS">#iOS</option>
                    <option value="#Java">#Java</option>
                    <option value="#PHP">#PHP</option>
                </optgroup>
            </select>
        </div>
        <div>
            <span>Ключевые слова (Теги)</span>
            <select name="keywords_profile[]" id="mselectKeywords" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <option value="#iOS">#iOS</option>
                    <option value="#Java">#Java</option>
                    <option value="#PHP">#PHP</option>
                </optgroup>
            </select>
        </div>
        <div>
            <span>Дата рождения</span>
            <input type="date" name="birthdate" value="<?php @$_POST['birthdate'] ?>">
        </div>
        <div>
            <span>Пол</span>
            <select name="gender" id="mselectGender" style="width: 300px;">
                    <option value="Выберите" disabled>Выберите</option>
                    <option value="Мужчина">Мужчина</option>
                    <option value="Женщина">Женщина</option>
                    <option value="Другое">Другое</option>
            </select>
        </div>
        <div>
            <span>Описание</span>
            <textarea name="descr" value="<?php @$_POST['descr'] ?>"></textarea>
        </div>
        <div>
            <button type="submit" value="register" name="do_signup">Зарегистрироваться</button>
        </div>
    </form>

    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#mselectCountry').chosen();
            $('#mselectCity').chosen();
            $('#mselectWork').chosen();
            $('#mselectKeywords').chosen();
        });
    </script>
</body>
</html>