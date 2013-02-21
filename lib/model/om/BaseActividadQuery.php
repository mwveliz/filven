<?php


/**
 * Base class that represents a query for the 'actividad' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 18 12:35:57 2013
 *
 * @method     ActividadQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ActividadQuery orderByNombreActividad($order = Criteria::ASC) Order by the nombre_actividad column
 * @method     ActividadQuery orderByPonente($order = Criteria::ASC) Order by the ponente column
 * @method     ActividadQuery orderByTurno($order = Criteria::ASC) Order by the turno column
 * @method     ActividadQuery orderByEjecutada($order = Criteria::ASC) Order by the ejecutada column
 * @method     ActividadQuery orderByCantidadParticipantesM($order = Criteria::ASC) Order by the cantidad_participantes_m column
 * @method     ActividadQuery orderByCantidadParticipantesF($order = Criteria::ASC) Order by the cantidad_participantes_f column
 * @method     ActividadQuery orderByAlcanzoTiempo($order = Criteria::ASC) Order by the alcanzo_tiempo column
 * @method     ActividadQuery orderByCausasIncumplimiento($order = Criteria::ASC) Order by the causas_incumplimiento column
 * @method     ActividadQuery orderByIdMunicipio($order = Criteria::ASC) Order by the id_municipio column
 * @method     ActividadQuery orderByEscuela($order = Criteria::ASC) Order by the escuela column
 * @method     ActividadQuery orderByRefugio($order = Criteria::ASC) Order by the refugio column
 * @method     ActividadQuery orderByObservaciones($order = Criteria::ASC) Order by the observaciones column
 * @method     ActividadQuery orderByIdSala($order = Criteria::ASC) Order by the id_sala column
 * @method     ActividadQuery orderByIdTipoActividad($order = Criteria::ASC) Order by the id_tipo_actividad column
 * @method     ActividadQuery orderByFecha($order = Criteria::ASC) Order by the fecha column
 * @method     ActividadQuery orderByHora($order = Criteria::ASC) Order by the hora column
 * @method     ActividadQuery orderByIdPonente($order = Criteria::ASC) Order by the id_ponente column
 * @method     ActividadQuery orderByFacilitador($order = Criteria::ASC) Order by the facilitador column
 *
 * @method     ActividadQuery groupById() Group by the id column
 * @method     ActividadQuery groupByNombreActividad() Group by the nombre_actividad column
 * @method     ActividadQuery groupByPonente() Group by the ponente column
 * @method     ActividadQuery groupByTurno() Group by the turno column
 * @method     ActividadQuery groupByEjecutada() Group by the ejecutada column
 * @method     ActividadQuery groupByCantidadParticipantesM() Group by the cantidad_participantes_m column
 * @method     ActividadQuery groupByCantidadParticipantesF() Group by the cantidad_participantes_f column
 * @method     ActividadQuery groupByAlcanzoTiempo() Group by the alcanzo_tiempo column
 * @method     ActividadQuery groupByCausasIncumplimiento() Group by the causas_incumplimiento column
 * @method     ActividadQuery groupByIdMunicipio() Group by the id_municipio column
 * @method     ActividadQuery groupByEscuela() Group by the escuela column
 * @method     ActividadQuery groupByRefugio() Group by the refugio column
 * @method     ActividadQuery groupByObservaciones() Group by the observaciones column
 * @method     ActividadQuery groupByIdSala() Group by the id_sala column
 * @method     ActividadQuery groupByIdTipoActividad() Group by the id_tipo_actividad column
 * @method     ActividadQuery groupByFecha() Group by the fecha column
 * @method     ActividadQuery groupByHora() Group by the hora column
 * @method     ActividadQuery groupByIdPonente() Group by the id_ponente column
 * @method     ActividadQuery groupByFacilitador() Group by the facilitador column
 *
 * @method     ActividadQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ActividadQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ActividadQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ActividadQuery leftJoinSala($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sala relation
 * @method     ActividadQuery rightJoinSala($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sala relation
 * @method     ActividadQuery innerJoinSala($relationAlias = null) Adds a INNER JOIN clause to the query using the Sala relation
 *
 * @method     ActividadQuery leftJoinTipoActividad($relationAlias = null) Adds a LEFT JOIN clause to the query using the TipoActividad relation
 * @method     ActividadQuery rightJoinTipoActividad($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TipoActividad relation
 * @method     ActividadQuery innerJoinTipoActividad($relationAlias = null) Adds a INNER JOIN clause to the query using the TipoActividad relation
 *
 * @method     Actividad findOne(PropelPDO $con = null) Return the first Actividad matching the query
 * @method     Actividad findOneOrCreate(PropelPDO $con = null) Return the first Actividad matching the query, or a new Actividad object populated from the query conditions when no match is found
 *
 * @method     Actividad findOneById(int $id) Return the first Actividad filtered by the id column
 * @method     Actividad findOneByNombreActividad(string $nombre_actividad) Return the first Actividad filtered by the nombre_actividad column
 * @method     Actividad findOneByPonente(string $ponente) Return the first Actividad filtered by the ponente column
 * @method     Actividad findOneByTurno(boolean $turno) Return the first Actividad filtered by the turno column
 * @method     Actividad findOneByEjecutada(boolean $ejecutada) Return the first Actividad filtered by the ejecutada column
 * @method     Actividad findOneByCantidadParticipantesM(int $cantidad_participantes_m) Return the first Actividad filtered by the cantidad_participantes_m column
 * @method     Actividad findOneByCantidadParticipantesF(int $cantidad_participantes_f) Return the first Actividad filtered by the cantidad_participantes_f column
 * @method     Actividad findOneByAlcanzoTiempo(boolean $alcanzo_tiempo) Return the first Actividad filtered by the alcanzo_tiempo column
 * @method     Actividad findOneByCausasIncumplimiento(string $causas_incumplimiento) Return the first Actividad filtered by the causas_incumplimiento column
 * @method     Actividad findOneByIdMunicipio(int $id_municipio) Return the first Actividad filtered by the id_municipio column
 * @method     Actividad findOneByEscuela(boolean $escuela) Return the first Actividad filtered by the escuela column
 * @method     Actividad findOneByRefugio(boolean $refugio) Return the first Actividad filtered by the refugio column
 * @method     Actividad findOneByObservaciones(string $observaciones) Return the first Actividad filtered by the observaciones column
 * @method     Actividad findOneByIdSala(int $id_sala) Return the first Actividad filtered by the id_sala column
 * @method     Actividad findOneByIdTipoActividad(int $id_tipo_actividad) Return the first Actividad filtered by the id_tipo_actividad column
 * @method     Actividad findOneByFecha(string $fecha) Return the first Actividad filtered by the fecha column
 * @method     Actividad findOneByHora(string $hora) Return the first Actividad filtered by the hora column
 * @method     Actividad findOneByIdPonente(int $id_ponente) Return the first Actividad filtered by the id_ponente column
 * @method     Actividad findOneByFacilitador(int $facilitador) Return the first Actividad filtered by the facilitador column
 *
 * @method     array findById(int $id) Return Actividad objects filtered by the id column
 * @method     array findByNombreActividad(string $nombre_actividad) Return Actividad objects filtered by the nombre_actividad column
 * @method     array findByPonente(string $ponente) Return Actividad objects filtered by the ponente column
 * @method     array findByTurno(boolean $turno) Return Actividad objects filtered by the turno column
 * @method     array findByEjecutada(boolean $ejecutada) Return Actividad objects filtered by the ejecutada column
 * @method     array findByCantidadParticipantesM(int $cantidad_participantes_m) Return Actividad objects filtered by the cantidad_participantes_m column
 * @method     array findByCantidadParticipantesF(int $cantidad_participantes_f) Return Actividad objects filtered by the cantidad_participantes_f column
 * @method     array findByAlcanzoTiempo(boolean $alcanzo_tiempo) Return Actividad objects filtered by the alcanzo_tiempo column
 * @method     array findByCausasIncumplimiento(string $causas_incumplimiento) Return Actividad objects filtered by the causas_incumplimiento column
 * @method     array findByIdMunicipio(int $id_municipio) Return Actividad objects filtered by the id_municipio column
 * @method     array findByEscuela(boolean $escuela) Return Actividad objects filtered by the escuela column
 * @method     array findByRefugio(boolean $refugio) Return Actividad objects filtered by the refugio column
 * @method     array findByObservaciones(string $observaciones) Return Actividad objects filtered by the observaciones column
 * @method     array findByIdSala(int $id_sala) Return Actividad objects filtered by the id_sala column
 * @method     array findByIdTipoActividad(int $id_tipo_actividad) Return Actividad objects filtered by the id_tipo_actividad column
 * @method     array findByFecha(string $fecha) Return Actividad objects filtered by the fecha column
 * @method     array findByHora(string $hora) Return Actividad objects filtered by the hora column
 * @method     array findByIdPonente(int $id_ponente) Return Actividad objects filtered by the id_ponente column
 * @method     array findByFacilitador(int $facilitador) Return Actividad objects filtered by the facilitador column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseActividadQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseActividadQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'Actividad', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ActividadQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    ActividadQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof ActividadQuery) {
			return $criteria;
		}
		$query = new ActividadQuery();
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
	 * @return    Actividad|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = ActividadPeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(ActividadPeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(ActividadPeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(ActividadPeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the nombre_actividad column
	 * 
	 * @param     string $nombreActividad The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByNombreActividad($nombreActividad = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($nombreActividad)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $nombreActividad)) {
				$nombreActividad = str_replace('*', '%', $nombreActividad);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActividadPeer::NOMBRE_ACTIVIDAD, $nombreActividad, $comparison);
	}

	/**
	 * Filter the query on the ponente column
	 * 
	 * @param     string $ponente The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByPonente($ponente = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($ponente)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $ponente)) {
				$ponente = str_replace('*', '%', $ponente);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActividadPeer::PONENTE, $ponente, $comparison);
	}

	/**
	 * Filter the query on the turno column
	 * 
	 * @param     boolean|string $turno The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByTurno($turno = null, $comparison = null)
	{
		if (is_string($turno)) {
			$turno = in_array(strtolower($turno), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ActividadPeer::TURNO, $turno, $comparison);
	}

	/**
	 * Filter the query on the ejecutada column
	 * 
	 * @param     boolean|string $ejecutada The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByEjecutada($ejecutada = null, $comparison = null)
	{
		if (is_string($ejecutada)) {
			$ejecutada = in_array(strtolower($ejecutada), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ActividadPeer::EJECUTADA, $ejecutada, $comparison);
	}

	/**
	 * Filter the query on the cantidad_participantes_m column
	 * 
	 * @param     int|array $cantidadParticipantesM The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByCantidadParticipantesM($cantidadParticipantesM = null, $comparison = null)
	{
		if (is_array($cantidadParticipantesM)) {
			$useMinMax = false;
			if (isset($cantidadParticipantesM['min'])) {
				$this->addUsingAlias(ActividadPeer::CANTIDAD_PARTICIPANTES_M, $cantidadParticipantesM['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidadParticipantesM['max'])) {
				$this->addUsingAlias(ActividadPeer::CANTIDAD_PARTICIPANTES_M, $cantidadParticipantesM['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::CANTIDAD_PARTICIPANTES_M, $cantidadParticipantesM, $comparison);
	}

	/**
	 * Filter the query on the cantidad_participantes_f column
	 * 
	 * @param     int|array $cantidadParticipantesF The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByCantidadParticipantesF($cantidadParticipantesF = null, $comparison = null)
	{
		if (is_array($cantidadParticipantesF)) {
			$useMinMax = false;
			if (isset($cantidadParticipantesF['min'])) {
				$this->addUsingAlias(ActividadPeer::CANTIDAD_PARTICIPANTES_F, $cantidadParticipantesF['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($cantidadParticipantesF['max'])) {
				$this->addUsingAlias(ActividadPeer::CANTIDAD_PARTICIPANTES_F, $cantidadParticipantesF['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::CANTIDAD_PARTICIPANTES_F, $cantidadParticipantesF, $comparison);
	}

	/**
	 * Filter the query on the alcanzo_tiempo column
	 * 
	 * @param     boolean|string $alcanzoTiempo The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByAlcanzoTiempo($alcanzoTiempo = null, $comparison = null)
	{
		if (is_string($alcanzoTiempo)) {
			$alcanzo_tiempo = in_array(strtolower($alcanzoTiempo), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ActividadPeer::ALCANZO_TIEMPO, $alcanzoTiempo, $comparison);
	}

	/**
	 * Filter the query on the causas_incumplimiento column
	 * 
	 * @param     string $causasIncumplimiento The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByCausasIncumplimiento($causasIncumplimiento = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($causasIncumplimiento)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $causasIncumplimiento)) {
				$causasIncumplimiento = str_replace('*', '%', $causasIncumplimiento);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActividadPeer::CAUSAS_INCUMPLIMIENTO, $causasIncumplimiento, $comparison);
	}

	/**
	 * Filter the query on the id_municipio column
	 * 
	 * @param     int|array $idMunicipio The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByIdMunicipio($idMunicipio = null, $comparison = null)
	{
		if (is_array($idMunicipio)) {
			$useMinMax = false;
			if (isset($idMunicipio['min'])) {
				$this->addUsingAlias(ActividadPeer::ID_MUNICIPIO, $idMunicipio['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idMunicipio['max'])) {
				$this->addUsingAlias(ActividadPeer::ID_MUNICIPIO, $idMunicipio['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::ID_MUNICIPIO, $idMunicipio, $comparison);
	}

	/**
	 * Filter the query on the escuela column
	 * 
	 * @param     boolean|string $escuela The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByEscuela($escuela = null, $comparison = null)
	{
		if (is_string($escuela)) {
			$escuela = in_array(strtolower($escuela), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ActividadPeer::ESCUELA, $escuela, $comparison);
	}

	/**
	 * Filter the query on the refugio column
	 * 
	 * @param     boolean|string $refugio The value to use as filter.
	 *            Accepts strings ('false', 'off', '-', 'no', 'n', and '0' are false, the rest is true)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByRefugio($refugio = null, $comparison = null)
	{
		if (is_string($refugio)) {
			$refugio = in_array(strtolower($refugio), array('false', 'off', '-', 'no', 'n', '0')) ? false : true;
		}
		return $this->addUsingAlias(ActividadPeer::REFUGIO, $refugio, $comparison);
	}

	/**
	 * Filter the query on the observaciones column
	 * 
	 * @param     string $observaciones The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByObservaciones($observaciones = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($observaciones)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $observaciones)) {
				$observaciones = str_replace('*', '%', $observaciones);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(ActividadPeer::OBSERVACIONES, $observaciones, $comparison);
	}

	/**
	 * Filter the query on the id_sala column
	 * 
	 * @param     int|array $idSala The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByIdSala($idSala = null, $comparison = null)
	{
		if (is_array($idSala)) {
			$useMinMax = false;
			if (isset($idSala['min'])) {
				$this->addUsingAlias(ActividadPeer::ID_SALA, $idSala['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idSala['max'])) {
				$this->addUsingAlias(ActividadPeer::ID_SALA, $idSala['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::ID_SALA, $idSala, $comparison);
	}

	/**
	 * Filter the query on the id_tipo_actividad column
	 * 
	 * @param     int|array $idTipoActividad The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByIdTipoActividad($idTipoActividad = null, $comparison = null)
	{
		if (is_array($idTipoActividad)) {
			$useMinMax = false;
			if (isset($idTipoActividad['min'])) {
				$this->addUsingAlias(ActividadPeer::ID_TIPO_ACTIVIDAD, $idTipoActividad['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idTipoActividad['max'])) {
				$this->addUsingAlias(ActividadPeer::ID_TIPO_ACTIVIDAD, $idTipoActividad['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::ID_TIPO_ACTIVIDAD, $idTipoActividad, $comparison);
	}

	/**
	 * Filter the query on the fecha column
	 * 
	 * @param     string|array $fecha The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByFecha($fecha = null, $comparison = null)
	{
		if (is_array($fecha)) {
			$useMinMax = false;
			if (isset($fecha['min'])) {
				$this->addUsingAlias(ActividadPeer::FECHA, $fecha['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($fecha['max'])) {
				$this->addUsingAlias(ActividadPeer::FECHA, $fecha['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::FECHA, $fecha, $comparison);
	}

	/**
	 * Filter the query on the hora column
	 * 
	 * @param     string|array $hora The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByHora($hora = null, $comparison = null)
	{
		if (is_array($hora)) {
			$useMinMax = false;
			if (isset($hora['min'])) {
				$this->addUsingAlias(ActividadPeer::HORA, $hora['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($hora['max'])) {
				$this->addUsingAlias(ActividadPeer::HORA, $hora['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::HORA, $hora, $comparison);
	}

	/**
	 * Filter the query on the id_ponente column
	 * 
	 * @param     int|array $idPonente The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByIdPonente($idPonente = null, $comparison = null)
	{
		if (is_array($idPonente)) {
			$useMinMax = false;
			if (isset($idPonente['min'])) {
				$this->addUsingAlias(ActividadPeer::ID_PONENTE, $idPonente['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($idPonente['max'])) {
				$this->addUsingAlias(ActividadPeer::ID_PONENTE, $idPonente['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::ID_PONENTE, $idPonente, $comparison);
	}

	/**
	 * Filter the query on the facilitador column
	 * 
	 * @param     int|array $facilitador The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByFacilitador($facilitador = null, $comparison = null)
	{
		if (is_array($facilitador)) {
			$useMinMax = false;
			if (isset($facilitador['min'])) {
				$this->addUsingAlias(ActividadPeer::FACILITADOR, $facilitador['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($facilitador['max'])) {
				$this->addUsingAlias(ActividadPeer::FACILITADOR, $facilitador['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(ActividadPeer::FACILITADOR, $facilitador, $comparison);
	}

	/**
	 * Filter the query by a related Sala object
	 *
	 * @param     Sala $sala  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterBySala($sala, $comparison = null)
	{
		return $this
			->addUsingAlias(ActividadPeer::ID_SALA, $sala->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the Sala relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function joinSala($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('Sala');
		
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
			$this->addJoinObject($join, 'Sala');
		}
		
		return $this;
	}

	/**
	 * Use the Sala relation Sala object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SalaQuery A secondary query class using the current class as primary query
	 */
	public function useSalaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinSala($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'Sala', 'SalaQuery');
	}

	/**
	 * Filter the query by a related TipoActividad object
	 *
	 * @param     TipoActividad $tipoActividad  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function filterByTipoActividad($tipoActividad, $comparison = null)
	{
		return $this
			->addUsingAlias(ActividadPeer::ID_TIPO_ACTIVIDAD, $tipoActividad->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the TipoActividad relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function joinTipoActividad($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('TipoActividad');
		
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
			$this->addJoinObject($join, 'TipoActividad');
		}
		
		return $this;
	}

	/**
	 * Use the TipoActividad relation TipoActividad object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    TipoActividadQuery A secondary query class using the current class as primary query
	 */
	public function useTipoActividadQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
	{
		return $this
			->joinTipoActividad($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'TipoActividad', 'TipoActividadQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     Actividad $actividad Object to remove from the list of results
	 *
	 * @return    ActividadQuery The current query, for fluid interface
	 */
	public function prune($actividad = null)
	{
		if ($actividad) {
			$this->addUsingAlias(ActividadPeer::ID, $actividad->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseActividadQuery
