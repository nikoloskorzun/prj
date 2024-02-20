

<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    $action = $_GET['action'];
    $fn = "test.txt";
    switch ($action) {
        case 'create':
            $N = $_GET['N'];

            if(create_textfile($fn, $N))
                print_file($fn);
            else
                echo "Ошибка в создании файла";
            break;

        case 'add':
            $N = $_GET['N'];
            if(append_lines_in_file($fn, $N))
                echo "Строки добавлены в файл";
            else
            echo "Ошибка в добавлении строк в файл";

            break;
        case 'output':
            if(!print_file($fn))
                echo "Ошибка в выводе файла";
            break;
        default:
            echo "Не те параметры";
            break;
    }

    
}



function create_textfile($filename, $linesCount)
{
    if ($linesCount <=  0) 
    {
        return false;
    }

    $file = fopen($filename, 'w');
    if (!$file) 
    {
        return false;
    }

    for ($i =  1; $i <= $linesCount; $i++) 
    {
        $line = "line # $i\n";
        fwrite($file, $line);
    }

    
    fclose($file);

    return true;
}


function print_file($filename) 
{
    
    if (!file_exists($filename)) 
    {
        return false;
    }

    $contents = file_get_contents($filename);
    if ($contents === false) 
    {
        return false;
    }

    echo nl2br($contents);

    return true;
}



function append_lines_in_file($filename, $lines_count) 
{
    if ($lines_count <=  0) 
    {
        return false;
    }

    $file = fopen($filename, 'a');
    if (!$file)
    {
        return false;
    }

    for ($i =  1; $i <= $lines_count; $i++) 
    {
        $line = "line # $i\n";
        fwrite($file, $line);
    }

    fclose($file);

    return true;
}