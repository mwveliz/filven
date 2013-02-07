<?php


/**
 * Base class that represents a query for the 'respuesta_encuesta_visitante' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sun Feb  3 11:54:09 2013
 *
 * @method     RespuestaEncuestaVisitanteQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     RespuestaEncuestaVisitanteQuery orderByIdItem($order = Criteria::ASC) Order by the id_item column
 * @method     RespuestaEncuestaVisitanteQuery orderByRespuesta($order = Criteria::ASC) Order by the respuesta column
 *
 * @method     RespuestaEncuestaVisitanteQuery groupById() Group by the id column
 * @method     RespuestaEncuestaVisitanteQuery groupByIdItem() Group by the id_item column
 * @method     RespuestaEncuestaVisitanteQuery groupByRespuesta() Group by the respuesta column
 *
 * @method     RespuestaEncuestaVisitanteQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     RespuestaEncuestaVisitanteQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     RespuestaEncuestaVisitanteQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     RespuestaEncuestaVisitanteQuery leftJoinItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Item relation
 * @method     RespuestaEncuestaVisitanteQuery rightJoinItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Item relation
 * @method     RespuestaEncuestaVisitanteQuery innerJoinItem($relationAlias = null) Adds a INNER JOIN clause to the query using the Item relation
 *
 * @method     RespuestaEncuestaVisitante findOne(PropelPDO $con = null) Return the first RespuestaEncuestaVisitante matching the query
 * @method     RespuestaEncuestaVisitante findOneOrCreate(PropelPDO $con = null) Return the first RespuestaEncuestaVisitante matching the query, or a new RespuestaEncuestaVisitante object populated from the query conditions when no match is found
 *
 * @method     RespuestaEncuestaVisitante findOneById(int $id) Return the first RespuestaEncuestaVisitante filtered by the id column
 * @method     RespuestaEncuestaVisitante findOneByIdItem(int $id_item) Return the first RespuestaEncuestaVisitante filtered by the id_item column
 * @method     RespuestaEncuestaVisitante findOneByRespuesta(string $respuesta) Return the first RespuestaEncuestaVisitante filtered by the respuesta column
 *
 * @method     array findById(int $id) Return RespuestaEncuestaVisitante objects filtered by the id column
 * @method     array findByIdItem(int $id_item) Return RespuestaEncuestaVisitante objects filtered by the id_item column
 * @method     array findByRespuesta(string $respuesta) Return RespuestaEncuestaVisitante objects filtered by the respuesta column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseRespuestaEncuestaVisitanteQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseRespuestaEncuestaVisitanteQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'RespuestaEncuestaVisitante', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new RespuestaEncuestaVisitanteQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    RespuestaEncuestaVisitanteQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof RespuestaEncuestaVisitanteQuery) {
			return $criteria;
		}
		$query = new RespuestaEncuestaVisitanteQuery();
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
	 * @return    RespuestaEncuestaVisitante|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = RespuestaEncuestaVisitantePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_item column
	 * 
	 * @param     int|array $idItem The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function filterByIdItem($idItem = null, $comparison = null)
	{
		if (is_array($idItem)) {
			$useMinMax = false;
			if (isset($idItem['min'])) {
				$this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID_ITEM, $idItem['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idItem['max'])) {
				$this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID_ITEM, $idItem['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID_ITEM, $idItem, $comparison);
	}

	/**
	 * Filter the query on the respuesta column
	 * 
	 * @param     string $respuesta The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function filterByRespuesta($respuesta = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($respuesta)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $respuesta)) {
				$respuesta = str_replace('*', '%', $respuesta);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(RespuestaEncuestaVisitantePeer::RESPUESTA, $respuesta, $comparison);
	}

	/**
	 * Filter the query by a related Item object
	 *
	 * @param     Item $item  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function filterByItem($item, $comparison = null)
	{
		return $this
			->addUsingAlias(RespuestaEncuestaVisitantePeer::ID_ITEM, $item->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Item relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function joinItem($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Item');
		
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
			$this->addJoinObject($join, 'Item');
		}
		
		return $this;
	}

	/**
	 * Use the Item relation Item object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ItemQuery A secondary query class using the current class as primary query
	 */
	public function useItemQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinItem($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Item', 'ItemQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     RespuestaEncuestaVisitante $respuestaEncuestaVisitante Object to remove from the list of results
	 *
	 * @return    RespuestaEncuestaVisitanteQuery The current query, for fluid interface
	 */
	public function prune($respuestaEncuestaVisitante = null)
	{
		if ($respuestaEncuestaVisitante) {
			$this->addUsingAlias(RespuestaEncuestaVisitantePeer::ID, $respuestaEncuestaVisitante->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseRespuestaEncuestaVisitanteQuery
