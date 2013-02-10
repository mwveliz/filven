<?php


/**
 * Base class that represents a query for the 'item' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sun Feb 10 17:33:08 2013
 *
 * @method     ItemQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ItemQuery orderByNumeracion($order = Criteria::ASC) Order by the numeracion column
 * @method     ItemQuery orderByTexto($order = Criteria::ASC) Order by the texto column
 * @method     ItemQuery orderByTipoItem($order = Criteria::ASC) Order by the tipo_item column
 * @method     ItemQuery orderByMaximo($order = Criteria::ASC) Order by the maximo column
 * @method     ItemQuery orderByIdEncuesta($order = Criteria::ASC) Order by the id_encuesta column
 *
 * @method     ItemQuery groupById() Group by the id column
 * @method     ItemQuery groupByNumeracion() Group by the numeracion column
 * @method     ItemQuery groupByTexto() Group by the texto column
 * @method     ItemQuery groupByTipoItem() Group by the tipo_item column
 * @method     ItemQuery groupByMaximo() Group by the maximo column
 * @method     ItemQuery groupByIdEncuesta() Group by the id_encuesta column
 *
 * @method     ItemQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ItemQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ItemQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ItemQuery leftJoinEncuesta($relationAlias = null) Adds a LEFT JOIN clause to the query using the Encuesta relation
 * @method     ItemQuery rightJoinEncuesta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Encuesta relation
 * @method     ItemQuery innerJoinEncuesta($relationAlias = null) Adds a INNER JOIN clause to the query using the Encuesta relation
 *
 * @method     ItemQuery leftJoinOpcionRespuesta($relationAlias = null) Adds a LEFT JOIN clause to the query using the OpcionRespuesta relation
 * @method     ItemQuery rightJoinOpcionRespuesta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OpcionRespuesta relation
 * @method     ItemQuery innerJoinOpcionRespuesta($relationAlias = null) Adds a INNER JOIN clause to the query using the OpcionRespuesta relation
 *
 * @method     ItemQuery leftJoinRespuestaItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespuestaItem relation
 * @method     ItemQuery rightJoinRespuestaItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespuestaItem relation
 * @method     ItemQuery innerJoinRespuestaItem($relationAlias = null) Adds a INNER JOIN clause to the query using the RespuestaItem relation
 *
 * @method     Item findOne(PropelPDO $con = null) Return the first Item matching the query
 * @method     Item findOneOrCreate(PropelPDO $con = null) Return the first Item matching the query, or a new Item object populated from the query conditions when no match is found
 *
 * @method     Item findOneById(int $id) Return the first Item filtered by the id column
 * @method     Item findOneByNumeracion(int $numeracion) Return the first Item filtered by the numeracion column
 * @method     Item findOneByTexto(string $texto) Return the first Item filtered by the texto column
 * @method     Item findOneByTipoItem(string $tipo_item) Return the first Item filtered by the tipo_item column
 * @method     Item findOneByMaximo(int $maximo) Return the first Item filtered by the maximo column
 * @method     Item findOneByIdEncuesta(string $id_encuesta) Return the first Item filtered by the id_encuesta column
 *
 * @method     array findById(int $id) Return Item objects filtered by the id column
 * @method     array findByNumeracion(int $numeracion) Return Item objects filtered by the numeracion column
 * @method     array findByTexto(string $texto) Return Item objects filtered by the texto column
 * @method     array findByTipoItem(string $tipo_item) Return Item objects filtered by the tipo_item column
 * @method     array findByMaximo(int $maximo) Return Item objects filtered by the maximo column
 * @method     array findByIdEncuesta(string $id_encuesta) Return Item objects filtered by the id_encuesta column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseItemQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseItemQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Item', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ItemQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ItemQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ItemQuery) {
			return $criteria;
		}
		$query = new ItemQuery();
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
	 * @return    Item|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ItemPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ItemPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ItemPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ItemPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the numeracion column
	 * 
	 * @param     int|array $numeracion The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByNumeracion($numeracion = null, $comparison = null)
	{
		if (is_array($numeracion)) {
			$useMinMax = false;
			if (isset($numeracion['min'])) {
				$this->addUsingAlias(ItemPeer::NUMERACION, $numeracion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($numeracion['max'])) {
				$this->addUsingAlias(ItemPeer::NUMERACION, $numeracion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ItemPeer::NUMERACION, $numeracion, $comparison);
	}

	/**
	 * Filter the query on the texto column
	 * 
	 * @param     string $texto The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByTexto($texto = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($texto)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $texto)) {
				$texto = str_replace('*', '%', $texto);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ItemPeer::TEXTO, $texto, $comparison);
	}

	/**
	 * Filter the query on the tipo_item column
	 * 
	 * @param     string $tipoItem The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByTipoItem($tipoItem = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipoItem)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipoItem)) {
				$tipoItem = str_replace('*', '%', $tipoItem);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ItemPeer::TIPO_ITEM, $tipoItem, $comparison);
	}

	/**
	 * Filter the query on the maximo column
	 * 
	 * @param     int|array $maximo The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByMaximo($maximo = null, $comparison = null)
	{
		if (is_array($maximo)) {
			$useMinMax = false;
			if (isset($maximo['min'])) {
				$this->addUsingAlias(ItemPeer::MAXIMO, $maximo['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($maximo['max'])) {
				$this->addUsingAlias(ItemPeer::MAXIMO, $maximo['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ItemPeer::MAXIMO, $maximo, $comparison);
	}

	/**
	 * Filter the query on the id_encuesta column
	 * 
	 * @param     string|array $idEncuesta The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByIdEncuesta($idEncuesta = null, $comparison = null)
	{
		if (is_array($idEncuesta)) {
			$useMinMax = false;
			if (isset($idEncuesta['min'])) {
				$this->addUsingAlias(ItemPeer::ID_ENCUESTA, $idEncuesta['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idEncuesta['max'])) {
				$this->addUsingAlias(ItemPeer::ID_ENCUESTA, $idEncuesta['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ItemPeer::ID_ENCUESTA, $idEncuesta, $comparison);
	}

	/**
	 * Filter the query by a related Encuesta object
	 *
	 * @param     Encuesta $encuesta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByEncuesta($encuesta, $comparison = null)
	{
		return $this
			->addUsingAlias(ItemPeer::ID_ENCUESTA, $encuesta->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Encuesta relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ItemQuery The current query, for fluid interface
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
	 * Filter the query by a related OpcionRespuesta object
	 *
	 * @param     OpcionRespuesta $opcionRespuesta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByOpcionRespuesta($opcionRespuesta, $comparison = null)
	{
		return $this
			->addUsingAlias(ItemPeer::ID, $opcionRespuesta->getIdItem(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the OpcionRespuesta relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function joinOpcionRespuesta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('OpcionRespuesta');
		
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
			$this->addJoinObject($join, 'OpcionRespuesta');
		}
		
		return $this;
	}

	/**
	 * Use the OpcionRespuesta relation OpcionRespuesta object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    OpcionRespuestaQuery A secondary query class using the current class as primary query
	 */
	public function useOpcionRespuestaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinOpcionRespuesta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'OpcionRespuesta', 'OpcionRespuestaQuery');
	}

	/**
	 * Filter the query by a related RespuestaItem object
	 *
	 * @param     RespuestaItem $respuestaItem  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function filterByRespuestaItem($respuestaItem, $comparison = null)
	{
		return $this
			->addUsingAlias(ItemPeer::ID, $respuestaItem->getIdItem(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the RespuestaItem relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ItemQuery The current query, for fluid interface
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
	 * @param     Item $item Object to remove from the list of results
	 *
	 * @return    ItemQuery The current query, for fluid interface
	 */
	public function prune($item = null)
	{
		if ($item) {
			$this->addUsingAlias(ItemPeer::ID, $item->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseItemQuery
