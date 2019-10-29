<?php
header('Content-Type: text/html; charset=utf-8');
function check_word($text)
{
    require_once '../vendor/cijic/phpmorphy/libs/phpmorphy/src/common.php'; // Подключение файла common.php
    $dir = "../vendor/cijic/phpmorphy/libs/phpmorphy/dicts"; // путь к каталогу со словарями
    $lang = 'ru_RU'; // для какого языка указывается словарь

    // Использование опции PHPMORPHY_STORAGE_FILE - использует файловые операции. 
    // Потребляется небольшое количество памяти. Самый медленный способ, однако, работает в любом окружении
    $opts = array(
        'storage' => PHPMORPHY_STORAGE_FILE,
        );

    // создание экземпляра класса phpMorphy    
    try {
        $morphy = new phpMorphy($dir, $lang, $opts);
    } catch(phpMorphy_Exception $e) {
        die('Error occured while creating phpMorphy instance: ' . $e->getMessage());
    }

    $words = array("проект", "сторона", "роль"); // массив слов для проверки

    $all_array = array(); // объявление обширного массива слов для проверки
    for($i = 0; $i < count($words); $i++)
    {
        $str = mb_convert_case($words[$i], MB_CASE_UPPER, "UTF-8"); // перевод в верхний регистр
        $result = $morphy->getAllForms($str); // В $result помещаются все формы для слов $str

        if(!empty($result))
        {
            foreach ($result as $res)
            {   
                array_push($all_array, $res); // запись однокоренных слов в новый массив
            }
        }
    }

    $text_arr = explode(" ", $text); // разбиение строки на слова
    for($i = 0; $i < count($text_arr); $i++)
    {
        for($j = 0; $j < count($all_array); $j++)
        {
            $text_up = mb_convert_case($text_arr[$i], MB_CASE_UPPER, "UTF-8"); // перевод в верхний регистр слов
            if($text_up == $all_array[$j]) // проверка на наличии нужных слов
            {
                $symbol_arr = preg_split('//u', $text_arr[$i], -1, PREG_SPLIT_NO_EMPTY);
                $new_word = str_repeat("*", count($symbol_arr)); // замена символов на *
                $text_arr[$i] = $new_word; 
            }
        }
    }
    return $new_text = implode(" ", $text_arr); // объединение слов в строку
}

