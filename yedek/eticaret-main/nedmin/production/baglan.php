<?php


//error_reporting(0); //Hataları gizle
    try{
        
        $hostname = 'localhost';    // MySQL sunucu adı
        $username = 'root';         // MySQL veritabanı kullanıcı adı
        $password = '';             // MySQL veritabanı kullanıcı şifresi
        $database = 'database'; // MySQL veritabanı adı

        // Veritabanı bağlantısı
        $link = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
        // Türkçe uyumlu karakter seti tanımlama
        $link->exec("SET NAMES utf8");
    }catch(PDOException $Hata){
        die();
    }


 ?>