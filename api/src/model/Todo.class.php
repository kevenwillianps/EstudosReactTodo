<?php

namespace src\model;

// Importação de Classe
use src\controller\todo\TodoValidate;

/**
* Classe responsável para manipular os dados da tabela de todo
*
* @category 
* @package src\model
* @author Keven
* @copyright 2025 Keven
* @license MIT
* @version 1.0.0
* @link 
*
*/

class Todo extends TodoValidate {

	// Declara as variáveis da classe 
	private Mysql $mysql;
	private null|string $sql;
	private object $stmt;

	public function __construct()
	{

		// Cria o objeto de conexão com o banco de dados
		$this->mysql = new Mysql();

	}

	/**
	* Lista todos os registros existentes
	*
	* @return array
	*/
	public function all(): array|false
	{

		// Consulta SQL
		$this->sql = 'SELECT t.* FROM todo t';

		// Preparo o SQL para execução
		$this->stmt = $this->mysql->connect()->prepare($this->sql);

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchAll(\PDO::FETCH_OBJ);

	}

	/**
	* Busca um registro especifico pelo ID informado
	*
	* @param TodoValidate $TodoValidate
	*
	* @return object|null
	*/
	public function get(TodoValidate $TodoValidate): object|false
	{

		// Consulta SQL
		$this->sql = 'SELECT * FROM todo t WHERE t.id = :id';

		// Preparo o SQL para execução
		$this->stmt = $this->mysql->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindValue(':id', $TodoValidate->getId());

		// Executa o SQL
		$this->stmt->execute();

		// Retorno do resultado
		return $this->stmt->fetchObject();

	}

	/**
	* Persitência de dados. Caso o ID seja zero sera criado um novo, caso não, o registro será atualizado
	*
	* @param TodoValidate $TodoValidate
	*
	* @return boolean|string
	*/
	public function save(TodoValidate $TodoValidate): bool|string
	{

		// Consulta SQL
		$this->sql = 'INSERT INTO todo(`id`, `name`, `completed`)
						VALUES(:id, :name, :completed);';

		// Preparo o SQL para execução
		$this->stmt = $this->mysql->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindValue(':id', $TodoValidate->getId());
		$this->stmt->bindValue(':name', $TodoValidate->getName());
		$this->stmt->bindValue(':completed', $TodoValidate->getCompleted());

		// Executa o SQL
		return $this->stmt->execute();
	}

	/**
	* Remove um registro em específico
	*
	* @param TodoValidate $TodoValidate
	*
	* @return boolean|string
	*/
	public function delete(TodoValidate $TodoValidate): bool|string
	{

		// Consulta SQL
		$this->sql = 'DELETE FROM todo t WHERE t.id = :id';

		// Preparo o SQL para execução
		$this->stmt = $this->mysql->connect()->prepare($this->sql);

		// Preencho os parâmetros do SQL
		$this->stmt->bindValue(':id', $TodoValidate->getId());

		// Executa o SQL
		return $this->stmt->execute();

	}


}