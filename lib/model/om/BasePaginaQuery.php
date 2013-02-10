<?php


/**
 * Base class that represents a query for the 'pagina' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sun Feb 10 15:53:08 2013
 *
 * @method     PaginaQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     PaginaQuery orderByIdInforme($order = Criteria::ASC) Order by the id_informe column
 * @method     PaginaQuery orderByTituloInforme($order = Criteria::ASC) Order by the titulo_informe column
 * @method     PaginaQuery orderByAnteCuadro($order = Criteria::ASC) Order by the ante_cuadro column
 * @method     PaginaQuery orderByTituloCuadro($order = Criteria::ASC) Order by the titulo_cuadro column
 * @method     PaginaQuery orderByPostCuadro($order = Criteria::ASC) Order by the post_cuadro column
 * @method     PaginaQuery orderByTextoPosterior($order = Criteria::ASC) Order by the texto_posterior column
 * @method     PaginaQuery orderByAnteGrafico($order = Criteria::ASC) Order by the ante_grafico column
 * @method     PaginaQuery orderByPostGrafico($order = Criteria::ASC) Order by the post_grafico column
 * @method     PaginaQuery orderByTipoGrafico($order = Criteria::ASC) Order by the tipo_grafico column
 *
 * @method     PaginaQuery groupById() Group by the id column
 * @method     PaginaQuery groupByIdInforme() Group by the id_informe column
 * @method     PaginaQuery groupByTituloInforme() Group by the titulo_informe column
 * @method     PaginaQuery groupByAnteCuadro() Group by the ante_cuadro column
 * @method     PaginaQuery groupByTituloCuadro() Group by the titulo_cuadro column
 * @method     PaginaQuery groupByPostCuadro() Group by the post_cuadro column
 * @method     PaginaQuery groupByTextoPosterior() Group by the texto_posterior column
 * @method     PaginaQuery groupByAnteGrafico() Group by the ante_grafico column
 * @method     PaginaQuery groupByPostGrafico() Group by the post_grafico column
 * @method     PaginaQuery groupByTipoGrafico() Group by the tipo_grafico column
 *
 * @method     PaginaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     PaginaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     PaginaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     PaginaQuery leftJoinInforme($relationAlias = null) Adds a LEFT JOIN clause to the query using the Informe relation
 * @method     PaginaQuery rightJoinInforme($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Informe relation
 * @method     PaginaQuery innerJoinInforme($relationAlias = null) Adds a INNER JOIN clause to the query using the Informe relation
 *
 * @method     Pagina findOne(PropelPDO $con = null) Return the first Pagina matching the query
 * @method     Pagina findOneOrCreate(PropelPDO $con = null) Return the first Pagina matching the query, or a new Pagina object populated from the query conditions when no match is found
 *
 * @method     Pagina findOneById(int $id) Return the first Pagina filtered by the id column
 * @method     Pagina findOneByIdInforme(int $id_informe) Return the first Pagina filtered by the id_informe column
 * @method     Pagina findOneByTituloInforme(string $titulo_informe) Return the first Pagina filtered by the titulo_informe column
 * @method     Pagina findOneByAnteCuadro(string $ante_cuadro) Return the first Pagina filtered by the ante_cuadro column
 * @method     Pagina findOneByTituloCuadro(string $titulo_cuadro) Return the first Pagina filtered by the titulo_cuadro column
 * @method     Pagina findOneByPostCuadro(string $post_cuadro) Return the first Pagina filtered by the post_cuadro column
 * @method     Pagina findOneByTextoPosterior(string $texto_posterior) Return the first Pagina filtered by the texto_posterior column
 * @method     Pagina findOneByAnteGrafico(string $ante_grafico) Return the first Pagina filtered by the ante_grafico column
 * @method     Pagina findOneByPostGrafico(string $post_grafico) Return the first Pagina filtered by the post_grafico column
 * @method     Pagina findOneByTipoGrafico(int $tipo_grafico) Return the first Pagina filtered by the tipo_grafico column
 *
 * @method     array findById(int $id) Return Pagina objects filtered by the id column
 * @method     array findByIdInforme(int $id_informe) Return Pagina objects filtered by the id_informe column
 * @method     array findByTituloInforme(string $titulo_informe) Return Pagina objects filtered by the titulo_informe column
 * @method     array findByAnteCuadro(string $ante_cuadro) Return Pagina objects filtered by the ante_cuadro column
 * @method     array findByTituloCuadro(string $titulo_cuadro) Return Pagina objects filtered by the titulo_cuadro column
 * @method     array findByPostCuadro(string $post_cuadro) Return Pagina objects filtered by the post_cuadro column
 * @method     array findByTextoPosterior(string $texto_posterior) Return Pagina objects filtered by the texto_posterior column
 * @method     array findByAnteGrafico(string $ante_grafico) Return Pagina objects filtered by the ante_grafico column
 * @method     array findByPostGrafico(string $post_grafico) Return Pagina objects filtered by the post_grafico column
 * @method     array findByTipoGrafico(int $tipo_grafico) Return Pagina objects filtered by the tipo_grafico column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BasePaginaQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BasePaginaQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Pagina', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new PaginaQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    PaginaQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof PaginaQuery) {
			return $criteria;
		}
		$query = new PaginaQuery();
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
	 * @return    Pagina|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = PaginaPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(PaginaPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(PaginaPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(PaginaPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the id_informe column
	 * 
	 * @param     int|array $idInforme The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByIdInforme($idInforme = null, $comparison = null)
	{
		if (is_array($idInforme)) {
			$useMinMax = false;
			if (isset($idInforme['min'])) {
				$this->addUsingAlias(PaginaPeer::ID_INFORME, $idInforme['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idInforme['max'])) {
				$this->addUsingAlias(PaginaPeer::ID_INFORME, $idInforme['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PaginaPeer::ID_INFORME, $idInforme, $comparison);
	}

	/**
	 * Filter the query on the titulo_informe column
	 * 
	 * @param     string $tituloInforme The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
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
		return $this->addUsingAlias(PaginaPeer::TITULO_INFORME, $tituloInforme, $comparison);
	}

	/**
	 * Filter the query on the ante_cuadro column
	 * 
	 * @param     string $anteCuadro The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByAnteCuadro($anteCuadro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($anteCuadro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $anteCuadro)) {
				$anteCuadro = str_replace('*', '%', $anteCuadro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PaginaPeer::ANTE_CUADRO, $anteCuadro, $comparison);
	}

	/**
	 * Filter the query on the titulo_cuadro column
	 * 
	 * @param     string $tituloCuadro The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByTituloCuadro($tituloCuadro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($tituloCuadro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $tituloCuadro)) {
				$tituloCuadro = str_replace('*', '%', $tituloCuadro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PaginaPeer::TITULO_CUADRO, $tituloCuadro, $comparison);
	}

	/**
	 * Filter the query on the post_cuadro column
	 * 
	 * @param     string $postCuadro The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByPostCuadro($postCuadro = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($postCuadro)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $postCuadro)) {
				$postCuadro = str_replace('*', '%', $postCuadro);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PaginaPeer::POST_CUADRO, $postCuadro, $comparison);
	}

	/**
	 * Filter the query on the texto_posterior column
	 * 
	 * @param     string $textoPosterior The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByTextoPosterior($textoPosterior = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($textoPosterior)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $textoPosterior)) {
				$textoPosterior = str_replace('*', '%', $textoPosterior);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PaginaPeer::TEXTO_POSTERIOR, $textoPosterior, $comparison);
	}

	/**
	 * Filter the query on the ante_grafico column
	 * 
	 * @param     string $anteGrafico The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByAnteGrafico($anteGrafico = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($anteGrafico)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $anteGrafico)) {
				$anteGrafico = str_replace('*', '%', $anteGrafico);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PaginaPeer::ANTE_GRAFICO, $anteGrafico, $comparison);
	}

	/**
	 * Filter the query on the post_grafico column
	 * 
	 * @param     string $postGrafico The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByPostGrafico($postGrafico = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($postGrafico)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $postGrafico)) {
				$postGrafico = str_replace('*', '%', $postGrafico);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(PaginaPeer::POST_GRAFICO, $postGrafico, $comparison);
	}

	/**
	 * Filter the query on the tipo_grafico column
	 * 
	 * @param     int|array $tipoGrafico The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByTipoGrafico($tipoGrafico = null, $comparison = null)
	{
		if (is_array($tipoGrafico)) {
			$useMinMax = false;
			if (isset($tipoGrafico['min'])) {
				$this->addUsingAlias(PaginaPeer::TIPO_GRAFICO, $tipoGrafico['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($tipoGrafico['max'])) {
				$this->addUsingAlias(PaginaPeer::TIPO_GRAFICO, $tipoGrafico['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(PaginaPeer::TIPO_GRAFICO, $tipoGrafico, $comparison);
	}

	/**
	 * Filter the query by a related Informe object
	 *
	 * @param     Informe $informe  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function filterByInforme($informe, $comparison = null)
	{
		return $this
			->addUsingAlias(PaginaPeer::ID_INFORME, $informe->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Informe relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function joinInforme($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Informe');
		
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
			$this->addJoinObject($join, 'Informe');
		}
		
		return $this;
	}

	/**
	 * Use the Informe relation Informe object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    InformeQuery A secondary query class using the current class as primary query
	 */
	public function useInformeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinInforme($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Informe', 'InformeQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Pagina $pagina Object to remove from the list of results
	 *
	 * @return    PaginaQuery The current query, for fluid interface
	 */
	public function prune($pagina = null)
	{
		if ($pagina) {
			$this->addUsingAlias(PaginaPeer::ID, $pagina->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BasePaginaQuery
