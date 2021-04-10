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
               <?php
               $tagsCountry = R::findAll('TBLCountries');

               foreach ($tagsCountry as $tag) {



                       ?>
                       <option value="<?=$tag->country_name?>"><?=$tag->country_name?></option>
                       <?php

               }
               ?>
           </select>
       </div>
        <div>
            <span>Город</span>
            <select name="city" id="mselectCity" style="width: 300px;">
                <?php
                $tagsCity = R::findAll('TBLCity');
                foreach ($tagsCity as $tag) {
                        ?>
                        <option value="<?=$tag->city_name?>"><?=$tag->city_name?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div>
            <span>Сфера деятельности</span>

                <select name="work_activity[]" id="mselectWork" multiple="" style="width: 300px;">
                    <?php


                    $work_tags = R::findAll('TBLWorkActivity');



                    foreach ($work_tags as $tag) {
                            ?>
                            <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                            <?php


                    }

                    ?>
                </select>

        </div>
        <div>
            <span>Ключевые слова (Теги)</span>
            <select name="keywords_profile[]" id="mselectKeywords" multiple="" style="width: 300px;">
                <optgroup label="Программирование">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "prog") {

                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php

                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Дизайн">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "design") {



                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php

                        }
                    }

                    ?>
                </optgroup>
                <optgroup label="Другое">
                    <?php
                    $tags = R::findAll('TBLTags');

                    foreach ($tags as $tag) {
                        if ($tag->type == "" ) {


                                ?>
                                <option value="<?=$tag->name_tag?>"><?=$tag->name_tag?></option>
                                <?php
                            }

                    }

                    ?>
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