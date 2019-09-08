<?php


class User extends Model
{
    public $counter = 0;

    public function getData()
    {
        $db = $this->dbConnect();
        $list = array();

        $query = "SELECT * FROM user";

        $sor = $db->prepare($query);
        $sor->execute();

        while($al = $sor->fetch(PDO::FETCH_ASSOC))
        {
            $list[$this->counter] = array(
                'name' => $al['name']
            );
            
            $this->counter++;
        }
        return $list;
    }

    public function insert()
    {
        //SQL COMMAND
    }
}
