<?php



/**
 * This class defines the structure of the 'tipo_actividad' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
<<<<<<< HEAD
 * Wed Mar 12 10:33:15 2014
=======
 * Thu Jun  6 14:55:42 2013
>>>>>>> 5dc4684319c2fce5537460e29edd88cdbaf2b325
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class TipoActividadTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TipoActividadTableMap';

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
		$this->setName('tipo_actividad');
		$this->setPhpName('TipoActividad');
		$this->setClassname('TipoActividad');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('tipo_actividad_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE_TIPO', 'NombreTipo', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPCION_TIPO', 'DescripcionTipo', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Actividad', 'Actividad', RelationMap::ONE_TO_MANY, array('id' => 'id_tipo_actividad', ), null, 'CASCADE');
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

} // TipoActividadTableMap
