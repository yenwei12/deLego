<?php
class LoginModel extends Model
{
    public function __construct()
    {
    }

    public function run()
    {
        $username = $_POST['email'];
        // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM users WHERE userEmail=? AND userPassword=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);

        $count = $stmt->rowCount();
        if ($count == 1) {
            // Login
            Session::init();
            Session::set('loggedIn', true);
            header('location: /dashboard');
        } else {
            header('location: /login?error=invaliduser');
        }
    }
}
