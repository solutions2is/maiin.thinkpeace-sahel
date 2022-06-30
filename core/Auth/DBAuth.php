<?php
namespace Core\Auth;

use Core\Database\Database;

class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE users.enabled = 1', [$username], null, true);
        if($user){
            if($user->password == sha1($password)){
                $_SESSION['auth'] = $user->id;
                $_SESSION['username'] = $user->username;
                $_SESSION['first_name'] = $user->first_name;
                $_SESSION['last_name'] = $user->last_name;
                $_SESSION['fname'] = $user->fname;
                $_SESSION['email'] = $user->email;
                $_SESSION['country'] = 'Mali';
                return true;
            }
        }
        return false;
    }

    public function logged(){
        return isset($_SESSION['auth']);
    }

}