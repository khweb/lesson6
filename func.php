<?php
/**
    Создайте класс GuestBook, который будет удовлетворять следующим требованиям: 
    
+   1.В конструктор передается путь до файла с данными гостевой книги, в нём же происходит 
    чтение данных из неё (используйте защищенное свойство объекта для хранения данных).
    
+   2.Метод getData() возвращает массив записей гостевой книги
    
+   3.Метод append($text) добавляет новую запись к массиву записей
    
?   4.Метод save() сохраняет массив в файл
?   2.* Продумайте - какие части функционала можно вынести в базовый (родительский) класс TextFile, а какие - сделать в унаследованном от него классе GuestBook
*/
class GuestBook {
    
    protected $fileData;
    protected $filePath;
    protected $userText = [];
    
    public function __construct($filePath) { 
            if (is_string($filePath)) {
            $this->filePath = $filePath;
            $this->fileData = file($filePath);
        } 
        
    } 
    public function getData() {
        return $this->fileData;
    }
    public function append($text) {
        if ('' != $text) {
        $this->userText[] = $text;
        header ('Location: /index.php');        
        } 
    }
    
    public function save() {
       
       foreach( $this->userText as $key=>$value) {
             file_put_contents($this->filePath, "\n".$value, FILE_APPEND);

       }
       header ('Location: /index.php');   
    } 
}

 
$objGuestbook = new GuestBook(__DIR__.'/db.txt');// ввод в конструктор пути к читаемому файлу

if (isset($_GET[comment])){
$objGuestbook->append($_GET[comment]); //принимаем текст с импута
$objGuestbook->save(); // вызываем медот сохранения текста в файл с массивом
} 
?>