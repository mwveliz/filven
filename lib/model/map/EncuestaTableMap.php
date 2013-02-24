<?php



/**
 * This class defines the structure of the 'encuesta' table.
 *
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Sat Feb 23 11:46:17 2013
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.lib.model.map
 */
class EncuestaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.EncuestaTableMap';

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
		$this->setName('encuesta');
		$this->setPhpName('Encuesta');
		$this->setClassname('Encuesta');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('encuesta_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE_ENCUESTA', 'NombreEncuesta', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPCION_ENCUESTA', 'DescripcionEncuesta', 'VARCHAR', false, 255, null);
		$this->addColumn('TIPO_ENCUESTA', 'TipoEncuesta', 'VARCHAR', false, 255, null);
		$this->addColumn('FECHA_ELABORACION', 'FechaElaboracion', 'DATE', false, null, 'now()');
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Item', 'Item', RelationMap::ONE_TO_MANY, array('id' => 'id_encuesta', ), null, null);
    $this->addRelation('RespuestaEncuesta', 'RespuestaEncuesta', RelationMap::ONE_TO_MANY, array('id' => 'id_encuesta', ), null, null);
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

} // EncuestaTableMap
