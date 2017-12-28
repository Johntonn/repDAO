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

		if (isset($result[0])) {

			$row = $result[0];

			$this->setUser_id($row['user_id']);
			$this->setDescription($row['description']);
			$this->setPass($row['pass']);
			$this->setDt_register(new DateTime($row['dt_register']));
		}

	}

	public function __toString() {

		return json_encode(array(
			"user_id" => $this->getUser_id(),
			"description" => $this->getDescription(),
			"pass" => $this->getPass(),
			"dt_register" => $this->getDt_register()->format("d/m/y H:i:s")
		));
	}
}

?>