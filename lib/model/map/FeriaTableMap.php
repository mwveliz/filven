<?php



/**
 * This class defines the structure of the 'feria' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Mon Feb 18 12:35:57 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class FeriaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.FeriaTableMap';

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
		$this->setName('feria');
		$this->setPhpName('Feria');
		$this->setClassname('Feria');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('feria_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'BIGINT', true, null, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255, null);
		$this->addColumn('FECHA_INICIO', 'FechaInicio', 'DATE', false, null, null);
		$this->addColumn('FECHA_FIN', 'FechaFin', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Visitante', 'Visitante', RelationMap::ONE_TO_MANY, array('id' => 'id_feria', ), null, null);
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

} // FeriaTableMap
