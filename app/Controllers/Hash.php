<?php
namespace App\Controllers;

class Hash extends BaseController {
    public function index() {
        $password = 'admin123';
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        echo "Password Asli: " . $password . "<br>";
        echo "Hasil Hash yang HARUS kamu pasang di DB: <br>";
        echo "<strong>" . $hash . "</strong>";
    }
}