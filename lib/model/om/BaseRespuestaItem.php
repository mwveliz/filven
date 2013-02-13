<?php


/**
 * Base class that represents a row from the 'respuesta_item' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Wed Feb 13 11:48:54 2013
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRespuestaItem extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
	const PEER = 'RespuestaItemPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        RespuestaItemPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        string
	 */
	protected $id;

	/**
	 * The value for the id_respuesta_encuesta field.
	 * @var        string
	 */
	protected $id_respuesta_encuesta;

	/**
	 * The value for the valor field.
	 * @var        string
	 */
	protected $valor;

	/**
	 * The value for the id_item field.
	 * @var        string
	 */
	protected $id_item;

	/**
	 * The value for the tipo_item field.
	 * @var        string
	 */
	protected $tipo_item;

	/**
	 * The value for the id_opcion field.
	 * @var        string
	 */
	protected $id_opcion;

	/**
	 * @var        RespuestaEncuesta
	 */
	protected $aRespuestaEncuesta;

	/**
	 * @var        Item
	 */
	protected $aItem;

	/**
	 * @var        OpcionRespuesta
	 */
	protected $aOpcionRespuesta;

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
	 * @return     string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the [id_respuesta_encuesta] column value.
	 * 
	 * @return     string
	 */
	public function getIdRespuestaEncuesta()
	{
		return $this->id_respuesta_encuesta;
	}

	/**
	 * Get the [valor] column value.
	 * 
	 * @return     string
	 */
	public function getValor()
	{
		return $this->valor;
	}

	/**
	 * Get the [id_item] column value.
	 * 
	 * @return     string
	 */
	public function getIdItem()
	{
		return $this->id_item;
	}

	/**
	 * Get the [tipo_item] column value.
	 * 
	 * @return     string
	 */
	public function getTipoItem()
	{
		return $this->tipo_item;
	}

	/**
	 * Get the [id_opcion] column value.
	 * 
	 * @return     string
	 */
	public function getIdOpcion()
	{
		return $this->id_opcion;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      string $v new value
	 * @return     RespuestaItem The current object (for fluent API support)
	 */
	public function setId($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RespuestaItemPeer::ID;
		}

		return $this;
	} // setId()

	/**
	 * Set the value of [id_respuesta_encuesta] column.
	 * 
	 * @param      string $v new value
	 * @return     RespuestaItem The current object (for fluent API support)
	 */
	public function setIdRespuestaEncuesta($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id_respuesta_encuesta !== $v) {
			$this->id_respuesta_encuesta = $v;
			$this->modifiedColumns[] = RespuestaItemPeer::ID_RESPUESTA_ENCUESTA;
		}

		if ($this->aRespuestaEncuesta !== null && $this->aRespuestaEncuesta->getId() !== $v) {
			$this->aRespuestaEncuesta = null;
		}

		return $this;
	} // setIdRespuestaEncuesta()

	/**
	 * Set the value of [valor] column.
	 * 
	 * @param      string $v new value
	 * @return     RespuestaItem The current object (for fluent API support)
	 */
	public function setValor($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->valor !== $v) {
			$this->valor = $v;
			$this->modifiedColumns[] = RespuestaItemPeer::VALOR;
		}

		return $this;
	} // setValor()

	/**
	 * Set the value of [id_item] column.
	 * 
	 * @param      string $v new value
	 * @return     RespuestaItem The current object (for fluent API support)
	 */
	public function setIdItem($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id_item !== $v) {
			$this->id_item = $v;
			$this->modifiedColumns[] = RespuestaItemPeer::ID_ITEM;
		}

		if ($this->aItem !== null && $this->aItem->getId() !== $v) {
			$this->aItem = null;
		}

		return $this;
	} // setIdItem()

	/**
	 * Set the value of [tipo_item] column.
	 * 
	 * @param      string $v new value
	 * @return     RespuestaItem The current object (for fluent API support)
	 */
	public function setTipoItem($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->tipo_item !== $v) {
			$this->tipo_item = $v;
			$this->modifiedColumns[] = RespuestaItemPeer::TIPO_ITEM;
		}

		return $this;
	} // setTipoItem()

	/**
	 * Set the value of [id_opcion] column.
	 * 
	 * @param      string $v new value
	 * @return     RespuestaItem The current object (for fluent API support)
	 */
	public function setIdOpcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->id_opcion !== $v) {
			$this->id_opcion = $v;
			$this->modifiedColumns[] = RespuestaItemPeer::ID_OPCION;
		}

		if ($this->aOpcionRespuesta !== null && $this->aOpcionRespuesta->getId() !== $v) {
			$this->aOpcionRespuesta = null;
		}

		return $this;
	} // setIdOpcion()

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

			$this->id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
			$this->id_respuesta_encuesta = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->valor = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->id_item = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->tipo_item = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->id_opcion = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 6; // 6 = RespuestaItemPeer::NUM_COLUMNS - RespuestaItemPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating RespuestaItem object", $e);
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

		if ($this->aRespuestaEncuesta !== null && $this->id_respuesta_encuesta !== $this->aRespuestaEncuesta->getId()) {
			$this->aRespuestaEncuesta = null;
		}
		if ($this->aItem !== null && $this->id_item !== $this->aItem->getId()) {
			$this->aItem = null;
		}
		if ($this->aOpcionRespuesta !== null && $this->id_opcion !== $this->aOpcionRespuesta->getId()) {
			$this->aOpcionRespuesta = null;
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
			$con = Propel::getConnection(RespuestaItemPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = RespuestaItemPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->aRespuestaEncuesta = null;
			$this->aItem = null;
			$this->aOpcionRespuesta = null;
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
			$con = Propel::getConnection(RespuestaItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseRespuestaItem:delete:pre') as $callable)
			{
			  if (call_user_func($callable, $this, $con))
			  {
			    $con->commit();
			    return;
			  }
			}

			if ($ret) {
				RespuestaItemQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				// symfony_behaviors behavior
				foreach (sfMixer::getCallables('BaseRespuestaItem:delete:post') as $callable)
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
			$con = Propel::getConnection(RespuestaItemPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			// symfony_behaviors behavior
			foreach (sfMixer::getCallables('BaseRespuestaItem:save:pre') as $callable)
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
				foreach (sfMixer::getCallables('BaseRespuestaItem:save:post') as $callable)
				{
				  call_user_func($callable, $this, $con, $affectedRows);
				}

				RespuestaItemPeer::addInstanceToPool($this);
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

			if ($this->aRespuestaEncuesta !== null) {
				if ($this->aRespuestaEncuesta->isModified() || $this->aRespuestaEncuesta->isNew()) {
					$affectedRows += $this->aRespuestaEncuesta->save($con);
				}
				$this->setRespuestaEncuesta($this->aRespuestaEncuesta);
			}

			if ($this->aItem !== null) {
				if ($this->aItem->isModified() || $this->aItem->isNew()) {
					$affectedRows += $this->aItem->save($con);
				}
				$this->setItem($this->aItem);
			}

			if ($this->aOpcionRespuesta !== null) {
				if ($this->aOpcionRespuesta->isModified() || $this->aOpcionRespuesta->isNew()) {
					$affectedRows += $this->aOpcionRespuesta->save($con);
				}
				$this->setOpcionRespuesta($this->aOpcionRespuesta);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RespuestaItemPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(RespuestaItemPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.RespuestaItemPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows += 1;
					$this->setId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows += RespuestaItemPeer::doUpdate($this, $con);
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

			if ($this->aRespuestaEncuesta !== null) {
				if (!$this->aRespuestaEncuesta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aRespuestaEncuesta->getValidationFailures());
				}
			}

			if ($this->aItem !== null) {
				if (!$this->aItem->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aItem->getValidationFailures());
				}
			}

			if ($this->aOpcionRespuesta !== null) {
				if (!$this->aOpcionRespuesta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aOpcionRespuesta->getValidationFailures());
				}
			}


			if (($retval = RespuestaItemPeer::doValidate($this, $columns)) !== true) {
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
		$pos = RespuestaItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getIdRespuestaEncuesta();
				break;
			case 2:
				return $this->getValor();
				break;
			case 3:
				return $this->getIdItem();
				break;
			case 4:
				return $this->getTipoItem();
				break;
			case 5:
				return $this->getIdOpcion();
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
		$keys = RespuestaItemPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdRespuestaEncuesta(),
			$keys[2] => $this->getValor(),
			$keys[3] => $this->getIdItem(),
			$keys[4] => $this->getTipoItem(),
			$keys[5] => $this->getIdOpcion(),
		);
		if ($includeForeignObjects) {
			if (null !== $this->aRespuestaEncuesta) {
				$result['RespuestaEncuesta'] = $this->aRespuestaEncuesta->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aItem) {
				$result['Item'] = $this->aItem->toArray($keyType, $includeLazyLoadColumns, true);
			}
			if (null !== $this->aOpcionRespuesta) {
				$result['OpcionRespuesta'] = $this->aOpcionRespuesta->toArray($keyType, $includeLazyLoadColumns, true);
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
		$pos = RespuestaItemPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setIdRespuestaEncuesta($value);
				break;
			case 2:
				$this->setValor($value);
				break;
			case 3:
				$this->setIdItem($value);
				break;
			case 4:
				$this->setTipoItem($value);
				break;
			case 5:
				$this->setIdOpcion($value);
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
		$keys = RespuestaItemPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdRespuestaEncuesta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setValor($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setIdItem($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setTipoItem($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setIdOpcion($arr[$keys[5]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(RespuestaItemPeer::DATABASE_NAME);

		if ($this->isColumnModified(RespuestaItemPeer::ID)) $criteria->add(RespuestaItemPeer::ID, $this->id);
		if ($this->isColumnModified(RespuestaItemPeer::ID_RESPUESTA_ENCUESTA)) $criteria->add(RespuestaItemPeer::ID_RESPUESTA_ENCUESTA, $this->id_respuesta_encuesta);
		if ($this->isColumnModified(RespuestaItemPeer::VALOR)) $criteria->add(RespuestaItemPeer::VALOR, $this->valor);
		if ($this->isColumnModified(RespuestaItemPeer::ID_ITEM)) $criteria->add(RespuestaItemPeer::ID_ITEM, $this->id_item);
		if ($this->isColumnModified(RespuestaItemPeer::TIPO_ITEM)) $criteria->add(RespuestaItemPeer::TIPO_ITEM, $this->tipo_item);
		if ($this->isColumnModified(RespuestaItemPeer::ID_OPCION)) $criteria->add(RespuestaItemPeer::ID_OPCION, $this->id_opcion);

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
		$criteria = new Criteria(RespuestaItemPeer::DATABASE_NAME);
		$criteria->add(RespuestaItemPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     string
	 */
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      string $key Primary key.
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
	 * @param      object $copyObj An object of RespuestaItem (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setIdRespuestaEncuesta($this->id_respuesta_encuesta);
		$copyObj->setValor($this->valor);
		$copyObj->setIdItem($this->id_item);
		$copyObj->setTipoItem($this->tipo_item);
		$copyObj->setIdOpcion($this->id_opcion);

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
	 * @return     RespuestaItem Clone of current object.
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
	 * @return     RespuestaItemPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new RespuestaItemPeer();
		}
		return self::$peer;
	}

	/**
	 * Declares an association between this object and a RespuestaEncuesta object.
	 *
	 * @param      RespuestaEncuesta $v
	 * @return     RespuestaItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setRespuestaEncuesta(RespuestaEncuesta $v = null)
	{
		if ($v === null) {
			$this->setIdRespuestaEncuesta(NULL);
		} else {
			$this->setIdRespuestaEncuesta($v->getId());
		}

		$this->aRespuestaEncuesta = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the RespuestaEncuesta object, it will not be re-added.
		if ($v !== null) {
			$v->addRespuestaItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated RespuestaEncuesta object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     RespuestaEncuesta The associated RespuestaEncuesta object.
	 * @throws     PropelException
	 */
	public function getRespuestaEncuesta(PropelPDO $con = null)
	{
		if ($this->aRespuestaEncuesta === null && (($this->id_respuesta_encuesta !== "" && $this->id_respuesta_encuesta !== null))) {
			$this->aRespuestaEncuesta = RespuestaEncuestaQuery::create()->findPk($this->id_respuesta_encuesta, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aRespuestaEncuesta->addRespuestaItems($this);
			 */
		}
		return $this->aRespuestaEncuesta;
	}

	/**
	 * Declares an association between this object and a Item object.
	 *
	 * @param      Item $v
	 * @return     RespuestaItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setItem(Item $v = null)
	{
		if ($v === null) {
			$this->setIdItem(NULL);
		} else {
			$this->setIdItem($v->getId());
		}

		$this->aItem = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the Item object, it will not be re-added.
		if ($v !== null) {
			$v->addRespuestaItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated Item object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     Item The associated Item object.
	 * @throws     PropelException
	 */
	public function getItem(PropelPDO $con = null)
	{
		if ($this->aItem === null && (($this->id_item !== "" && $this->id_item !== null))) {
			$this->aItem = ItemQuery::create()->findPk($this->id_item, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aItem->addRespuestaItems($this);
			 */
		}
		return $this->aItem;
	}

	/**
	 * Declares an association between this object and a OpcionRespuesta object.
	 *
	 * @param      OpcionRespuesta $v
	 * @return     RespuestaItem The current object (for fluent API support)
	 * @throws     PropelException
	 */
	public function setOpcionRespuesta(OpcionRespuesta $v = null)
	{
		if ($v === null) {
			$this->setIdOpcion(NULL);
		} else {
			$this->setIdOpcion($v->getId());
		}

		$this->aOpcionRespuesta = $v;

		// Add binding for other direction of this n:n relationship.
		// If this object has already been added to the OpcionRespuesta object, it will not be re-added.
		if ($v !== null) {
			$v->addRespuestaItem($this);
		}

		return $this;
	}


	/**
	 * Get the associated OpcionRespuesta object
	 *
	 * @param      PropelPDO Optional Connection object.
	 * @return     OpcionRespuesta The associated OpcionRespuesta object.
	 * @throws     PropelException
	 */
	public function getOpcionRespuesta(PropelPDO $con = null)
	{
		if ($this->aOpcionRespuesta === null && (($this->id_opcion !== "" && $this->id_opcion !== null))) {
			$this->aOpcionRespuesta = OpcionRespuestaQuery::create()->findPk($this->id_opcion, $con);
			/* The following can be used additionally to
				 guarantee the related object contains a reference
				 to this object.  This level of coupling may, however, be
				 undesirable since it could result in an only partially populated collection
				 in the referenced object.
				 $this->aOpcionRespuesta->addRespuestaItems($this);
			 */
		}
		return $this->aOpcionRespuesta;
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->id_respuesta_encuesta = null;
		$this->valor = null;
		$this->id_item = null;
		$this->tipo_item = null;
		$this->id_opcion = null;
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

		$this->aRespuestaEncuesta = null;
		$this->aItem = null;
		$this->aOpcionRespuesta = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		// symfony_behaviors behavior
		if ($callable = sfMixer::getCallable('BaseRespuestaItem:' . $name))
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

} // BaseRespuestaItem
