<?php



/**
 * This class defines the structure of the 'pagina' table.
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
class PaginaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PaginaTableMap';

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
		$this->setName('pagina');
		$this->setPhpName('Pagina');
		$this->setClassname('Pagina');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		$this->setPrimaryKeyMethodInfo('pagina_id_seq');
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('ID_INFORME', 'IdInforme', 'INTEGER', 'informe', 'ID', false, null, null);
		$this->addColumn('TITULO_INFORME', 'TituloInforme', 'VARCHAR', false, 255, null);
		$this->addColumn('ANTE_CUADRO', 'AnteCuadro', 'VARCHAR', false, 255, null);
		$this->addColumn('TITULO_CUADRO', 'TituloCuadro', 'VARCHAR', false, 255, null);
		$this->addColumn('POST_CUADRO', 'PostCuadro', 'VARCHAR', false, 255, null);
		$this->addColumn('TEXTO_POSTERIOR', 'TextoPosterior', 'VARCHAR', false, 255, null);
		$this->addColumn('ANTE_GRAFICO', 'AnteGrafico', 'VARCHAR', false, 255, null);
		$this->addColumn('POST_GRAFICO', 'PostGrafico', 'VARCHAR', false, 255, null);
		$this->addColumn('TIPO_GRAFICO', 'TipoGrafico', 'INTEGER', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Informe', 'Informe', RelationMap::MANY_TO_ONE, array('id_informe' => 'id', ), null, 'CASCADE');
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

} // PaginaTableMap
