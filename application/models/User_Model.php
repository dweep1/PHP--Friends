<?php 
	class User_Model extends CI_Model
	{
		public $user;

		function __construct()
		{
			parent::__construct();
		}
		public function get_user($user_info)
		{
			return $this->db->query("SELECT * FROM users WHERE email = '{$user_info['email']}' AND 
				password = '{$user_info['password']}'")->row_array();
		}
		public function insert_user($user_info)
		{
				$insert_query = "INSERT INTO users (name, alias, email, password, date_of_birth, created_at)
								VALUES (?, ?, ?, ?,?, NOW())";
				$values = (array($user_info['name'], $user_info['alias'], $user_info['email'], $user_info['password'], $user_info['dob']));
				$this->db->query($insert_query, $values);
				return $this->db->insert_id();
		}
		public function show_users_profile($id)
		{
			$show_users_query = "SELECT * FROM users WHERE users.id = ?";
			return  $this->db->query($show_users_query, $id)->row_array();
		}
		public function get_all_friends($id)
		{

		 	$get_users_query = "SELECT users.id, users.alias From users
		 		LEFT JOIN friendships ON users.id = friendships.friend_id 
		 		WHERE friendships.user_id = ?";
		 		return $this->db->query($get_users_query, $id)->result_array();
		 }
		 public function get_all_nonfriends($id, $userid)
		 {	

		 	$get_users_query = "SELECT users.id, users.alias FROM users LEFT JOIN friendships on users.id = friendships.user_id 
								LEFT JOIN users as followers on followers.id = friendships.friend_id WHERE users.id 
								NOT IN (SELECT friend_id FROM friendships WHERE friendships.user_id = ? AND users.id != ?)
								AND users.id != ?";
		 		return $this->db->query($get_users_query, array($id, $userid, $id))->result_array();
		 }
		 public function remove_friend($id, $userid)
		 {
		 	$this->db->query("DELETE FROM friendships WHERE friendships.friend_id = ? AND friendships.user_id = ?", array($id, $userid));
		 	$this->db->query("DELETE FROM friendships WHERE friendships.friend_id = ? AND friendships.user_id = ?", array($userid, $id));
		 	return true;	 
		 }

		 public function add_friend($userid, $id)
		 {
		 	$query = "INSERT INTO friendships (user_id, friend_id) VALUES (?,?)";
			$values = array($userid, $id);
			$this->db->query($query, $values);
			$query1 = "INSERT INTO friendships (user_id, friend_id) VALUES (?,?)";
			$values2 = array($id, $userid);
			$this->db->query($query1, $values2);
			return true;
		 }
		 
		
	}