<?php


/**
 * Base class that represents a query for the 'tipo_actividad' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 18 12:35:57 2013
 *
 * @method     TipoActividadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     TipoActividadQuery orderByNombreTipo($order = Criteria::ASC) Order by the nombre_tipo column
 * @method     TipoActividadQuery orderByDescripcionTipo($order = Criteria::ASC) Order by the descripcion_tipo column
 *
 * @method     TipoActividadQuery groupById() Group by the id column
 * @method     TipoActividadQuery groupByNombreTipo() Group by the nombre_tipo column
 * @method     TipoActividadQuery groupByDescripcionTipo() Group by the descripcion_tipo column
 *
 * @method     TipoActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     TipoActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     TipoActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     TipoActividadQuery leftJoinActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the Actividad relation
 * @method     TipoActividadQuery rightJoinActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Actividad relation
 * @method     TipoActividadQuery innerJoinActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the Actividad relation
 *
 * @method     TipoActividad findOne(PropelPDO $con = null) Return the first TipoActividad matching the query
 * @method     TipoActividad findOneOrCreate(PropelPDO $con = null) Return the first TipoActividad matching the query, or a new TipoActividad object populated from the query conditions when no match is found
 *
 * @method     TipoActividad findOneById(int $id) Return the first TipoActividad filtered by the id column
 * @method     TipoActividad findOneByNombreTipo(string $nombre_tipo) Return the first TipoActividad filtered by the nombre_tipo column
 * @method     TipoActividad findOneByDescripcionTipo(string $descripcion_tipo) Return the first TipoActividad filtered by the descripcion_tipo column
 *
 * @method     array findById(int $id) Return TipoActividad objects filtered by the id column
 * @method     array findByNombreTipo(string $nombre_tipo) Return TipoActividad objects filtered by the nombre_tipo column
 * @method     array findByDescripcionTipo(string $descripcion_tipo) Return TipoActividad objects filtered by the descripcion_tipo column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseTipoActividadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseTipoActividadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'TipoActividad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new TipoActividadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    TipoActividadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof TipoActividadQuery) {
			return $criteria;
		}
		$query = new TipoActividadQuery();
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
	 * @return    TipoActividad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = TipoActividadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(TipoActividadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(TipoActividadPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(TipoActividadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_tipo column
	 * 
	 * @param     string $nombreTipo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function filterByNombreTipo($nombreTipo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreTipo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreTipo)) {
				$nombreTipo = str_replace('*', '%', $nombreTipo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TipoActividadPeer::NOMBRE_TIPO, $nombreTipo, $comparison);
	}

	/**
	 * Filter the query on the descripcion_tipo column
	 * 
	 * @param     string $descripcionTipo The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function filterByDescripcionTipo($descripcionTipo = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcionTipo)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcionTipo)) {
				$descripcionTipo = str_replace('*', '%', $descripcionTipo);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(TipoActividadPeer::DESCRIPCION_TIPO, $descripcionTipo, $comparison);
	}

	/**
	 * Filter the query by a related Actividad object
	 *
	 * @param     Actividad $actividad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function filterByActividad($actividad, $comparison = null)
	{
		return $this
			->addUsingAlias(TipoActividadPeer::ID, $actividad->getIdTipoActividad(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Actividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
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
	 * Exclude object from result
	 *
	 * @param     TipoActividad $tipoActividad Object to remove from the list of results
	 *
	 * @return    TipoActividadQuery The current query, for fluid interface
	 */
	public function prune($tipoActividad = null)
	{
		if ($tipoActividad) {
			$this->addUsingAlias(TipoActividadPeer::ID, $tipoActividad->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseTipoActividadQuery
