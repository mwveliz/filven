<?php



/**
 * This class defines the structure of the 'ponente_rel_actividad' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Thu Jun  6 14:55:42 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class PonenteRelActividadTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PonenteRelActividadTableMap';

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
		$this->setName('ponente_rel_actividad');
		$this->setPhpName('PonenteRelActividad');
		$this->setClassname('PonenteRelActividad');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('ponente_rel_actividad_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_ACTIVIDAD', 'IdActividad', 'INTEGER', 'actividad', 'ID', false, null, null);
		$this->addForeignKey('ID_PONENTE', 'IdPonente', 'INTEGER', 'ponente', 'ID', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Actividad', 'Actividad', RelationMap::MANY_TO_ONE, array('id_actividad' => 'id', ), null, null);
    $this->addRelation('Ponente', 'Ponente', RelationMap::MANY_TO_ONE, array('id_ponente' => 'id', ), null, null);
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

} // PonenteRelActividadTableMap
