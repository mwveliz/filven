<?php


/**
 * Base class that represents a query for the 'encuesta' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Wed Mar 12 10:33:15 2014
 *
 * @method     EncuestaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     EncuestaQuery orderByNombreEncuesta($order = Criteria::ASC) Order by the nombre_encuesta column
 * @method     EncuestaQuery orderByDescripcionEncuesta($order = Criteria::ASC) Order by the descripcion_encuesta column
 * @method     EncuestaQuery orderByTipoEncuesta($order = Criteria::ASC) Order by the tipo_encuesta column
 * @method     EncuestaQuery orderByFechaElaboracion($order = Criteria::ASC) Order by the fecha_elaboracion column
 * @method     EncuestaQuery orderByIdFeria($order = Criteria::ASC) Order by the id_feria column
 *
 * @method     EncuestaQuery groupById() Group by the id column
 * @method     EncuestaQuery groupByNombreEncuesta() Group by the nombre_encuesta column
 * @method     EncuestaQuery groupByDescripcionEncuesta() Group by the descripcion_encuesta column
 * @method     EncuestaQuery groupByTipoEncuesta() Group by the tipo_encuesta column
 * @method     EncuestaQuery groupByFechaElaboracion() Group by the fecha_elaboracion column
 * @method     EncuestaQuery groupByIdFeria() Group by the id_feria column
 *
 * @method     EncuestaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     EncuestaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     EncuestaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     EncuestaQuery leftJoinFeria($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feria relation
 * @method     EncuestaQuery rightJoinFeria($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feria relation
 * @method     EncuestaQuery innerJoinFeria($relationAlias = null) Adds a INNER JOIN clause to the query using the Feria relation
 *
 * @method     EncuestaQuery leftJoinItem($relationAlias = null) Adds a LEFT JOIN clause to the query using the Item relation
 * @method     EncuestaQuery rightJoinItem($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Item relation
 * @method     EncuestaQuery innerJoinItem($relationAlias = null) Adds a INNER JOIN clause to the query using the Item relation
 *
 * @method     EncuestaQuery leftJoinRespuestaEncuesta($relationAlias = null) Adds a LEFT JOIN clause to the query using the RespuestaEncuesta relation
 * @method     EncuestaQuery rightJoinRespuestaEncuesta($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RespuestaEncuesta relation
 * @method     EncuestaQuery innerJoinRespuestaEncuesta($relationAlias = null) Adds a INNER JOIN clause to the query using the RespuestaEncuesta relation
 *
 * @method     Encuesta findOne(PropelPDO $con = null) Return the first Encuesta matching the query
 * @method     Encuesta findOneOrCreate(PropelPDO $con = null) Return the first Encuesta matching the query, or a new Encuesta object populated from the query conditions when no match is found
 *
 * @method     Encuesta findOneById(int $id) Return the first Encuesta filtered by the id column
 * @method     Encuesta findOneByNombreEncuesta(string $nombre_encuesta) Return the first Encuesta filtered by the nombre_encuesta column
 * @method     Encuesta findOneByDescripcionEncuesta(string $descripcion_encuesta) Return the first Encuesta filtered by the descripcion_encuesta column
 * @method     Encuesta findOneByTipoEncuesta(string $tipo_encuesta) Return the first Encuesta filtered by the tipo_encuesta column
 * @method     Encuesta findOneByFechaElaboracion(string $fecha_elaboracion) Return the first Encuesta filtered by the fecha_elaboracion column
 * @method     Encuesta findOneByIdFeria(string $id_feria) Return the first Encuesta filtered by the id_feria column
 *
 * @method     array findById(int $id) Return Encuesta objects filtered by the id column
 * @method     array findByNombreEncuesta(string $nombre_encuesta) Return Encuesta objects filtered by the nombre_encuesta column
 * @method     array findByDescripcionEncuesta(string $descripcion_encuesta) Return Encuesta objects filtered by the descripcion_encuesta column
 * @method     array findByTipoEncuesta(string $tipo_encuesta) Return Encuesta objects filtered by the tipo_encuesta column
 * @method     array findByFechaElaboracion(string $fecha_elaboracion) Return Encuesta objects filtered by the fecha_elaboracion column
 * @method     array findByIdFeria(string $id_feria) Return Encuesta objects filtered by the id_feria column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseEncuestaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseEncuestaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Encuesta', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new EncuestaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    EncuestaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof EncuestaQuery) {
			return $criteria;
		}
		$query = new EncuestaQuery();
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
	 * @return    Encuesta|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = EncuestaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(EncuestaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(EncuestaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(EncuestaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_encuesta column
	 * 
	 * @param     string $nombreEncuesta The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByNombreEncuesta($nombreEncuesta = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreEncuesta)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreEncuesta)) {
				$nombreEncuesta = str_replace('*', '%', $nombreEncuesta);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EncuestaPeer::NOMBRE_ENCUESTA, $nombreEncuesta, $comparison);
	}

	/**
	 * Filter the query on the descripcion_encuesta column
	 * 
	 * @param     string $descripcionEncuesta The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByDescripcionEncuesta($descripcionEncuesta = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($descripcionEncuesta)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $descripcionEncuesta)) {
				$descripcionEncuesta = str_replace('*', '%', $descripcionEncuesta);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EncuestaPeer::DESCRIPCION_ENCUESTA, $descripcionEncuesta, $comparison);
	}

	/**
	 * Filter the query on the tipo_encuesta column
	 * 
	 * @param     string $tipoEncuesta The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByTipoEncuesta($tipoEncuesta = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tipoEncuesta)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tipoEncuesta)) {
				$tipoEncuesta = str_replace('*', '%', $tipoEncuesta);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(EncuestaPeer::TIPO_ENCUESTA, $tipoEncuesta, $comparison);
	}

	/**
	 * Filter the query on the fecha_elaboracion column
	 * 
	 * @param     string|array $fechaElaboracion The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByFechaElaboracion($fechaElaboracion = null, $comparison = null)
	{
		if (is_array($fechaElaboracion)) {
			$useMinMax = false;
			if (isset($fechaElaboracion['min'])) {
				$this->addUsingAlias(EncuestaPeer::FECHA_ELABORACION, $fechaElaboracion['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fechaElaboracion['max'])) {
				$this->addUsingAlias(EncuestaPeer::FECHA_ELABORACION, $fechaElaboracion['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EncuestaPeer::FECHA_ELABORACION, $fechaElaboracion, $comparison);
	}

	/**
	 * Filter the query on the id_feria column
	 * 
	 * @param     string|array $idFeria The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByIdFeria($idFeria = null, $comparison = null)
	{
		if (is_array($idFeria)) {
			$useMinMax = false;
			if (isset($idFeria['min'])) {
				$this->addUsingAlias(EncuestaPeer::ID_FERIA, $idFeria['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idFeria['max'])) {
				$this->addUsingAlias(EncuestaPeer::ID_FERIA, $idFeria['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(EncuestaPeer::ID_FERIA, $idFeria, $comparison);
	}

	/**
	 * Filter the query by a related Feria object
	 *
	 * @param     Feria $feria  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByFeria($feria, $comparison = null)
	{
		return $this
			->addUsingAlias(EncuestaPeer::ID_FERIA, $feria->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Feria relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function joinFeria($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Feria');
		
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
			$this->addJoinObject($join, 'Feria');
		}
		
		return $this;
	}

	/**
	 * Use the Feria relation Feria object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    FeriaQuery A secondary query class using the current class as primary query
	 */
	public function useFeriaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinFeria($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Feria', 'FeriaQuery');
	}

	/**
	 * Filter the query by a related Item object
	 *
	 * @param     Item $item  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByItem($item, $comparison = null)
	{
		return $this
			->addUsingAlias(EncuestaPeer::ID, $item->getIdEncuesta(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Item relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
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
	 * Filter the query by a related RespuestaEncuesta object
	 *
	 * @param     RespuestaEncuesta $respuestaEncuesta  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function filterByRespuestaEncuesta($respuestaEncuesta, $comparison = null)
	{
		return $this
			->addUsingAlias(EncuestaPeer::ID, $respuestaEncuesta->getIdEncuesta(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the RespuestaEncuesta relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function joinRespuestaEncuesta($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('RespuestaEncuesta');
		
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
			$this->addJoinObject($join, 'RespuestaEncuesta');
		}
		
		return $this;
	}

	/**
	 * Use the RespuestaEncuesta relation RespuestaEncuesta object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    RespuestaEncuestaQuery A secondary query class using the current class as primary query
	 */
	public function useRespuestaEncuestaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinRespuestaEncuesta($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'RespuestaEncuesta', 'RespuestaEncuestaQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Encuesta $encuesta Object to remove from the list of results
	 *
	 * @return    EncuestaQuery The current query, for fluid interface
	 */
	public function prune($encuesta = null)
	{
		if ($encuesta) {
			$this->addUsingAlias(EncuestaPeer::ID, $encuesta->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseEncuestaQuery
