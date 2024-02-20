<?php

// Проверяем, что запрос был отправлен методом POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные формы

    //echo '<pre>';
    
    $data = $_POST['text'];
    //echo "<br>";

    $data = json_decode($data, true);
    //print_r($data);

    //echo '</pre>';

    $d_m = array("courier"=>"Курьер", "airplane"=>"Самолет","train"=>"Поезд","automobile"=>"Автотранспорт");
    $d_p = array("Battering"=>"Бьющаяся", "Fragile"=>"Хрупкая","Waterproof"=>"Водонепроницаемая","Flammable"=>"Пожароопасная");


    echo '<p>Дата создания извещения: <time style="color:green;">'. $data["creation_date"].'</time></p>';
    echo '<p>Здраствуйте <b style="color:red;">'. $data["name"].'</b>!</p>';
    echo '<p>Ваш email <span style="color:red;">'. $data["email"].'</span></p>';


    if(!is_array($data['delivery_method']))
    {
        echo '<p>метод доставки ';
        $data['delivery_method'] = array($data['delivery_method']);
    }
    else
        echo '<p>методы доставки: ';


    echo '<span style="color:red;"> ';

    foreach($data['delivery_method'] as $method)
    {

        echo $d_m[$method] . "; ";
    }

    echo '</span></p>';

    echo '<p>У Вас <span style="color:red;">';
    if($data['weight'] == "more50")
        echo 'тяжелая';
    else if ($data['weight'] == "less50")
        echo 'легкая';
    
    echo'</span> посылка, ее цвет и форма ';

    if($data['form_type'] == "rectangular")
        echo '<span style="display: inline-block;width:  20px;height:  20px;vertical-align: middle;background-color:' .$data["parcel_color"].';"></span>';
    else if($data['form_type'] == "round")
        echo '<span style=" display: inline-block;width:  20px;height:  20px;vertical-align: middle;background-color:'. $data["parcel_color"].';border-radius:  50%;"></span>';

    echo '. Количество - <span style="color:red;">'.$data["quantity"].'</span></p>';


    echo '<p>Использованная тара - <span style="color:red;">'; 

    if(!is_array($data['pack']))
    {
        
        $data['pack'] = array($data['pack']);
    }



    foreach($data['pack'] as $pack)
    {

        echo $d_p[$pack] . "; ";
    }
    echo '</span></p>';


    echo '<p>Комментарий: <span style="color:blue;"> '.$data["comment"].'</span></p>';

    echo '<br><p>Отправить еще одну форму?</p>';
    echo '<input type="button" name="form_toggle" value="ДА" onclick="enable_form()">';

}


