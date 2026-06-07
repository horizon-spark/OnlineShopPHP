<?php 
    class UserModel
    {
        public $conn;

        function __construct($conn) {
            $this->conn = $conn;
        }

        function validateRegistration($username, $email, 
            $password, $password_confirm) {

            if (!empty($username) &&
                !empty($email) &&
                !empty($password) &&
                !empty($password_confirm)) {

                if (strlen($username) < 3 || strlen($username) > 100) {
                    echo "Длина логина должна быть от 3 до 100 символов";
                    return 0;
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Некорректный email";
                    return 0;
                }

                if ($password !== $password_confirm) {
                    echo "Пароли не совпадают";
                    return 0;
                }

                $sql_username_count = "SELECT COUNT(*) FROM user
                        WHERE username = :username";
                    
                $stmt = $this->conn->prepare($sql_username_count);
                $stmt->execute(['username' => $username]);
                $count = $stmt->fetchColumn();

                if ($count > 0) {
                    echo "Пользователь с таким именем уже существует";
                    return 0;
                }

                $sql_email_count = "SELECT COUNT(*) FROM user
                        WHERE email = :email";

                $stmt = $this->conn->prepare($sql_email_count);
                $stmt->execute(['email' => $email]);
                $count = $stmt->fetchColumn();

                if ($count > 0) {
                    echo "Пользователь с таким email уже существует";
                    return 0;
                }

            } else {
                echo "Поля формы не должны быть пустыми";
                return 0;
            }
            return 1;
        }

        function register($username, $email, $password) {
            $sql_register = "INSERT INTO user (username, email, password_hash)
                        VALUES (:username, :email, :password_hash)";

            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare($sql_register);

            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":password_hash", $password_hash);

            $affectedRowsNumber = $stmt->execute();

            if ($affectedRowsNumber > 0) {
                $_SESSION['message'] = "Пользователь успешно добавлен";
                header("Location: index.php?page=login");
            }
        }

        function validateLogin($username, $email, $password) {

            if (!empty($username) &&
                !empty($email) &&
                !empty($password)) {

                if (strlen($username) < 3 || strlen($username) > 100) {
                    echo "Длина логина должна быть от 3 до 100 символов";
                    return 0;
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "Некорректный email";
                    return 0;
                }

                $sql_email_count = "SELECT COUNT(*) FROM user
                                    WHERE email = :email";

                $stmt = $this->conn->prepare($sql_email_count);
                $stmt->execute(['email' => $email]);
                $count = $stmt->fetchColumn();

                if ($count == 0) {
                    echo "Пользователя с таким email нет в базе данных";
                    return 0;
                }

                return 1;
            }
        }

        function login($username, $email, $password) {

            $sql_password_by_email = "SELECT id, username, password_hash 
                                        FROM user
                                        WHERE email = :email";

            $stmt = $this->conn->prepare($sql_password_by_email);
            $stmt->execute(['email' => $email]);

            $user_data = $stmt->fetch();

            if (password_verify($password, $user_data['password_hash'])) {
                $_SESSION['user_id'] = $user_data['id'];
                $_SESSION['username'] = $user_data['username'];
                $_SESSION['message'] = "Успешный вход";

                session_regenerate_id(true);

                header("Location: index.php?page=index");
            } else {
                echo "Неправильный пароль";
            }
        }

        function logout() {
            $_SESSION = [];
            session_destroy();
        }
    }
?>