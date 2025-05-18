<?php

namespace src\controller\todo;

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
class TodoValidate {

	private null|int $id = null;
	private null|string $name = null;
	private null|string $completed = null;
	private array $errors = [];

	/** 
	 * Validação da informação "id" 
	 * 
	 * @param int id 
	 * 
	 * @return void 
	 */
	public function setId(int $id): void
	{
		$this->id = $id;
	}

	/** 
	 * Recuperação da informação "id" 
	 * 
	 * @return int 
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/** 
	 * Validação da informação "name" 
	 * 
	 * @param string name 
	 * 
	 * @return void 
	 */
	public function setName(string $name): void
	{
		$this->name = $name;
	}

	/** 
	 * Recuperação da informação "name" 
	 * 
	 * @return string 
	 */
	public function getName(): null|string
	{
		return $this->name;
	}

	/** 
	 * Validação da informação "completed" 
	 * 
	 * @param string completed 
	 * 
	 * @return void 
	 */
	public function setCompleted(string $completed): void
	{
		$this->completed = $completed;
	}

	/** 
	 * Recuperação da informação "completed" 
	 * 
	 * @return string 
	 */
	public function getCompleted(): null|string
	{
		return $this->completed;
	}

	public function getErrors() {
		
		return $this->errors;

	}

}