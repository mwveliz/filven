<?php


/**
 * Base class that represents a row from the 'pagina' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 25 17:57:31 2013
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePagina extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'PaginaPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        PaginaPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the id_informe field.
	 * @var        int
	 */
	protected $id_informe;

	/**
	 * The value for the titulo_informe field.
	 * @var        string
	 */
	protected $titulo_informe;

	/**
	 * The value for the ante_cuadro field.
	 * @var        string
	 */
	protected $ante_cuadro;

	/**
	 * The value for the titulo_cuadro field.
	 * @var        string
	 */
	protected $titulo_cuadro;

	/**
	 * The value for the post_cuadro field.
	 * @var        string
	 */
	protected $post_cuadro;

	/**
	 * The value for the texto_posterior field.
	 * @var        string
	 */
	protected $texto_posterior;

	/**
	 * The value for the ante_grafico field.
	 * @var        string
	 */
	protected $ante_grafico;

	/**
	 * The value for the post_grafico field.
	 * @var        string
	 */
	protected $post_grafico;

	/**
	 * The value for the tipo_grafico field.
	 * @var        int
	 */
	protected $tipo_grafico;

	/**
	 * @var        Informe
	 */
	protected $aInforme;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [id_informe] column value.
	 * 
	 * @return     int
	 */
	public function getIdInforme()
	{
		return $this->id_informe;
	}

	/**
	 * Get the [titulo_informe] column value.
	 * 
	 * @return     string
	 */
	public function getTituloInforme()
	{
		return $this->titulo_informe;
	}

	/**
	 * Get the [ante_cuadro] column value.
	 * 
	 * @return     string
	 */
	public function getAnteCuadro()
	{
		return $this->ante_cuadro;
	}

	/**
	 * Get the [titulo_cuadro] column value.
	 * 
	 * @return     string
	 */
	public function getTituloCuadro()
	{
		return $this->titulo_cuadro;
	}

	/**
	 * Get the [post_cuadro] column value.
	 * 
	 * @return     string
	 */
	public function getPostCuadro()
	{
		return $this->post_cuadro;
	}

	/**
	 * Get the [texto_posterior] column value.
	 * 
	 * @return     string
	 */
	public function getTextoPosterior()
	{
		return $this->texto_posterior;
	}

	/**
	 * Get the [ante_grafico] column value.
	 * 
	 * @return     string
	 */
	public function getAnteGrafico()
	{
		return $this->ante_grafico;
	}

	/**
	 * Get the [post_grafico] column value.
	 * 
	 * @return     string
	 */
	public function getPostGrafico()
	{
		return $this->post_grafico;
	}

	/**
	 * Get the [tipo_grafico] column value.
	 * 
	 * @return     int
	 */
	public function getTipoGrafico()
	{
		return $this->tipo_grafico;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PaginaPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_informe] column.
	 * 
	 * @param      int $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setIdInforme($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id_informe !== $v) {
			$this->id_informe = $v;
			$this->modifiedColumns[] = PaginaPeer::ID_INFORME;
		}

		if ($this->aInforme !== null && $this->aInforme->getId() !== $v) {
			$this->aInforme = null;
		}

		return $this;
	} // setIdInforme()

	/**
	 * Set the value of [titulo_informe] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setTituloInforme($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo_informe !== $v) {
			$this->titulo_informe = $v;
			$this->modifiedColumns[] = PaginaPeer::TITULO_INFORME;
		}

		return $this;
	} // setTituloInforme()

	/**
	 * Set the value of [ante_cuadro] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setAnteCuadro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ante_cuadro !== $v) {
			$this->ante_cuadro = $v;
			$this->modifiedColumns[] = PaginaPeer::ANTE_CUADRO;
		}

		return $this;
	} // setAnteCuadro()

	/**
	 * Set the value of [titulo_cuadro] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setTituloCuadro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->titulo_cuadro !== $v) {
			$this->titulo_cuadro = $v;
			$this->modifiedColumns[] = PaginaPeer::TITULO_CUADRO;
		}

		return $this;
	} // setTituloCuadro()

	/**
	 * Set the value of [post_cuadro] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setPostCuadro($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->post_cuadro !== $v) {
			$this->post_cuadro = $v;
			$this->modifiedColumns[] = PaginaPeer::POST_CUADRO;
		}

		return $this;
	} // setPostCuadro()

	/**
	 * Set the value of [texto_posterior] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setTextoPosterior($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->texto_posterior !== $v) {
			$this->texto_posterior = $v;
			$this->modifiedColumns[] = PaginaPeer::TEXTO_POSTERIOR;
		}

		return $this;
	} // setTextoPosterior()

	/**
	 * Set the value of [ante_grafico] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setAnteGrafico($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ante_grafico !== $v) {
			$this->ante_grafico = $v;
			$this->modifiedColumns[] = PaginaPeer::ANTE_GRAFICO;
		}

		return $this;
	} // setAnteGrafico()

	/**
	 * Set the value of [post_grafico] column.
	 * 
	 * @param      string $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setPostGrafico($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->post_grafico !== $v) {
			$this->post_grafico = $v;
			$this->modifiedColumns[] = PaginaPeer::POST_GRAFICO;
		}

		return $this;
	} // setPostGrafico()

	/**
	 * Set the value of [tipo_grafico] column.
	 * 
	 * @param      int $v new value
	 * @return     Pagina The current object (for fluent API support)
	 */
	public function setTipoGrafico($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->tipo_grafico !== $v) {
			$this->tipo_grafico = $v;
			$this->modifiedColumns[] = PaginaPeer::TIPO_GRAFICO;
		}

		return $this;
	} // setTipoGrafico()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->id_informe = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->titulo_informe = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->ante_cuadro = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->titulo_cuadro = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->post_cuadro = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->texto_posterior = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->ante_grafico = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->post_grafico = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->tipo_grafico = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 10; // 10 = PaginaPeer::NUM_COLUMNS - PaginaPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating Pagina object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

		if ($this->aInforme !== null && $this->id_informe !== $this->aInforme->getId()) {
			$this->aInforme = null;
		}
	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaginaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = PaginaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aInforme = null;
		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaginaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePagina:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				PaginaQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasePagina:delete:post') as $callable)
				{
				  call_user_func($callable, $this, $con);
				}

				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PaginaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BasePagina:save:pre') as $callable)
			{
			  if (is_integer($affectedRows = call_user_func($callable, $this, $con)))
			  {
			  	$con->commit();
			    return $affectedRows;
			  }
			}

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BasePagina:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				PaginaPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			// We call the save method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aInforme !== null) {
				if ($this->aInforme->isModified() || $this->aInforme->isNew()) {
					$affectedRows += $this->aInforme->save($con);
				}
				$this->setInforme($this->aInforme);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PaginaPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(PaginaPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.PaginaPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += PaginaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			// We call the validate method on the following object(s) if they
			// were passed to this object by their coresponding set
			// method.  This object relates to these object(s) by a
			// foreign key reference.

			if ($this->aInforme !== null) {
				if (!$this->aInforme->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aInforme->getValidationFailures());
				}
			}


			if (($retval = PaginaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaginaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdInforme();
				break;
			case 2:
				return $this->getTituloInforme();
				break;
			case 3:
				return $this->getAnteCuadro();
				break;
			case 4:
				return $this->getTituloCuadro();
				break;
			case 5:
				return $this->getPostCuadro();
				break;
			case 6:
				return $this->getTextoPosterior();
				break;
			case 7:
				return $this->getAnteGrafico();
				break;
			case 8:
				return $this->getPostGrafico();
				break;
			case 9:
				return $this->getTipoGrafico();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true, $includeForeignObjects = false)
	{
		$keys = PaginaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdInforme(),
			$keys[2] => $this->getTituloInforme(),
			$keys[3] => $this->getAnteCuadro(),
			$keys[4] => $this->getTituloCuadro(),
			$keys[5] => $this->getPostCuadro(),
			$keys[6] => $this->getTextoPosterior(),
			$keys[7] => $this->getAnteGrafico(),
			$keys[8] => $this->getPostGrafico(),
			$keys[9] => $this->getTipoGrafico(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aInforme) {
				$result['Informe'] = $this->aInforme->toArray($keyType, $includeLazyLoadColumns, true);
			}
		}
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PaginaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdInforme($value);
				break;
			case 2:
				$this->setTituloInforme($value);
				break;
			case 3:
				$this->setAnteCuadro($value);
				break;
			case 4:
				$this->setTituloCuadro($value);
				break;
			case 5:
				$this->setPostCuadro($value);
				break;
			case 6:
				$this->setTextoPosterior($value);
				break;
			case 7:
				$this->setAnteGrafico($value);
				break;
			case 8:
				$this->setPostGrafico($value);
				break;
			case 9:
				$this->setTipoGrafico($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PaginaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdInforme($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTituloInforme($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAnteCuadro($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTituloCuadro($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setPostCuadro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTextoPosterior($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setAnteGrafico($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setPostGrafico($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setTipoGrafico($arr[$keys[9]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(PaginaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PaginaPeer::ID)) $criteria->add(PaginaPeer::ID, $this->id);
		if ($this->isColumnModified(PaginaPeer::ID_INFORME)) $criteria->add(PaginaPeer::ID_INFORME, $this->id_informe);
		if ($this->isColumnModified(PaginaPeer::TITULO_INFORME)) $criteria->add(PaginaPeer::TITULO_INFORME, $this->titulo_informe);
		if ($this->isColumnModified(PaginaPeer::ANTE_CUADRO)) $criteria->add(PaginaPeer::ANTE_CUADRO, $this->ante_cuadro);
		if ($this->isColumnModified(PaginaPeer::TITULO_CUADRO)) $criteria->add(PaginaPeer::TITULO_CUADRO, $this->titulo_cuadro);
		if ($this->isColumnModified(PaginaPeer::POST_CUADRO)) $criteria->add(PaginaPeer::POST_CUADRO, $this->post_cuadro);
		if ($this->isColumnModified(PaginaPeer::TEXTO_POSTERIOR)) $criteria->add(PaginaPeer::TEXTO_POSTERIOR, $this->texto_posterior);
		if ($this->isColumnModified(PaginaPeer::ANTE_GRAFICO)) $criteria->add(PaginaPeer::ANTE_GRAFICO, $this->ante_grafico);
		if ($this->isColumnModified(PaginaPeer::POST_GRAFICO)) $criteria->add(PaginaPeer::POST_GRAFICO, $this->post_grafico);
		if ($this->isColumnModified(PaginaPeer::TIPO_GRAFICO)) $criteria->add(PaginaPeer::TIPO_GRAFICO, $this->tipo_grafico);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PaginaPeer::DATABASE_NAME);
		$criteria->add(PaginaPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of Pagina (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setIdInforme($this->id_informe);
		$copyObj->setTituloInforme($this->titulo_informe);
		$copyObj->setAnteCuadro($this->ante_cuadro);
		$copyObj->setTituloCuadro($this->titulo_cuadro);
		$copyObj->setPostCuadro($this->post_cuadro);
		$copyObj->setTextoPosterior($this->texto_posterior);
		$copyObj->setAnteGrafico($this->ante_grafico);
		$copyObj->setPostGrafico($this->post_grafico);
		$copyObj->setTipoGrafico($this->tipo_grafico);

		$copyObj->setNew(true);
		$copyObj->setId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     Pagina Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     PaginaPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PaginaPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a Informe object.
	 *
	 * @param      Informe $v
	 * @return     Pagina The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setInforme(Informe $v = null)
	{
		if ($v === null) {
			$this->setIdInforme(NULL);
		} else {
			$this->setIdInforme($v->getId());
		}

		$this->aInforme = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Informe object, it will not be re-added.
		if ($v !== null) {
			$v->addPagina($this);
		}

		return $this;
	}


	/**
	 * Get the associated Informe object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Informe The associated Informe object.
	 * @throws     PropelException
	 */
	public function getInforme(PropelPDO $con = null)
	{
		if ($this->aInforme === null && ($this->id_informe !== null)) {
			$this->aInforme = InformeQuery::create()->findPk($this->id_informe, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aInforme->addPaginas($this);
			 */
		}
		return $this->aInforme;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_informe = null;
		$this->titulo_informe = null;
		$this->ante_cuadro = null;
		$this->titulo_cuadro = null;
		$this->post_cuadro = null;
		$this->texto_posterior = null;
		$this->ante_grafico = null;
		$this->post_grafico = null;
		$this->tipo_grafico = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} // if ($deep)

		$this->aInforme = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BasePagina:' . $name))
		{
		  array_unshift($params, $this);
		  return call_user_func_array($callable, $params);
		}

		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		return parent::__call($name, $params);
	}

} // BasePagina
