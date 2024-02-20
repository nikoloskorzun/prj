
function file_worker(el)
{
        console.log("file_worker");
        var elem = document.getElementById('translator_block');
        elem.style = "display: none;";

        var output_container = document.getElementById('result');
        var action = el.value;

        // Отправляем AJAX-запрос на сервер
        var xhr = new XMLHttpRequest();

        var url_ = "/file?action=" + encodeURIComponent(action);
        if(action == "create")
            url_+="&N=" + encodeURIComponent(10);
        else if(action == "add")
            url_+="&N=" + encodeURIComponent(5);

        xhr.open("GET", url_, true);
        xhr.onreadystatechange = function(){
            if (xhr.readyState === 4 && xhr.status === 200) 
            {
                // Если запрос успешно выполнен, записываем результат в контейнер
                output_container.innerHTML = xhr.responseText;
            } 
            else if (xhr.readyState === 4) 
            {
                // Если произошла ошибка, выводим сообщение об ошибке
                output_container.innerHTML = "Ошибка при работе с файлом";
            }
        };
        xhr.send();
    }



