<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $action = $_POST['action'];


    
    switch ($action) {
        case 'multiplicationTable':
            $result = generate_multiplication_table();
            break;
        case 'oddSum':
            $result = calculate_odd_sums();
            break;
        default:
            $result = "unknown action";
    }
    echo  $result;



}
/* elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $switchAction = $_GET['switchAction'];
    switch ($switchAction) {
        case 'createFile':
            createFile();
            break;
        case 'addTextToFile':
            addTextToFile();
            break;
        case 'displayFile':
            displayFile();
            break;
        default:
            echo "Неизвестное действие";
    }
}
*/
function generate_multiplication_table() 
{
    $output = "<table border='1'>\n";
    $output .= "<tr><th>*</th>";

    for ($i = 1; $i <= 10; $i++) 
    {
        $output .= "<th>" . $i . "</th>";
    }
    $output .= "</tr>\n";

    for ($row = 1; $row <= 10; $row++)
    {
        $output .= "<tr><th>" . $row . "</th>";
        for ($col = 1; $col <= 10; $col++) 
        {
            $product = $row * $col;
            $output .= "<td>" . $product . "</td>";
        }
        $output .= "</tr>\n";
    }
    $output .= "</table>\n";

    return $output;
}

function calculate_odd_sums()
 {
    $sum =  0;
    $res = "";
    for ($i =  1; $i <=  100; $i +=  2)
     {
        $sum += $i;
        $res.=$sum."; ";
    }
    return "Суммы нечетных чисел до 100: $res";
}




function createFile() {
    // Здесь должен быть код для создания файла
}

function addTextToFile() {
    // Здесь должен быть код для добавления текста в файл
}

function displayFile() {
    // Здесь должен быть код для вывода содержимого файла
}

