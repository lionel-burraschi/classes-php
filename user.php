<?php
class user
{ //définition de la classe de utilisateur
    private $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;



    public function register($login, $password, $email, $firstname, $lastname)
    { //fonction pour enregistrer le nouvel utilisateur
        // connexioin à la base de donnée
        $conn = mysqli_connect('localhost', 'root', '', 'classes');

        // On créé la requête
        $req = "INSERT INTO utilisateurs(login, email, password, firstname,lastname)
            VALUES('$_login', '$_email', '$_password', '$_firstname','$_lastname')";
        //exécution de la requête

        $res = $conn->query($req);
        return($res);
    }


    public function connect($login, $password)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'classes');

        $info_log = "SELECT * FROM utilisateurs WHERE login = '$_login'";

        # On exécute la requête et on stocke ce résultat dans $infos_query
        $info_query = mysqli_query($bdd, $info_log);

        $infos = mysqli_fetch_all($info_query, MYSQLI_ASSOC);

        if ($infos) {
            session_start();
            $_SESSION['login'] = $infos[0]['login'];
            $_SESSION['id'] = $infos[0]['id'];
            $_SESSION['email'] = $infos[0]['email'];
            $_SESSION['password'] = $infos[0]['password'];
            $_SESSION['firstname'] = $infos[0]['firstname'];
            $_SESSION['firsname'] = $infos[0]['firstname'];


            return $infos;
        }
    }


    public function disconnect()
    {
        unset($_SESSION['login']);
    }



    public function delete()
    {
        $login=$_SESSION['login'];
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        mysqli_query($mysqli, "DELETE FROM utilisateurs WHERE login='$login'");

        unset($_SESSION['login']);
    }


    public function update(
        $login,
        $password,
        $email,
        $firstname,
        $lastname
    )
    {
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        $req_update = '123';
        mysqli_query($mysqli, $req_update);
    }

    public function isConnected()
    {
        if (isset($_SESSION['login'])) {
            $connected = true;
        } else {
            $connected = false;
        }

        return $connected;
    }


    public function getAllInfos()
    {
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        $req_getinfos = "SELECT * FROM utilisateurs WHERE id=$this->$id";


        return($req_getinfos);
    }



    public function getLogin()
    {
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        $req_getinfos = "SELECT * FROM utilisateurs WHERE id=$this->$id";

        return($req_getinfos['login']);
    }




    public function getEmail()
    {
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        $req_getinfos = "SELECT * FROM utilisateurs WHERE id=$this->$id";
        $info_users=mysqli_fetch_assoc($req_getinfos);

        // on affiche les résultats
        return($req_getinfos['email']);
    }


    public function getFirstname()
    {
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        $req_getinfos = "SELECT * FROM utilisateurs WHERE id=$this->$id";

        //ne pas mélanger retourner et afficher return et echo. faire des return. /

        // enlever la boucle
        $info_users=mysqli_fetch_assoc($req_getinfos);

        return($req_getinfos['firstname']);
    }



    public function getLastname()
    {
        $mysqli=mysqli_connect('localhost', 'root', '', 'classes');
        $req_getinfos = "SELECT * FROM utilisateurs WHERE id=$id";
        return($req_getinfos['lastname']);
    }


    public function refresh()
    {
        $bdd= mysqli_connect("localhost", "root", "", "classes");
        mysqli_refresh($bdd, MYSQLI_REFRESH_LOG);
    }
}


?>
