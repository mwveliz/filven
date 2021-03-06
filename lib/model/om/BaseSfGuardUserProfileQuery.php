<?php


/**
 * Base class that represents a query for the 'sf_guard_user_profile' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.5.6 on:
 *
 * Thu Jun  6 14:55:42 2013
 *
 * @method     SfGuardUserProfileQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     SfGuardUserProfileQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     SfGuardUserProfileQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     SfGuardUserProfileQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     SfGuardUserProfileQuery orderByBirthday($order = Criteria::ASC) Order by the birthday column
 *
 * @method     SfGuardUserProfileQuery groupById() Group by the id column
 * @method     SfGuardUserProfileQuery groupByUserId() Group by the user_id column
 * @method     SfGuardUserProfileQuery groupByFirstName() Group by the first_name column
 * @method     SfGuardUserProfileQuery groupByLastName() Group by the last_name column
 * @method     SfGuardUserProfileQuery groupByBirthday() Group by the birthday column
 *
 * @method     SfGuardUserProfileQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     SfGuardUserProfileQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     SfGuardUserProfileQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     SfGuardUserProfileQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method     SfGuardUserProfileQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method     SfGuardUserProfileQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method     SfGuardUserProfile findOne(PropelPDO $con = null) Return the first SfGuardUserProfile matching the query
 * @method     SfGuardUserProfile findOneOrCreate(PropelPDO $con = null) Return the first SfGuardUserProfile matching the query, or a new SfGuardUserProfile object populated from the query conditions when no match is found
 *
 * @method     SfGuardUserProfile findOneById(int $id) Return the first SfGuardUserProfile filtered by the id column
 * @method     SfGuardUserProfile findOneByUserId(int $user_id) Return the first SfGuardUserProfile filtered by the user_id column
 * @method     SfGuardUserProfile findOneByFirstName(string $first_name) Return the first SfGuardUserProfile filtered by the first_name column
 * @method     SfGuardUserProfile findOneByLastName(string $last_name) Return the first SfGuardUserProfile filtered by the last_name column
 * @method     SfGuardUserProfile findOneByBirthday(string $birthday) Return the first SfGuardUserProfile filtered by the birthday column
 *
 * @method     array findById(int $id) Return SfGuardUserProfile objects filtered by the id column
 * @method     array findByUserId(int $user_id) Return SfGuardUserProfile objects filtered by the user_id column
 * @method     array findByFirstName(string $first_name) Return SfGuardUserProfile objects filtered by the first_name column
 * @method     array findByLastName(string $last_name) Return SfGuardUserProfile objects filtered by the last_name column
 * @method     array findByBirthday(string $birthday) Return SfGuardUserProfile objects filtered by the birthday column
 *
 * @package    propel.generator.lib.model.om
 */
abstract class BaseSfGuardUserProfileQuery extends ModelCriteria
{

	/**
	 * Initializes internal state of BaseSfGuardUserProfileQuery object.
	 *
	 * @param     string $dbName The dabase name
	 * @param     string $modelName The phpName of a model, e.g. 'Book'
	 * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'propel', $modelName = 'SfGuardUserProfile', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new SfGuardUserProfileQuery object.
	 *
	 * @param     string $modelAlias The alias of a model in the query
	 * @param     Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return    SfGuardUserProfileQuery
	 */
	public static function create($modelAlias = null, $criteria = null)
	{
		if ($criteria instanceof SfGuardUserProfileQuery) {
			return $criteria;
		}
		$query = new SfGuardUserProfileQuery();
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
	 * @return    SfGuardUserProfile|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, $con = null)
	{
		if ((null !== ($obj = SfGuardUserProfilePeer::getInstanceFromPool((string) $key))) && $this->getFormatter()->isObjectFormatter()) {
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
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{
		return $this->addUsingAlias(SfGuardUserProfilePeer::ID, $key, Criteria::EQUAL);
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param     array $keys The list of primary key to use for the query
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{
		return $this->addUsingAlias(SfGuardUserProfilePeer::ID, $keys, Criteria::IN);
	}

	/**
	 * Filter the query on the id column
	 * 
	 * @param     int|array $id The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterById($id = null, $comparison = null)
	{
		if (is_array($id) && null === $comparison) {
			$comparison = Criteria::IN;
		}
		return $this->addUsingAlias(SfGuardUserProfilePeer::ID, $id, $comparison);
	}

	/**
	 * Filter the query on the user_id column
	 * 
	 * @param     int|array $userId The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByUserId($userId = null, $comparison = null)
	{
		if (is_array($userId)) {
			$useMinMax = false;
			if (isset($userId['min'])) {
				$this->addUsingAlias(SfGuardUserProfilePeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($userId['max'])) {
				$this->addUsingAlias(SfGuardUserProfilePeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SfGuardUserProfilePeer::USER_ID, $userId, $comparison);
	}

	/**
	 * Filter the query on the first_name column
	 * 
	 * @param     string $firstName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($firstName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $firstName)) {
				$firstName = str_replace('*', '%', $firstName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SfGuardUserProfilePeer::FIRST_NAME, $firstName, $comparison);
	}

	/**
	 * Filter the query on the last_name column
	 * 
	 * @param     string $lastName The value to use as filter.
	 *            Accepts wildcards (* and % trigger a LIKE)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, $comparison = null)
	{
		if (null === $comparison) {
			if (is_array($lastName)) {
				$comparison = Criteria::IN;
			} elseif (preg_match('/[\%\*]/', $lastName)) {
				$lastName = str_replace('*', '%', $lastName);
				$comparison = Criteria::LIKE;
			}
		}
		return $this->addUsingAlias(SfGuardUserProfilePeer::LAST_NAME, $lastName, $comparison);
	}

	/**
	 * Filter the query on the birthday column
	 * 
	 * @param     string|array $birthday The value to use as filter.
	 *            Accepts an associative array('min' => $minValue, 'max' => $maxValue)
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterByBirthday($birthday = null, $comparison = null)
	{
		if (is_array($birthday)) {
			$useMinMax = false;
			if (isset($birthday['min'])) {
				$this->addUsingAlias(SfGuardUserProfilePeer::BIRTHDAY, $birthday['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}
			if (isset($birthday['max'])) {
				$this->addUsingAlias(SfGuardUserProfilePeer::BIRTHDAY, $birthday['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}
			if ($useMinMax) {
				return $this;
			}
			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}
		return $this->addUsingAlias(SfGuardUserProfilePeer::BIRTHDAY, $birthday, $comparison);
	}

	/**
	 * Filter the query by a related sfGuardUser object
	 *
	 * @param     sfGuardUser $sfGuardUser  the related object to use as filter
	 * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function filterBysfGuardUser($sfGuardUser, $comparison = null)
	{
		return $this
			->addUsingAlias(SfGuardUserProfilePeer::USER_ID, $sfGuardUser->getId(), $comparison);
	}

	/**
	 * Adds a JOIN clause to the query using the sfGuardUser relation
	 * 
	 * @param     string $relationAlias optional alias for the relation
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function joinsfGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		$tableMap = $this->getTableMap();
		$relationMap = $tableMap->getRelation('sfGuardUser');
		
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
			$this->addJoinObject($join, 'sfGuardUser');
		}
		
		return $this;
	}

	/**
	 * Use the sfGuardUser relation sfGuardUser object
	 *
	 * @see       useQuery()
	 * 
	 * @param     string $relationAlias optional alias for the relation,
	 *                                   to be used as main alias in the secondary query
	 * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
	 *
	 * @return    sfGuardUserQuery A secondary query class using the current class as primary query
	 */
	public function usesfGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
	{
		return $this
			->joinsfGuardUser($relationAlias, $joinType)
			->useQuery($relationAlias ? $relationAlias : 'sfGuardUser', 'sfGuardUserQuery');
	}

	/**
	 * Exclude object from result
	 *
	 * @param     SfGuardUserProfile $sfGuardUserProfile Object to remove from the list of results
	 *
	 * @return    SfGuardUserProfileQuery The current query, for fluid interface
	 */
	public function prune($sfGuardUserProfile = null)
	{
		if ($sfGuardUserProfile) {
			$this->addUsingAlias(SfGuardUserProfilePeer::ID, $sfGuardUserProfile->getId(), Criteria::NOT_EQUAL);
	  }
	  
		return $this;
	}

} // BaseSfGuardUserProfileQuery
