<?php


/**
 * Base class that represents a query for the 'feria' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 18 12:35:57 2013
 *
 * @method     FeriaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     FeriaQuery orderByDescripcion($order = Criteria::ASC) Order by the descripcion column
 * @method     FeriaQuery orderByFechaInicio($order = Criteria::ASC) Order by the fecha_inicio column
 * @method     FeriaQuery orderByFechaFin($order = Criteria::ASC) Order by the fecha_fin column
 *
 * @method     FeriaQuery groupById() Group by the id column
 * @method     FeriaQuery groupByDescripcion() Group by the descripcion column
 * @method     FeriaQuery groupByFechaInicio() Group by the fecha_inicio column
 * @method     FeriaQuery groupByFechaFin() Group by the fecha_fin column
 *
 * @method     FeriaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     FeriaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     FeriaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     FeriaQuery leftJoinVisitante($relationAlias = null) Adds a LEFT JOIN clause to the query using the Visitante relation
 * @method     FeriaQuery rightJoinVisitante($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Visitante relation
 * @method     FeriaQuery innerJoinVisitante($relationAlias = null) Adds a INNER JOIN clause to the query using the Visitante relation
 *
 * @method     Feria findOne(PropelPDO $con = null) Return the first Feria matching the query
 * @method     Feria findOneOrCreate(PropelPDO $con = null) Return the first Feria matching the query, or a new Feria object populated from the query conditions when no match is found
 *
 * @method     Feria findOneById(string $id) Return the first Feria filtered by the id column
 * @method     Feria findOneByDescripcion(string $descripcion) Return the first Feria filtered by the descripcion column
 * @method     Feria findOneByFechaInicio(string $fecha_inicio) Return the first Feria filtered by the fecha_inicio column
 * @method     Feria findOneByFechaFin(string $fecha_fin) Return the first Feria filtered by the fecha_fin column
 *
 * @method     array findById(string $id) Return Feria objects filtered by the id column
 * @method     array findByDescripcion(string $descripcion) Return Feria objects filtered by the descripcion column
 * @method     array findByFechaInicio(string $fecha_inicio) Return Feria objects filtered by the fecha_inicio column
 * @method     array findByFechaFin(string $fecha_fin) Return Feria objects filtered by the fecha_fin column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseFeriaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseFeriaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Feria', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new FeriaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    FeriaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof FeriaQuery) {
			return $criteria;
		}
		$query = new FeriaQuery();
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
	 * @return    Feria|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = FeriaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(FeriaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(FeriaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     string|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(FeriaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the descripcion column
	 * 
	 * @param     string $descripcion The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterByDescripcion($descripcion = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcion)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcion)) {
				$descripcion = str_replace('*', '%', $descripcion);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(FeriaPeer::DESCRIPCION, $descripcion, $comparison);
	}

	/**
	 * Filter the query on the fecha_inicio column
	 * 
	 * @param     string|array $fechaInicio The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterByFechaInicio($fechaInicio = null, $comparison = null)
	{
		if (is_array($fechaInicio)) {
			$useMinMax = false;
			if (isset($fechaInicio['min'])) {
				$this->addUsingAlias(FeriaPeer::FECHA_INICIO, $fechaInicio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaInicio['max'])) {
				$this->addUsingAlias(FeriaPeer::FECHA_INICIO, $fechaInicio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FeriaPeer::FECHA_INICIO, $fechaInicio, $comparison);
	}

	/**
	 * Filter the query on the fecha_fin column
	 * 
	 * @param     string|array $fechaFin The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterByFechaFin($fechaFin = null, $comparison = null)
	{
		if (is_array($fechaFin)) {
			$useMinMax = false;
			if (isset($fechaFin['min'])) {
				$this->addUsingAlias(FeriaPeer::FECHA_FIN, $fechaFin['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaFin['max'])) {
				$this->addUsingAlias(FeriaPeer::FECHA_FIN, $fechaFin['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(FeriaPeer::FECHA_FIN, $fechaFin, $comparison);
	}

	/**
	 * Filter the query by a related Visitante object
	 *
	 * @param     Visitante $visitante  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function filterByVisitante($visitante, $comparison = null)
	{
		return $this
			->addUsingAlias(FeriaPeer::ID, $visitante->getIdFeria(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Visitante relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function joinVisitante($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Visitante');
		
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
			$this->addJoinObject($join, 'Visitante');
		}
		
		return $this;
	}

	/**
	 * Use the Visitante relation Visitante object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    VisitanteQuery A secondary query class using the current class as primary query
	 */
	public function useVisitanteQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinVisitante($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Visitante', 'VisitanteQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Feria $feria Object to remove from the list of results
	 *
	 * @return    FeriaQuery The current query, for fluid interface
	 */
	public function prune($feria = null)
	{
		if ($feria) {
			$this->addUsingAlias(FeriaPeer::ID, $feria->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseFeriaQuery
