<?php


/**
 * Base class that represents a query for the 'respuesta_encuesta' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sat Mar  9 12:50:36 2013
 *
 * @method     RespuestaEncuestaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RespuestaEncuestaQuery orderByNumeroEncuesta($order = Criteria::ASC) Order by the numero_encuesta column
 * @method     RespuestaEncuestaQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     RespuestaEncuestaQuery orderByObservacion($order = Criteria::ASC) Order by the observacion column
 * @method     RespuestaEncuestaQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     RespuestaEncuestaQuery orderByApellido($order = Criteria::ASC) Order by the apellido column
 * @method     RespuestaEncuestaQuery orderByTelefono($order = Criteria::ASC) Order by the telefono column
 * @method     RespuestaEncuestaQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method     RespuestaEncuestaQuery orderByIdEncuesta($order = Criteria::ASC) Order by the id_encuesta column
 * @method     RespuestaEncuestaQuery orderByHora($order = Criteria::ASC) Order by the hora column
 *
 * @method     RespuestaEncuestaQuery groupById() Group by the id column
 * @method     RespuestaEncuestaQuery groupByNumeroEncuesta() Group by the numero_encuesta column
 * @method     RespuestaEncuestaQuery groupByFecha() Group by the fecha column
 * @method     RespuestaEncuestaQuery groupByObservacion() Group by the observacion column
 * @method     RespuestaEncuestaQuery groupByNombre() Group by the nombre column
 * @method     RespuestaEncuestaQuery groupByApellido() Group by the apellido column
 * @method     RespuestaEncuestaQuery groupByTelefono() Group by the telefono column
 * @method     RespuestaEncuestaQuery groupByEmail() Group by the email column
 * @method     RespuestaEncuestaQuery groupByIdEncuesta() Group by the id_encuesta column
 * @method     RespuestaEncuestaQuery groupByHora() Group by the hora column
 *
 * @method     RespuestaEncuestaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RespuestaEncuestaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RespuestaEncuestaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RespuestaEncuestaQuery leftJoinEncuesta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Encuesta relation
 * @method     RespuestaEncuestaQuery rightJoinEncuesta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Encuesta relation
 * @method     RespuestaEncuestaQuery innerJoinEncuesta($relationAlias = null) Adds a INNER JOIN clause to the query using the Encuesta relation
 *
 * @method     RespuestaEncuestaQuery leftJoinRespuestaItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespuestaItem relation
 * @method     RespuestaEncuestaQuery rightJoinRespuestaItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespuestaItem relation
 * @method     RespuestaEncuestaQuery innerJoinRespuestaItem($relationAlias = null) Adds a INNER JOIN clause to the query using the RespuestaItem relation
 *
 * @method     RespuestaEncuesta findOne(PropelPDO $con = null) Return the first RespuestaEncuesta matching the query
 * @method     RespuestaEncuesta findOneOrCreate(PropelPDO $con = null) Return the first RespuestaEncuesta matching the query, or a new RespuestaEncuesta object populated from the query conditions when no match is found
 *
 * @method     RespuestaEncuesta findOneById(int $id) Return the first RespuestaEncuesta filtered by the id column
 * @method     RespuestaEncuesta findOneByNumeroEncuesta(int $numero_encuesta) Return the first RespuestaEncuesta filtered by the numero_encuesta column
 * @method     RespuestaEncuesta findOneByFecha(string $fecha) Return the first RespuestaEncuesta filtered by the fecha column
 * @method     RespuestaEncuesta findOneByObservacion(string $observacion) Return the first RespuestaEncuesta filtered by the observacion column
 * @method     RespuestaEncuesta findOneByNombre(string $nombre) Return the first RespuestaEncuesta filtered by the nombre column
 * @method     RespuestaEncuesta findOneByApellido(string $apellido) Return the first RespuestaEncuesta filtered by the apellido column
 * @method     RespuestaEncuesta findOneByTelefono(string $telefono) Return the first RespuestaEncuesta filtered by the telefono column
 * @method     RespuestaEncuesta findOneByEmail(string $email) Return the first RespuestaEncuesta filtered by the email column
 * @method     RespuestaEncuesta findOneByIdEncuesta(string $id_encuesta) Return the first RespuestaEncuesta filtered by the id_encuesta column
 * @method     RespuestaEncuesta findOneByHora(string $hora) Return the first RespuestaEncuesta filtered by the hora column
 *
 * @method     array findById(int $id) Return RespuestaEncuesta objects filtered by the id column
 * @method     array findByNumeroEncuesta(int $numero_encuesta) Return RespuestaEncuesta objects filtered by the numero_encuesta column
 * @method     array findByFecha(string $fecha) Return RespuestaEncuesta objects filtered by the fecha column
 * @method     array findByObservacion(string $observacion) Return RespuestaEncuesta objects filtered by the observacion column
 * @method     array findByNombre(string $nombre) Return RespuestaEncuesta objects filtered by the nombre column
 * @method     array findByApellido(string $apellido) Return RespuestaEncuesta objects filtered by the apellido column
 * @method     array findByTelefono(string $telefono) Return RespuestaEncuesta objects filtered by the telefono column
 * @method     array findByEmail(string $email) Return RespuestaEncuesta objects filtered by the email column
 * @method     array findByIdEncuesta(string $id_encuesta) Return RespuestaEncuesta objects filtered by the id_encuesta column
 * @method     array findByHora(string $hora) Return RespuestaEncuesta objects filtered by the hora column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRespuestaEncuestaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseRespuestaEncuestaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RespuestaEncuesta', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RespuestaEncuestaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RespuestaEncuestaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RespuestaEncuestaQuery) {
			return $criteria;
		}
		$query = new RespuestaEncuestaQuery();
		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}
		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}
		return $query;
	}

	/**
	 * Find object by primary key
	 * Use instance pooling to avoid a database query if the object exists
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 * @param     mixed $key Primary key to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    RespuestaEncuesta|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RespuestaEncuestaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
			// the object is alredy in the instance pool
			return $obj;
		} else {
			// the object has not been requested yet, or the formatter is not an object formatter
			$criteria = $this->isKeepQuery() ? clone $this : $this;
			$stmt = $criteria
				->filterByPrimaryKey($key)
				->getSelectStatement($con);
			return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
		}
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param     array $keys Primary keys to use for the query
	 * @param     PropelPDO $con an optional connection object
	 *
	 * @return    PropelObjectCollection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, $con = null)
	{	
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		return $this
			->filterByPrimaryKeys($keys)
			->find($con);
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param     mixed $key Primary key to use for the query
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RespuestaEncuestaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RespuestaEncuestaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the numero_encuesta column
	 * 
	 * @param     int|array $numeroEncuesta The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByNumeroEncuesta($numeroEncuesta = null, $comparison = null)
	{
		if (is_array($numeroEncuesta)) {
			$useMinMax = false;
			if (isset($numeroEncuesta['min'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::NUMERO_ENCUESTA, $numeroEncuesta['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numeroEncuesta['max'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::NUMERO_ENCUESTA, $numeroEncuesta['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::NUMERO_ENCUESTA, $numeroEncuesta, $comparison);
	}

	/**
	 * Filter the query on the fecha column
	 * 
	 * @param     string|array $fecha The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the observacion column
	 * 
	 * @param     string $observacion The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByObservacion($observacion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observacion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observacion)) {
				$observacion = str_replace('*', '%', $observacion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::OBSERVACION, $observacion, $comparison);
	}

	/**
	 * Filter the query on the nombre column
	 * 
	 * @param     string $nombre The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByNombre($nombre = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombre)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombre)) {
				$nombre = str_replace('*', '%', $nombre);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the apellido column
	 * 
	 * @param     string $apellido The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByApellido($apellido = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($apellido)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $apellido)) {
				$apellido = str_replace('*', '%', $apellido);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::APELLIDO, $apellido, $comparison);
	}

	/**
	 * Filter the query on the telefono column
	 * 
	 * @param     string $telefono The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByTelefono($telefono = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($telefono)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $telefono)) {
				$telefono = str_replace('*', '%', $telefono);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::TELEFONO, $telefono, $comparison);
	}

	/**
	 * Filter the query on the email column
	 * 
	 * @param     string $email The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByEmail($email = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($email)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $email)) {
				$email = str_replace('*', '%', $email);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::EMAIL, $email, $comparison);
	}

	/**
	 * Filter the query on the id_encuesta column
	 * 
	 * @param     string|array $idEncuesta The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByIdEncuesta($idEncuesta = null, $comparison = null)
	{
		if (is_array($idEncuesta)) {
			$useMinMax = false;
			if (isset($idEncuesta['min'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::ID_ENCUESTA, $idEncuesta['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idEncuesta['max'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::ID_ENCUESTA, $idEncuesta['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::ID_ENCUESTA, $idEncuesta, $comparison);
	}

	/**
	 * Filter the query on the hora column
	 * 
	 * @param     string|array $hora The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByHora($hora = null, $comparison = null)
	{
		if (is_array($hora)) {
			$useMinMax = false;
			if (isset($hora['min'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::HORA, $hora['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hora['max'])) {
				$this->addUsingAlias(RespuestaEncuestaPeer::HORA, $hora['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaPeer::HORA, $hora, $comparison);
	}

	/**
	 * Filter the query by a related Encuesta object
	 *
	 * @param     Encuesta $encuesta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByEncuesta($encuesta, $comparison = null)
	{
		return $this
			->addUsingAlias(RespuestaEncuestaPeer::ID_ENCUESTA, $encuesta->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Encuesta relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function joinEncuesta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Encuesta');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'Encuesta');
		}
		
		return $this;
	}

	/**
	 * Use the Encuesta relation Encuesta object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EncuestaQuery A secondary query class using the current class as primary query
	 */
	public function useEncuestaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinEncuesta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Encuesta', 'EncuestaQuery');
	}

	/**
	 * Filter the query by a related RespuestaItem object
	 *
	 * @param     RespuestaItem $respuestaItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function filterByRespuestaItem($respuestaItem, $comparison = null)
	{
		return $this
			->addUsingAlias(RespuestaEncuestaPeer::ID, $respuestaItem->getIdRespuestaEncuesta(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the RespuestaItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function joinRespuestaItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RespuestaItem');
		
		// create a ModelJoin object for this join
		$join = new ModelJoin();
		$join->setJoinType($joinType);
		$join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
		if ($previousJoin = $this->getPreviousJoin()) {
			$join->setPreviousJoin($previousJoin);
		}
		
		// add the ModelJoin to the current object
		if($relationAlias) {
			$this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
			$this->addJoinObject($join, $relationAlias);
		} else {
			$this->addJoinObject($join, 'RespuestaItem');
		}
		
		return $this;
	}

	/**
	 * Use the RespuestaItem relation RespuestaItem object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespuestaItemQuery A secondary query class using the current class as primary query
	 */
	public function useRespuestaItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRespuestaItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RespuestaItem', 'RespuestaItemQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RespuestaEncuesta $respuestaEncuesta Object to remove from the list of results
	 *
	 * @return    RespuestaEncuestaQuery The current query, for fluid interface
	 */
	public function prune($respuestaEncuesta = null)
	{
		if ($respuestaEncuesta) {
			$this->addUsingAlias(RespuestaEncuestaPeer::ID, $respuestaEncuesta->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseRespuestaEncuestaQuery
