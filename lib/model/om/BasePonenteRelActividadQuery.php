<?php


/**
 * Base class that represents a query for the 'ponente_rel_actividad' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 25 17:57:31 2013
 *
 * @method     PonenteRelActividadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PonenteRelActividadQuery orderByIdActividad($order = Criteria::ASC) Order by the id_actividad column
 * @method     PonenteRelActividadQuery orderByIdPonente($order = Criteria::ASC) Order by the id_ponente column
 *
 * @method     PonenteRelActividadQuery groupById() Group by the id column
 * @method     PonenteRelActividadQuery groupByIdActividad() Group by the id_actividad column
 * @method     PonenteRelActividadQuery groupByIdPonente() Group by the id_ponente column
 *
 * @method     PonenteRelActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PonenteRelActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PonenteRelActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PonenteRelActividadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     PonenteRelActividadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     PonenteRelActividadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     PonenteRelActividadQuery leftJoinPonente($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ponente relation
 * @method     PonenteRelActividadQuery rightJoinPonente($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ponente relation
 * @method     PonenteRelActividadQuery innerJoinPonente($relationAlias = null) Adds a INNER JOIN clause to the query using the Ponente relation
 *
 * @method     PonenteRelActividad findOne(PropelPDO $con = null) Return the first PonenteRelActividad matching the query
 * @method     PonenteRelActividad findOneOrCreate(PropelPDO $con = null) Return the first PonenteRelActividad matching the query, or a new PonenteRelActividad object populated from the query conditions when no match is found
 *
 * @method     PonenteRelActividad findOneById(int $id) Return the first PonenteRelActividad filtered by the id column
 * @method     PonenteRelActividad findOneByIdActividad(int $id_actividad) Return the first PonenteRelActividad filtered by the id_actividad column
 * @method     PonenteRelActividad findOneByIdPonente(int $id_ponente) Return the first PonenteRelActividad filtered by the id_ponente column
 *
 * @method     array findById(int $id) Return PonenteRelActividad objects filtered by the id column
 * @method     array findByIdActividad(int $id_actividad) Return PonenteRelActividad objects filtered by the id_actividad column
 * @method     array findByIdPonente(int $id_ponente) Return PonenteRelActividad objects filtered by the id_ponente column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePonenteRelActividadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePonenteRelActividadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'PonenteRelActividad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PonenteRelActividadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PonenteRelActividadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PonenteRelActividadQuery) {
			return $criteria;
		}
		$query = new PonenteRelActividadQuery();
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
	 * @return    PonenteRelActividad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PonenteRelActividadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PonenteRelActividadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PonenteRelActividadPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PonenteRelActividadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_actividad column
	 * 
	 * @param     int|array $idActividad The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterByIdActividad($idActividad = null, $comparison = null)
	{
		if (is_array($idActividad)) {
			$useMinMax = false;
			if (isset($idActividad['min'])) {
				$this->addUsingAlias(PonenteRelActividadPeer::ID_ACTIVIDAD, $idActividad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idActividad['max'])) {
				$this->addUsingAlias(PonenteRelActividadPeer::ID_ACTIVIDAD, $idActividad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PonenteRelActividadPeer::ID_ACTIVIDAD, $idActividad, $comparison);
	}

	/**
	 * Filter the query on the id_ponente column
	 * 
	 * @param     int|array $idPonente The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterByIdPonente($idPonente = null, $comparison = null)
	{
		if (is_array($idPonente)) {
			$useMinMax = false;
			if (isset($idPonente['min'])) {
				$this->addUsingAlias(PonenteRelActividadPeer::ID_PONENTE, $idPonente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idPonente['max'])) {
				$this->addUsingAlias(PonenteRelActividadPeer::ID_PONENTE, $idPonente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PonenteRelActividadPeer::ID_PONENTE, $idPonente, $comparison);
	}

	/**
	 * Filter the query by a related Actividad object
	 *
	 * @param     Actividad $actividad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterByActividad($actividad, $comparison = null)
	{
		return $this
			->addUsingAlias(PonenteRelActividadPeer::ID_ACTIVIDAD, $actividad->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Actividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function joinActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Actividad');
		
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
			$this->addJoinObject($join, 'Actividad');
		}
		
		return $this;
	}

	/**
	 * Use the Actividad relation Actividad object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActividadQuery A secondary query class using the current class as primary query
	 */
	public function useActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinActividad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Actividad', 'ActividadQuery');
	}

	/**
	 * Filter the query by a related Ponente object
	 *
	 * @param     Ponente $ponente  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function filterByPonente($ponente, $comparison = null)
	{
		return $this
			->addUsingAlias(PonenteRelActividadPeer::ID_PONENTE, $ponente->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Ponente relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function joinPonente($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Ponente');
		
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
			$this->addJoinObject($join, 'Ponente');
		}
		
		return $this;
	}

	/**
	 * Use the Ponente relation Ponente object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteQuery A secondary query class using the current class as primary query
	 */
	public function usePonenteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPonente($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Ponente', 'PonenteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     PonenteRelActividad $ponenteRelActividad Object to remove from the list of results
	 *
	 * @return    PonenteRelActividadQuery The current query, for fluid interface
	 */
	public function prune($ponenteRelActividad = null)
	{
		if ($ponenteRelActividad) {
			$this->addUsingAlias(PonenteRelActividadPeer::ID, $ponenteRelActividad->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePonenteRelActividadQuery
