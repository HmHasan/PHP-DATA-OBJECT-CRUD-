<?php
include('db.php');


class user
{
    public $table = 'student';
    public function insertdata($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $checkemail = $this->checkemail();

        if (empty($name) || empty($email)) {
            $msg = "<div class = 'alert alert-danger'>All Field Are Requiered</div>";
            return $msg;
        }

        $sql = "INSERT INTO $this->table(name,email)VALUES(:name,:email)";
        $stmt = db::prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $result = $stmt->execute();
        if ($result) {
            $msg = "<div class = 'alert alert-success'>Data Insert Successfully</div>";
            return $msg;
        }
    }

    public function show()
    {
        $sql = "SELECT * FROM $this->table";
        $stmt = db::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function checkemail()
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email";
    }


    public function readbyid($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id=:id";
        $stmt = db::prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function userupdate($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $id = $data['id'];
        if (empty($name) || empty($email)) {
            $msg = "<div class = 'alert alert-danger'>All Field Are Requiered</div>";
            return $msg;
        }

        $sql = "UPDATE $this->table SET name=:name, email=:email WHERE id=:id";
        $stmt = db::$link->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        if ($result) {
            $msg = "<div class = 'alert alert-success'>Data Update Successfully</div>";
            return $msg;
        } else {
            $msg = "<div class = 'alert alert-dabger'>Data Not Successfully Updated</div>";
            return $msg;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE from $this->table where id=:id";
        $stmt = db::$link->prepare($sql);
        $stmt->bindParam(':id',$id);
        $result = $stmt->execute();

        if ($result) {
            $msg = "<div class = 'alert alert-success'>Data Delete Successfully</div>";
            return $msg;
        } else {
            $msg = "<div class = 'alert alert-dabger'>Data Not Successfully Delete</div>";
            return $msg;
        }
    }
}

?>