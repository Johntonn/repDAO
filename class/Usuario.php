<?php

class Usuario {

	private $user_id, $description, $pass, $dt_register;

	public function getUser_id() {

		return $this->user_id;
	}

	public function setUser_id($value) {

		$this->user_id = $value;
	}

	public function getDescription() {

		return $this->description;
	}

	public function setDescription($value) {

		$this->description = $value;
	}

	public function getPass() {

		return $this->pass;
	}

	public function setPass($value) {

		$this->pass = $value;
	}

	public function getDt_register() {

		return $this->dt_register;
	}

	public function setDt_register($value) {

		$this->dt_register = $value;
	}

	public function loadById($id) {

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM usuarios WHERE user_id = :ID", array(
			":ID" => $id
		));

		if (isset($result)) {

			$this->getData($result[0]);
		}

	}

	// Para não tornar Login e Senha obrigatórios
	public function __construct($login = "", $pass = "") {

		$this->setDescription($login);
		$this->setPass($pass);
	}

	public function __toString() {

		return json_encode(array(
			"user_id" => $this->getUser_id(),
			"description" => $this->getDescription(),
			"pass" => $this->getPass(),
			"dt_register" => $this->getDt_register()->format("d/m/y H:i:s")
		));
	}

	public static function getList() {

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuarios");
	}

	public static function search($login) {

		$sql = new Sql();

		return $sql->select("SELECT * FROM usuarios WHERE description LIKE :LOGIN", array(
			':LOGIN' => "%" .$login. "%"
		));
	}

	public function login($login, $pass) {

		$sql = new Sql();

		$result = $sql->select("SELECT * FROM usuarios WHERE description = :DES AND pass = :PASS", array(
			":DES" => $login,
			":PASS" => $pass
		));

		if (count ($result) > 0) {

			$this->getData($result[0]);
		}
		else {

			throw new Exception ("Login ou senha inválidos!");
		}
	}

	public function insert() {

		$sql = new Sql();

		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASS)", array(
			':LOGIN'=>$this->getDescription(),
			':PASS'=>$this->getPass()
		));

		if (count($results) > 0) {

			$this->getData($results[0]);
		}
	}

	public function getData($data) {

		$this->setUser_id($data['user_id']);
		$this->setDescription($data['description']);
		$this->setPass($data['pass']);
		$this->setDt_register(new DateTime($data['dt_register']));

	}


}

?>