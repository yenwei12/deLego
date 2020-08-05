<?php
class LoginModel extends Model
{
    public function run()
    {
        $username = $_POST['email'];
        $password = md5($_POST['password']);
        $sql = "SELECT
            userId,
            userEmail,
            userFullName,
            userAddress,
            userContactNo,
            userCity,
            userState,
            userPostcode,
            userCountry,
            userRole,
            userRegisterAt,
            isEmailVerified
        FROM users WHERE userEmail=? AND userPassword=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $password]);
        $count = $stmt->rowCount();
        if ($count == 1) {
            $results = $stmt->fetch();

            // Login
            Session::init();
            Session::set('loggedIn', true);
            foreach ($results as $key => $val) {
                Session::set($key, $val);
            }
            if (Session::get('userRole') == 'admin') {
                header('location: /admin');
            } else {
                header('location: /user');
            }
        } else {
            header('location: /login?error=invaliduser');
        }
    }
}
