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


<?php class GuestBook {
    
            protected $location;// защищенное свойство объекта
            public $read;
            public $usertext;
            
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
            
            public function save(){
                
            if ($this->usertext != '') {
            $objGuestbook-> append($this->usertext); // Fatal error: Call to a member function append() on null
            header ('Location: /index.php');
                } else {
            header ('Location: /index.php');
                }
            }   
}



$objGuestbook = new GuestBook(__DIR__.'/db.txt');// ввод в конструктор пути к читаемому файлу
$objGuestbook->usertext= $_GET[coment]; //принимаем текст с импута
$objGuestbook->save(); // вызываем медот сохранения текста в файл с массивом


?>
