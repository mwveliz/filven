<?php


/**
 * Base class that represents a query for the 'informe' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Thu Jun  6 14:55:42 2013
 *
 * @method     InformeQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     InformeQuery orderByTituloInforme($order = Criteria::ASC) Order by the titulo_informe column
 * @method     InformeQuery orderByFechaInforme($order = Criteria::ASC) Order by the fecha_informe column
 * @method     InformeQuery orderByCreadoPor($order = Criteria::ASC) Order by the creado_por column
 *
 * @method     InformeQuery groupById() Group by the id column
 * @method     InformeQuery groupByTituloInforme() Group by the titulo_informe column
 * @method     InformeQuery groupByFechaInforme() Group by the fecha_informe column
 * @method     InformeQuery groupByCreadoPor() Group by the creado_por column
 *
 * @method     InformeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     InformeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     InformeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     InformeQuery leftJoinPagina($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pagina relation
 * @method     InformeQuery rightJoinPagina($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pagina relation
 * @method     InformeQuery innerJoinPagina($relationAlias = null) Adds a INNER JOIN clause to the query using the Pagina relation
 *
 * @method     Informe findOne(PropelPDO $con = null) Return the first Informe matching the query
 * @method     Informe findOneOrCreate(PropelPDO $con = null) Return the first Informe matching the query, or a new Informe object populated from the query conditions when no match is found
 *
 * @method     Informe findOneById(int $id) Return the first Informe filtered by the id column
 * @method     Informe findOneByTituloInforme(string $titulo_informe) Return the first Informe filtered by the titulo_informe column
 * @method     Informe findOneByFechaInforme(string $fecha_informe) Return the first Informe filtered by the fecha_informe column
 * @method     Informe findOneByCreadoPor(string $creado_por) Return the first Informe filtered by the creado_por column
 *
 * @method     array findById(int $id) Return Informe objects filtered by the id column
 * @method     array findByTituloInforme(string $titulo_informe) Return Informe objects filtered by the titulo_informe column
 * @method     array findByFechaInforme(string $fecha_informe) Return Informe objects filtered by the fecha_informe column
 * @method     array findByCreadoPor(string $creado_por) Return Informe objects filtered by the creado_por column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseInformeQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseInformeQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Informe', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new InformeQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    InformeQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof InformeQuery) {
			return $criteria;
		}
		$query = new InformeQuery();
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
	 * @return    Informe|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = InformePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(InformePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(InformePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(InformePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the titulo_informe column
	 * 
	 * @param     string $tituloInforme The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterByTituloInforme($tituloInforme = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tituloInforme)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tituloInforme)) {
				$tituloInforme = str_replace('*', '%', $tituloInforme);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InformePeer::TITULO_INFORME, $tituloInforme, $comparison);
	}

	/**
	 * Filter the query on the fecha_informe column
	 * 
	 * @param     string|array $fechaInforme The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterByFechaInforme($fechaInforme = null, $comparison = null)
	{
		if (is_array($fechaInforme)) {
			$useMinMax = false;
			if (isset($fechaInforme['min'])) {
				$this->addUsingAlias(InformePeer::FECHA_INFORME, $fechaInforme['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaInforme['max'])) {
				$this->addUsingAlias(InformePeer::FECHA_INFORME, $fechaInforme['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(InformePeer::FECHA_INFORME, $fechaInforme, $comparison);
	}

	/**
	 * Filter the query on the creado_por column
	 * 
	 * @param     string $creadoPor The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterByCreadoPor($creadoPor = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($creadoPor)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $creadoPor)) {
				$creadoPor = str_replace('*', '%', $creadoPor);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(InformePeer::CREADO_POR, $creadoPor, $comparison);
	}

	/**
	 * Filter the query by a related Pagina object
	 *
	 * @param     Pagina $pagina  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function filterByPagina($pagina, $comparison = null)
	{
		return $this
			->addUsingAlias(InformePeer::ID, $pagina->getIdInforme(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Pagina relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function joinPagina($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Pagina');
		
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
			$this->addJoinObject($join, 'Pagina');
		}
		
		return $this;
	}

	/**
	 * Use the Pagina relation Pagina object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PaginaQuery A secondary query class using the current class as primary query
	 */
	public function usePaginaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinPagina($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Pagina', 'PaginaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Informe $informe Object to remove from the list of results
	 *
	 * @return    InformeQuery The current query, for fluid interface
	 */
	public function prune($informe = null)
	{
		if ($informe) {
			$this->addUsingAlias(InformePeer::ID, $informe->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseInformeQuery
