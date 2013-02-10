<?php



/**
 * This class defines the structure of the 'actividad' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sun Feb 10 17:33:08 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class ActividadTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ActividadTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('actividad');
		$this->setPhpName('Actividad');
		$this->setClassname('Actividad');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('actividad_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE_ACTIVIDAD', 'NombreActividad', 'VARCHAR', false, 255, null);
		$this->addColumn('PONENTE', 'Ponente', 'VARCHAR', false, 255, null);
		$this->addColumn('TURNO', 'Turno', 'BOOLEAN', false, null, null);
		$this->addColumn('EJECUTADA', 'Ejecutada', 'BOOLEAN', false, null, null);
		$this->addColumn('CANTIDAD_PARTICIPANTES_M', 'CantidadParticipantesM', 'INTEGER', false, null, null);
		$this->addColumn('CANTIDAD_PARTICIPANTES_F', 'CantidadParticipantesF', 'INTEGER', false, null, null);
		$this->addColumn('ALCANZO_TIEMPO', 'AlcanzoTiempo', 'BOOLEAN', false, null, null);
		$this->addColumn('CAUSAS_INCUMPLIMIENTO', 'CausasIncumplimiento', 'VARCHAR', false, 255, null);
		$this->addColumn('ID_MUNICIPIO', 'IdMunicipio', 'INTEGER', false, null, null);
		$this->addColumn('ESCUELA', 'Escuela', 'BOOLEAN', false, null, null);
		$this->addColumn('REFUGIO', 'Refugio', 'BOOLEAN', false, null, null);
		$this->addColumn('OBSERVACIONES', 'Observaciones', 'VARCHAR', false, 255, null);
		$this->addForeignKey('ID_SALA', 'IdSala', 'INTEGER', 'sala', 'ID', false, null, null);
		$this->addForeignKey('ID_TIPO_ACTIVIDAD', 'IdTipoActividad', 'INTEGER', 'tipo_actividad', 'ID', false, null, null);
		$this->addColumn('FECHA_HORA', 'FechaHora', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Sala', 'Sala', RelationMap::MANY_TO_ONE, array('id_sala' => 'id', ), null, 'CASCADE');
    $this->addRelation('TipoActividad', 'TipoActividad', RelationMap::MANY_TO_ONE, array('id_tipo_actividad' => 'id', ), null, 'CASCADE');
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // ActividadTableMap
