<?php



/**
 * This class defines the structure of the 'usuario' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sat Mar  9 12:50:36 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class UsuarioTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.UsuarioTableMap';

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
		$this->setName('usuario');
		$this->setPhpName('Usuario');
		$this->setClassname('Usuario');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('usuario_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 255, null);
		$this->addColumn('APELLIDO', 'Apellido', 'VARCHAR', false, 255, null);
		$this->addColumn('USUARIO', 'Usuario', 'VARCHAR', false, 255, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', false, 255, null);
		$this->addColumn('EMAIL', 'Email', 'VARCHAR', false, 255, null);
		$this->addColumn('TELEFONO', 'Telefono', 'VARCHAR', false, 255, null);
		$this->addColumn('SEXO', 'Sexo', 'BOOLEAN', false, null, null);
		$this->addColumn('ACTIVO', 'Activo', 'BOOLEAN', false, null, null);
		$this->addColumn('ID_SF_GUARD_GROUP', 'IdSfGuardGroup', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
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

} // UsuarioTableMap
