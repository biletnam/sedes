<?php



/**
 * This class defines the structure of the 'seat' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.simply.map
 */
class SeatTableMap extends TableMap
{

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'simply.map.SeatTableMap';

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
		$this->setName('seat');
		$this->setPhpName('Seat');
		$this->setClassname('Seat');
		$this->setPackage('simply');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'id', 'INTEGER', true, null, null);
		$this->addForeignKey('ROWID', 'rowId', 'INTEGER', 'row', 'ID', false, null, null);
		$this->addColumn('NAME', 'name', 'VARCHAR', false, 255, null);
		$this->addColumn('NUMBER', 'number', 'VARCHAR', false, 255, null);
		$this->addColumn('NOSEAT', 'noSeat', 'BOOLEAN', false, 1, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
		$this->addRelation('Row', 'Row', RelationMap::MANY_TO_ONE, array('rowId' => 'id', ), null, null);
		$this->addRelation('SeatToAvailability', 'SeatAvailability', RelationMap::ONE_TO_MANY, array('id' => 'seatId', ), null, null, 'SeatToAvailabilitys');
		$this->addRelation('SeatToOrder', 'OrderSeat', RelationMap::ONE_TO_MANY, array('id' => 'seatId', ), null, null, 'SeatToOrders');
	} // buildRelations()

} // SeatTableMap
