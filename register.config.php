<?php
require_once('database.php');

// CREATE CLASS 
class registerConfig
{
    // create properties
    private $uid;
    private $name;
    private $email;
    private $password;
    protected $dbCnx;

    /*
    @Author Carlo Bactol
    @description - Create a contructor 
    @param string $uid;
    @param string $name;
    @param string $email;
    @param string $password;
    */
    public function __construct($uid = 0, $name = '', $email = '', $password = '')
    {
        $this->uid = $uid;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->dbCnx = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    // Create a setter 
    public function setUid($uid)
    {
        $this->uid = $uid;
    }
    // Create a getter 
    public function getUid()
    {
        return $this->uid;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return  $this->password;
    }

    // Create a method InsertData
    public function insertData()
    {
        try {
            $stmt = $this->dbCnx->prepare("INSERT INTO register(name, email, password) VALUES(?,?,?)");
            $stmt->execute([$this->name, $this->email, $this->password]);
            echo "<script>alert('data successfully created'); document.location='allData.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // FECTCH ALL DATA
    public function fetchData()
    {
        try {
            $stmt = $this->dbCnx->prepare("SELECT * FROM register");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    // FECTH ONE
    public function fecthOneData()
    {
        try {
            $stmt = $this->dbCnx->prepare("SELECT * FROM register WHERE uid = ? ");
            $stmt->execute([$this->uid]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Update
    public function update()
    {
        try {
            $stmt = $this->dbCnx->prepare("UPDATE  register SET name=?, email=?, password=? WHERE uid = ? ");
            $stmt->execute([$this->name, $this->email, $this->password, $this->uid]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // delete
    public function delete()
    {
        try {
            $stmt = $this->dbCnx->prepare("DELETE FROM register WHERE uid = ? ");
            $stmt->execute([$this->uid]);
            return $stmt->fetchAll();
            echo "<script>alert('data successfully deleted'); document.location='index.php'</script>";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
