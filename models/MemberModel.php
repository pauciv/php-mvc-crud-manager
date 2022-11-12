<?php

class MemberModel extends Model {

    function get() {
        // $query = $this->db->connect()->prepare("SELECT id, name, last_name, email FROM members");

        $query = $this->db->connect()->prepare(
            "SELECT m.id, m.name, m.last_name, m.email, s.sport 
            FROM members m
            INNER JOIN sports s 
            ON m.sport_id = s.id;"
        );

        try {
            $query->execute(); // lanza la petición del prepare a la base de datos
            $members = $query->fetchAll();
            //print_r($members);
            return $members;

        } catch (PDOException $e) {
            return [];
        }
    }

    function getById($id) {
        // returns the array with the DB data of the selected member
        // echo " getById( $id ) | ";

        $query = $this->db->connect()->prepare(
            "SELECT m.id, m.name, m.last_name, m.email, s.id as sport_id, s.sport 
            FROM members m
            INNER JOIN sports s 
            ON m.sport_id = s.id 
            WHERE m.id = $id;"
        );

        try {
            $query->execute();
            $member = $query->fetchAll(); 
            // print_r($member);
            return $member;
        } catch (PDOException $e) {
            return [];
        }
    }

    function update($member){
        //echos
            // echo " update( ";
            // print_r($member);
            // echo " ) | ";

        $query = $this->db->connect()->prepare(
            "UPDATE members
            SET name = ?, last_name = ?, email = ?, sport_id = ? 
            WHERE id = ?;"
        );

        $query->bindParam(1, $member["name"]);
        $query->bindParam(2, $member["last_name"]);
        $query->bindParam(3, $member["email"]);
        $query->bindParam(4, $member["sport_id"]);
        $query->bindParam(5, $member["id"]);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function create($member) {
        $query = $this->db->connect()->prepare("INSERT INTO members (`name`, last_name, email, sport_id)
        VALUES
        (?, ?, ?, ?);");

        $query->bindParam(1, $member["name"]);
        $query->bindParam(2, $member["last_name"]);
        $query->bindParam(3, $member["email"]);
        $query->bindParam(4, $member["sport_id"]);
        
   

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }

    function delete($id) {
        $query = $this->db->connect()->prepare("DELETE FROM members WHERE id = ?");
        $query->bindParam(1, $id);

        try {
            $query->execute();
            return [true];
        } catch (PDOException $e) {
            return [false, $e];
        }
    }
    
}
