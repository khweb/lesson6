<!-------------------------------- ДЗ 6 ------------------------------------------->
<!--

    Создайте класс GuestBook, который будет удовлетворять следующим требованиям: 
    
+   1.В конструктор передается путь до файла с данными гостевой книги, в нём же происходит 
    чтение данных из неё (используйте защищенное свойство объекта для хранения данных).
    
+   2.Метод getData() возвращает массив записей гостевой книги
    
+   3.Метод append($text) добавляет новую запись к массиву записей
    
?   4.Метод save() сохраняет массив в файл

?   2.* Продумайте - какие части функционала можно вынести в базовый (родительский) класс TextFile, а какие - сделать в унаследованном от него классе GuestBook

-->


<?php class TextFile {
    
            protected $location;// защищенное свойство объекта
            public $read;
            
            public function __construct($location){ 
            $this->location = $location; 
            $this->read = file($location);
            } 
    
            public function getData(){
                return $this->read;
            }
        
            public function append($text){
                file_put_contents($this->location , "\n" . $text , FILE_APPEND);
            }
            
            
}

class GuestBook extends TextFile {
    
            public function save(){
                
            if (isset($_GET[coment])) {
            $usertext =$_GET[coment];
                if ($usertext != '') {
            $objGuestbook-> append($usertext); // Fatal error: Call to a member function append() on null
            header ('Location: /index.php');
                } else {
            header ('Location: /index.php');
        }
    }
                
            }
    
}

$objGuestbook = new GuestBook(__DIR__.'/db.txt');// ввод в конструктор путь к читаемому файлу
$objGuestbook->save();



   

?>
