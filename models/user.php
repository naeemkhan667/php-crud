<?php
namespace Models;

class user {

    public $id = '';
    public $first_name = '';
    public $last_name = '';
    private $db = null;

    function __construct($db) {
        $this->db = $db;
    }

    public function get_users() {

        $search = "";
        if(isset($_REQUEST['search'])){
            $search = $_REQUEST['search'];
        }
        
        if(!empty($search)){
            $stmt = $this->db->prepare('SELECT * FROM user WHERE first_name LIKE ? OR last_name LIKE ?');
            $stmt->execute(["%$search%", "%$search%"]); 
        } else {
            $stmt = $this->db->query('SELECT * FROM user');
        }
        $results = $stmt->fetchAll();
        return $results;
    }
    public function edit_user() {
             
        $this->id = $_REQUEST['id'];
        $stmt = $this->db->prepare('SELECT * FROM user where id = ?');
        $stmt->execute([$this->id]); 
        $result = $stmt->fetch();
        return $result;
    }
    public function update_user() {
        $this->id = $_REQUEST['h_id'];
        $this->first_name = $_REQUEST['first_name'];
        $this->last_name = $_REQUEST['last_name'];

        $stmt = $this->db->prepare('UPDATE user SET first_name = ?, last_name = ? WHERE id = ?');
        $result = $stmt->execute([$this->first_name, $this->last_name, $this->id]);
        return $result;

    }
    public function create() {
        $this->first_name = htmlspecialchars(strip_tags($_REQUEST['first_name']));
        $this->last_name = htmlspecialchars(strip_tags($_REQUEST['last_name']));
        $stmt = $this->db->prepare('INSERT INTO user (first_name, last_name) VALUES (?, ?)');
        $result = $stmt->execute([$this->first_name, $this->last_name]);
        return $result;
    }
    public function delete_user() {
        $this->id = $_REQUEST['id'];
        $stmt = $this->db->prepare('DELETE FROM user WHERE id = ?');
        $result = $stmt->execute([$this->id]);
        return $result;

    }
}
