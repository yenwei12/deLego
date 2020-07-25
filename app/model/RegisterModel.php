<?php
class RegisterModel extends Model
{
    public function __construct()
    {
    }

    public function run()
    {
        $email = $_POST["email"];
        $fullName = $_POST["full-name"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm-password"];

        if (empty($email) || empty($fullName) || empty($password) || empty($confirmPassword)) {
            header("location: /register?error=emptyfields&email=" . $email . "&fullName=" . $fullName);
            exit();
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            header("location: /register?error=invalidemailandname");
            exit();
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: /register?error=invalidemail&fullName=" . $fullName);
            exit();
        } else if (!preg_match("/^[a-zA-Z ]*$/", $fullName)) {
            header("location: /register?error=invalidname&email=" . $email);
            exit();
        } else if (strlen($password) < 8) {
            header("location: /register?error=invalidpassword&email=" . $email . "&fullName=" . $fullName);
            exit();
        } else if ($password != $confirmPassword) {
            header("location: /register?error=incorrectpassword&email=" . $email . "&fullName=" . $fullName);
            exit();
        } else {
            $sql = "SELECT userId FROM users WHERE userEmail = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            $count = $stmt->rowCount();

            if ($count > 0) {
                header("location: /register?error=emailtaken&fullName=" . $fullName);
                exit();
            } else {
                $hashPassword = md5($password);
                $role = "customer";
                $createdAt = date('Y-m-d H:i:s');
                $verificationToken = bin2hex(random_bytes(128));

                $sql = "INSERT INTO
                users(userEmail, userPassword, userFullName, userRole, userRegisterAt, isEmailVerified, emailVerificationToken)
                VALUES (?,?,?,?,?,?,?)";
                $stmt = $this->connect()->prepare($sql);

                if ($stmt->execute([$email, $hashPassword, $fullName, $role, $createdAt, false, $verificationToken])) {
                    header('location: /login?signup=success');
                } else {
                    header('location: /register?signup=fail');
                }
            }
        }
    }
}
