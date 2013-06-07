<?php


/**
 * Base class that represents a query for the 'ponente' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Thu Jun  6 14:55:42 2013
 *
 * @method     PonenteQuery orderByNombre($order = Criteria::ASC) Order by the nombre column
 * @method     PonenteQuery orderByNacionalidad($order = Criteria::ASC) Order by the nacionalidad column
 * @method     PonenteQuery orderByEspecialidad($order = Criteria::ASC) Order by the especialidad column
 * @method     PonenteQuery orderById($order = Criteria::ASC) Order by the id column
 *
 * @method     PonenteQuery groupByNombre() Group by the nombre column
 * @method     PonenteQuery groupByNacionalidad() Group by the nacionalidad column
 * @method     PonenteQuery groupByEspecialidad() Group by the especialidad column
 * @method     PonenteQuery groupById() Group by the id column
 *
 * @method     PonenteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PonenteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PonenteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PonenteQuery leftJoinPonenteRelActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the PonenteRelActividad relation
 * @method     PonenteQuery rightJoinPonenteRelActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PonenteRelActividad relation
 * @method     PonenteQuery innerJoinPonenteRelActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the PonenteRelActividad relation
 *
 * @method     Ponente findOne(PropelPDO $con = null) Return the first Ponente matching the query
 * @method     Ponente findOneOrCreate(PropelPDO $con = null) Return the first Ponente matching the query, or a new Ponente object populated from the query conditions when no match is found
 *
 * @method     Ponente findOneByNombre(string $nombre) Return the first Ponente filtered by the nombre column
 * @method     Ponente findOneByNacionalidad(string $nacionalidad) Return the first Ponente filtered by the nacionalidad column
 * @method     Ponente findOneByEspecialidad(string $especialidad) Return the first Ponente filtered by the especialidad column
 * @method     Ponente findOneById(int $id) Return the first Ponente filtered by the id column
 *
 * @method     array findByNombre(string $nombre) Return Ponente objects filtered by the nombre column
 * @method     array findByNacionalidad(string $nacionalidad) Return Ponente objects filtered by the nacionalidad column
 * @method     array findByEspecialidad(string $especialidad) Return Ponente objects filtered by the especialidad column
 * @method     array findById(int $id) Return Ponente objects filtered by the id column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePonenteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePonenteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Ponente', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PonenteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PonenteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PonenteQuery) {
			return $criteria;
		}
		$query = new PonenteQuery();
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
	 * @return    Ponente|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PonentePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PonentePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PonentePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the nombre column
	 * 
	 * @param     string $nombre The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PonentePeer::NOMBRE, $nombre, $comparison);
	}

	/**
	 * Filter the query on the nacionalidad column
	 * 
	 * @param     string $nacionalidad The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByNacionalidad($nacionalidad = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nacionalidad)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nacionalidad)) {
				$nacionalidad = str_replace('*', '%', $nacionalidad);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::NACIONALIDAD, $nacionalidad, $comparison);
	}

	/**
	 * Filter the query on the especialidad column
	 * 
	 * @param     string $especialidad The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByEspecialidad($especialidad = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($especialidad)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $especialidad)) {
				$especialidad = str_replace('*', '%', $especialidad);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PonentePeer::ESPECIALIDAD, $especialidad, $comparison);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PonentePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query by a related PonenteRelActividad object
	 *
	 * @param     PonenteRelActividad $ponenteRelActividad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function filterByPonenteRelActividad($ponenteRelActividad, $comparison = null)
	{
		return $this
			->addUsingAlias(PonentePeer::ID, $ponenteRelActividad->getIdPonente(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the PonenteRelActividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function joinPonenteRelActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('PonenteRelActividad');
		
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
			$this->addJoinObject($join, 'PonenteRelActividad');
		}
		
		return $this;
	}

	/**
	 * Use the PonenteRelActividad relation PonenteRelActividad object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PonenteRelActividadQuery A secondary query class using the current class as primary query
	 */
	public function usePonenteRelActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPonenteRelActividad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'PonenteRelActividad', 'PonenteRelActividadQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Ponente $ponente Object to remove from the list of results
	 *
	 * @return    PonenteQuery The current query, for fluid interface
	 */
	public function prune($ponente = null)
	{
		if ($ponente) {
			$this->addUsingAlias(PonentePeer::ID, $ponente->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePonenteQuery
