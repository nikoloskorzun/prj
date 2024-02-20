<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $word = $_GET['text'];
    echo 'Переведенное слово: ' . translate2english($word);
}



function translate2english($word) 
{
    $data = array(
        'q' => $word,
        'source' => 'auto',
        'target' => 'en',
        'format' => 'text',
        'api_key' => ''
    );
    
    $postdata = http_build_query($data);

    // Создаем контекст с параметрами запроса
    $context = stream_context_create(array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    ));
    
    // Выполняем запрос и получаем ответ
    $result = file_get_contents('http://translator:5000/translate', false, $context);
    
    // Выводим ответ
    return json_decode($result, true)['translatedText'];
    
}

