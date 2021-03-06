<?php


/**
 * Base class that represents a row from the 'cc_subjs' table.
 *
 * 
 *
 * @package    propel.generator.airtime.om
 */
abstract class BaseCcSubjs extends BaseObject  implements Persistent
{

	/**
	 * Peer class name
	 */
  const PEER = 'CcSubjsPeer';

	/**
	 * The Peer class.
	 * Instance provides a convenient way of calling static methods on a class
	 * that calling code may not be able to identify.
	 * @var        CcSubjsPeer
	 */
	protected static $peer;

	/**
	 * The value for the id field.
	 * @var        int
	 */
	protected $id;

	/**
	 * The value for the login field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $login;

	/**
	 * The value for the pass field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $pass;

	/**
	 * The value for the type field.
	 * Note: this column has a database default value of: 'U'
	 * @var        string
	 */
	protected $type;

	/**
	 * The value for the first_name field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $first_name;

	/**
	 * The value for the last_name field.
	 * Note: this column has a database default value of: ''
	 * @var        string
	 */
	protected $last_name;

	/**
	 * The value for the lastlogin field.
	 * @var        string
	 */
	protected $lastlogin;

	/**
	 * The value for the lastfail field.
	 * @var        string
	 */
	protected $lastfail;

	/**
	 * The value for the skype_contact field.
	 * @var        string
	 */
	protected $skype_contact;

	/**
	 * The value for the jabber_contact field.
	 * @var        string
	 */
	protected $jabber_contact;

	/**
	 * The value for the email field.
	 * @var        string
	 */
	protected $email;

	/**
	 * The value for the cell_phone field.
	 * @var        string
	 */
	protected $cell_phone;

	/**
	 * The value for the login_attempts field.
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $login_attempts;

	/**
	 * @var        array CcAccess[] Collection to store aggregation of CcAccess objects.
	 */
	protected $collCcAccesss;

	/**
	 * @var        array CcFiles[] Collection to store aggregation of CcFiles objects.
	 */
	protected $collCcFiless;

	/**
	 * @var        array CcPerms[] Collection to store aggregation of CcPerms objects.
	 */
	protected $collCcPermss;

	/**
	 * @var        array CcShowHosts[] Collection to store aggregation of CcShowHosts objects.
	 */
	protected $collCcShowHostss;

	/**
	 * @var        array CcPlaylist[] Collection to store aggregation of CcPlaylist objects.
	 */
	protected $collCcPlaylists;

	/**
	 * @var        array CcPref[] Collection to store aggregation of CcPref objects.
	 */
	protected $collCcPrefs;

	/**
	 * @var        array CcSess[] Collection to store aggregation of CcSess objects.
	 */
	protected $collCcSesss;

	/**
	 * @var        array CcSubjsToken[] Collection to store aggregation of CcSubjsToken objects.
	 */
	protected $collCcSubjsTokens;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInSave = false;

	/**
	 * Flag to prevent endless validation loop, if this object is referenced
	 * by another object which falls in this transaction.
	 * @var        boolean
	 */
	protected $alreadyInValidation = false;

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see        __construct()
	 */
	public function applyDefaultValues()
	{
		$this->login = '';
		$this->pass = '';
		$this->type = 'U';
		$this->first_name = '';
		$this->last_name = '';
		$this->login_attempts = 0;
	}

	/**
	 * Initializes internal state of BaseCcSubjs object.
	 * @see        applyDefaults()
	 */
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	/**
	 * Get the [id] column value.
	 * 
	 * @return     int
	 */
	public function getDbId()
	{
		return $this->id;
	}

	/**
	 * Get the [login] column value.
	 * 
	 * @return     string
	 */
	public function getDbLogin()
	{
		return $this->login;
	}

	/**
	 * Get the [pass] column value.
	 * 
	 * @return     string
	 */
	public function getDbPass()
	{
		return $this->pass;
	}

	/**
	 * Get the [type] column value.
	 * 
	 * @return     string
	 */
	public function getDbType()
	{
		return $this->type;
	}

	/**
	 * Get the [first_name] column value.
	 * 
	 * @return     string
	 */
	public function getDbFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Get the [last_name] column value.
	 * 
	 * @return     string
	 */
	public function getDbLastName()
	{
		return $this->last_name;
	}

	/**
	 * Get the [optionally formatted] temporal [lastlogin] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDbLastlogin($format = 'Y-m-d H:i:s')
	{
		if ($this->lastlogin === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->lastlogin);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastlogin, true), $x);
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [optionally formatted] temporal [lastfail] column value.
	 * 
	 *
	 * @param      string $format The date/time format string (either date()-style or strftime()-style).
	 *							If format is NULL, then the raw DateTime object will be returned.
	 * @return     mixed Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
	 * @throws     PropelException - if unable to parse/validate the date/time value.
	 */
	public function getDbLastfail($format = 'Y-m-d H:i:s')
	{
		if ($this->lastfail === null) {
			return null;
		}



		try {
			$dt = new DateTime($this->lastfail);
		} catch (Exception $x) {
			throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->lastfail, true), $x);
		}

		if ($format === null) {
			// Because propel.useDateTimeClass is TRUE, we return a DateTime object.
			return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	/**
	 * Get the [skype_contact] column value.
	 * 
	 * @return     string
	 */
	public function getDbSkypeContact()
	{
		return $this->skype_contact;
	}

	/**
	 * Get the [jabber_contact] column value.
	 * 
	 * @return     string
	 */
	public function getDbJabberContact()
	{
		return $this->jabber_contact;
	}

	/**
	 * Get the [email] column value.
	 * 
	 * @return     string
	 */
	public function getDbEmail()
	{
		return $this->email;
	}

	/**
	 * Get the [cell_phone] column value.
	 * 
	 * @return     string
	 */
	public function getDbCellPhone()
	{
		return $this->cell_phone;
	}

	/**
	 * Get the [login_attempts] column value.
	 * 
	 * @return     int
	 */
	public function getDbLoginAttempts()
	{
		return $this->login_attempts;
	}

	/**
	 * Set the value of [id] column.
	 * 
	 * @param      int $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CcSubjsPeer::ID;
		}

		return $this;
	} // setDbId()

	/**
	 * Set the value of [login] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbLogin($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->login !== $v || $this->isNew()) {
			$this->login = $v;
			$this->modifiedColumns[] = CcSubjsPeer::LOGIN;
		}

		return $this;
	} // setDbLogin()

	/**
	 * Set the value of [pass] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbPass($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->pass !== $v || $this->isNew()) {
			$this->pass = $v;
			$this->modifiedColumns[] = CcSubjsPeer::PASS;
		}

		return $this;
	} // setDbPass()

	/**
	 * Set the value of [type] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbType($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->type !== $v || $this->isNew()) {
			$this->type = $v;
			$this->modifiedColumns[] = CcSubjsPeer::TYPE;
		}

		return $this;
	} // setDbType()

	/**
	 * Set the value of [first_name] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbFirstName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->first_name !== $v || $this->isNew()) {
			$this->first_name = $v;
			$this->modifiedColumns[] = CcSubjsPeer::FIRST_NAME;
		}

		return $this;
	} // setDbFirstName()

	/**
	 * Set the value of [last_name] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbLastName($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->last_name !== $v || $this->isNew()) {
			$this->last_name = $v;
			$this->modifiedColumns[] = CcSubjsPeer::LAST_NAME;
		}

		return $this;
	} // setDbLastName()

	/**
	 * Sets the value of [lastlogin] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbLastlogin($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->lastlogin !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->lastlogin !== null && $tmpDt = new DateTime($this->lastlogin)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->lastlogin = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = CcSubjsPeer::LASTLOGIN;
			}
		} // if either are not null

		return $this;
	} // setDbLastlogin()

	/**
	 * Sets the value of [lastfail] column to a normalized version of the date/time value specified.
	 * 
	 * @param      mixed $v string, integer (timestamp), or DateTime value.  Empty string will
	 *						be treated as NULL for temporal objects.
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbLastfail($v)
	{
		// we treat '' as NULL for temporal objects because DateTime('') == DateTime('now')
		// -- which is unexpected, to say the least.
		if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
			// some string/numeric value passed; we normalize that so that we can
			// validate it.
			try {
				if (is_numeric($v)) { // if it's a unix timestamp
					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
					// We have to explicitly specify and then change the time zone because of a
					// DateTime bug: http://bugs.php.net/bug.php?id=43003
					$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->lastfail !== null || $dt !== null ) {
			// (nested ifs are a little easier to read in this case)

			$currNorm = ($this->lastfail !== null && $tmpDt = new DateTime($this->lastfail)) ? $tmpDt->format('Y-m-d\\TH:i:sO') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d\\TH:i:sO') : null;

			if ( ($currNorm !== $newNorm) // normalized values don't match 
					)
			{
				$this->lastfail = ($dt ? $dt->format('Y-m-d\\TH:i:sO') : null);
				$this->modifiedColumns[] = CcSubjsPeer::LASTFAIL;
			}
		} // if either are not null

		return $this;
	} // setDbLastfail()

	/**
	 * Set the value of [skype_contact] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbSkypeContact($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->skype_contact !== $v) {
			$this->skype_contact = $v;
			$this->modifiedColumns[] = CcSubjsPeer::SKYPE_CONTACT;
		}

		return $this;
	} // setDbSkypeContact()

	/**
	 * Set the value of [jabber_contact] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbJabberContact($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->jabber_contact !== $v) {
			$this->jabber_contact = $v;
			$this->modifiedColumns[] = CcSubjsPeer::JABBER_CONTACT;
		}

		return $this;
	} // setDbJabberContact()

	/**
	 * Set the value of [email] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = CcSubjsPeer::EMAIL;
		}

		return $this;
	} // setDbEmail()

	/**
	 * Set the value of [cell_phone] column.
	 * 
	 * @param      string $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbCellPhone($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->cell_phone !== $v) {
			$this->cell_phone = $v;
			$this->modifiedColumns[] = CcSubjsPeer::CELL_PHONE;
		}

		return $this;
	} // setDbCellPhone()

	/**
	 * Set the value of [login_attempts] column.
	 * 
	 * @param      int $v new value
	 * @return     CcSubjs The current object (for fluent API support)
	 */
	public function setDbLoginAttempts($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->login_attempts !== $v || $this->isNew()) {
			$this->login_attempts = $v;
			$this->modifiedColumns[] = CcSubjsPeer::LOGIN_ATTEMPTS;
		}

		return $this;
	} // setDbLoginAttempts()

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return     boolean Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues()
	{
			if ($this->login !== '') {
				return false;
			}

			if ($this->pass !== '') {
				return false;
			}

			if ($this->type !== 'U') {
				return false;
			}

			if ($this->first_name !== '') {
				return false;
			}

			if ($this->last_name !== '') {
				return false;
			}

			if ($this->login_attempts !== 0) {
				return false;
			}

		// otherwise, everything was equal, so return TRUE
		return true;
	} // hasOnlyDefaultValues()

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param      array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
	 * @param      int $startcol 0-based offset column which indicates which restultset column to start with.
	 * @param      boolean $rehydrate Whether this object is being re-hydrated from the database.
	 * @return     int next starting column
	 * @throws     PropelException  - Any caught Exception will be rewrapped as a PropelException.
	 */
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->login = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->pass = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->type = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->first_name = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->last_name = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->lastlogin = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->lastfail = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->skype_contact = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->jabber_contact = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->email = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->cell_phone = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->login_attempts = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 13; // 13 = CcSubjsPeer::NUM_COLUMNS - CcSubjsPeer::NUM_LAZY_LOAD_COLUMNS).

		} catch (Exception $e) {
			throw new PropelException("Error populating CcSubjs object", $e);
		}
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws     PropelException
	 */
	public function ensureConsistency()
	{

	} // ensureConsistency

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param      boolean $deep (optional) Whether to also de-associated any related objects.
	 * @param      PropelPDO $con (optional) The PropelPDO connection to use.
	 * @return     void
	 * @throws     PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcSubjsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$stmt = CcSubjsPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); // rehydrate

		if ($deep) {  // also de-associate any related objects?

			$this->collCcAccesss = null;

			$this->collCcFiless = null;

			$this->collCcPermss = null;

			$this->collCcShowHostss = null;

			$this->collCcPlaylists = null;

			$this->collCcPrefs = null;

			$this->collCcSesss = null;

			$this->collCcSubjsTokens = null;

		} // if (deep)
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @param      PropelPDO $con
	 * @return     void
	 * @throws     PropelException
	 * @see        BaseObject::setDeleted()
	 * @see        BaseObject::isDeleted()
	 */
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcSubjsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$ret = $this->preDelete($con);
			if ($ret) {
				CcSubjsQuery::create()
					->filterByPrimaryKey($this->getPrimaryKey())
					->delete($con);
				$this->postDelete($con);
				$con->commit();
				$this->setDeleted(true);
			} else {
				$con->commit();
			}
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        doSave()
	 */
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CcSubjsPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		$isInsert = $this->isNew();
		try {
			$ret = $this->preSave($con);
			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}
			if ($ret) {
				$affectedRows = $this->doSave($con);
				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				CcSubjsPeer::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @param      PropelPDO $con
	 * @return     int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @throws     PropelException
	 * @see        save()
	 */
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; // initialize var to track total num of affected rows
		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CcSubjsPeer::ID;
			}

			// If this object has been modified, then save it to the database.
			if ($this->isModified()) {
				if ($this->isNew()) {
					$criteria = $this->buildCriteria();
					if ($criteria->keyContainsValue(CcSubjsPeer::ID) ) {
						throw new PropelException('Cannot insert a value for auto-increment primary key ('.CcSubjsPeer::ID.')');
					}

					$pk = BasePeer::doInsert($criteria, $con);
					$affectedRows = 1;
					$this->setDbId($pk);  //[IMV] update autoincrement primary key
					$this->setNew(false);
				} else {
					$affectedRows = CcSubjsPeer::doUpdate($this, $con);
				}

				$this->resetModified(); // [HL] After being saved an object is no longer 'modified'
			}

			if ($this->collCcAccesss !== null) {
				foreach ($this->collCcAccesss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcFiless !== null) {
				foreach ($this->collCcFiless as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcPermss !== null) {
				foreach ($this->collCcPermss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcShowHostss !== null) {
				foreach ($this->collCcShowHostss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcPlaylists !== null) {
				foreach ($this->collCcPlaylists as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcPrefs !== null) {
				foreach ($this->collCcPrefs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcSesss !== null) {
				foreach ($this->collCcSesss as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCcSubjsTokens !== null) {
				foreach ($this->collCcSubjsTokens as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} // doSave()

	/**
	 * Array of ValidationFailed objects.
	 * @var        array ValidationFailed[]
	 */
	protected $validationFailures = array();

	/**
	 * Gets any ValidationFailed objects that resulted from last call to validate().
	 *
	 *
	 * @return     array ValidationFailed[]
	 * @see        validate()
	 */
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	/**
	 * Validates the objects modified field values and all objects related to this table.
	 *
	 * If $columns is either a column name or an array of column names
	 * only those columns are validated.
	 *
	 * @param      mixed $columns Column name or an array of column names.
	 * @return     boolean Whether all columns pass validation.
	 * @see        doValidate()
	 * @see        getValidationFailures()
	 */
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	/**
	 * This function performs the validation work for complex object models.
	 *
	 * In addition to checking the current object, all related objects will
	 * also be validated.  If all pass then <code>true</code> is returned; otherwise
	 * an aggreagated array of ValidationFailed objects will be returned.
	 *
	 * @param      array $columns Array of column names to validate.
	 * @return     mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
	 */
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = CcSubjsPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collCcAccesss !== null) {
					foreach ($this->collCcAccesss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcFiless !== null) {
					foreach ($this->collCcFiless as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcPermss !== null) {
					foreach ($this->collCcPermss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcShowHostss !== null) {
					foreach ($this->collCcShowHostss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcPlaylists !== null) {
					foreach ($this->collCcPlaylists as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcPrefs !== null) {
					foreach ($this->collCcPrefs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcSesss !== null) {
					foreach ($this->collCcSesss as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCcSubjsTokens !== null) {
					foreach ($this->collCcSubjsTokens as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param      string $name name
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     mixed Value of field.
	 */
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcSubjsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @return     mixed Value of field at $pos
	 */
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getDbId();
				break;
			case 1:
				return $this->getDbLogin();
				break;
			case 2:
				return $this->getDbPass();
				break;
			case 3:
				return $this->getDbType();
				break;
			case 4:
				return $this->getDbFirstName();
				break;
			case 5:
				return $this->getDbLastName();
				break;
			case 6:
				return $this->getDbLastlogin();
				break;
			case 7:
				return $this->getDbLastfail();
				break;
			case 8:
				return $this->getDbSkypeContact();
				break;
			case 9:
				return $this->getDbJabberContact();
				break;
			case 10:
				return $this->getDbEmail();
				break;
			case 11:
				return $this->getDbCellPhone();
				break;
			case 12:
				return $this->getDbLoginAttempts();
				break;
			default:
				return null;
				break;
		} // switch()
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. 
	 *                    Defaults to BasePeer::TYPE_PHPNAME.
	 * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 *
	 * @return    array an associative array containing the field names (as keys) and field values
	 */
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CcSubjsPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getDbId(),
			$keys[1] => $this->getDbLogin(),
			$keys[2] => $this->getDbPass(),
			$keys[3] => $this->getDbType(),
			$keys[4] => $this->getDbFirstName(),
			$keys[5] => $this->getDbLastName(),
			$keys[6] => $this->getDbLastlogin(),
			$keys[7] => $this->getDbLastfail(),
			$keys[8] => $this->getDbSkypeContact(),
			$keys[9] => $this->getDbJabberContact(),
			$keys[10] => $this->getDbEmail(),
			$keys[11] => $this->getDbCellPhone(),
			$keys[12] => $this->getDbLoginAttempts(),
		);
		return $result;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param      string $name peer name
	 * @param      mixed $value field value
	 * @param      string $type The type of fieldname the $name is of:
	 *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
	 *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
	 * @return     void
	 */
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CcSubjsPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param      int $pos position in xml schema
	 * @param      mixed $value field value
	 * @return     void
	 */
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setDbId($value);
				break;
			case 1:
				$this->setDbLogin($value);
				break;
			case 2:
				$this->setDbPass($value);
				break;
			case 3:
				$this->setDbType($value);
				break;
			case 4:
				$this->setDbFirstName($value);
				break;
			case 5:
				$this->setDbLastName($value);
				break;
			case 6:
				$this->setDbLastlogin($value);
				break;
			case 7:
				$this->setDbLastfail($value);
				break;
			case 8:
				$this->setDbSkypeContact($value);
				break;
			case 9:
				$this->setDbJabberContact($value);
				break;
			case 10:
				$this->setDbEmail($value);
				break;
			case 11:
				$this->setDbCellPhone($value);
				break;
			case 12:
				$this->setDbLoginAttempts($value);
				break;
		} // switch()
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
	 * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
	 * The default key type is the column's phpname (e.g. 'AuthorId')
	 *
	 * @param      array  $arr     An array to populate the object from.
	 * @param      string $keyType The type of keys the array uses.
	 * @return     void
	 */
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CcSubjsPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setDbId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setDbLogin($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDbPass($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setDbType($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDbFirstName($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setDbLastName($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setDbLastlogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDbLastfail($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setDbSkypeContact($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setDbJabberContact($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setDbEmail($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setDbCellPhone($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setDbLoginAttempts($arr[$keys[12]]);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return     Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria()
	{
		$criteria = new Criteria(CcSubjsPeer::DATABASE_NAME);

		if ($this->isColumnModified(CcSubjsPeer::ID)) $criteria->add(CcSubjsPeer::ID, $this->id);
		if ($this->isColumnModified(CcSubjsPeer::LOGIN)) $criteria->add(CcSubjsPeer::LOGIN, $this->login);
		if ($this->isColumnModified(CcSubjsPeer::PASS)) $criteria->add(CcSubjsPeer::PASS, $this->pass);
		if ($this->isColumnModified(CcSubjsPeer::TYPE)) $criteria->add(CcSubjsPeer::TYPE, $this->type);
		if ($this->isColumnModified(CcSubjsPeer::FIRST_NAME)) $criteria->add(CcSubjsPeer::FIRST_NAME, $this->first_name);
		if ($this->isColumnModified(CcSubjsPeer::LAST_NAME)) $criteria->add(CcSubjsPeer::LAST_NAME, $this->last_name);
		if ($this->isColumnModified(CcSubjsPeer::LASTLOGIN)) $criteria->add(CcSubjsPeer::LASTLOGIN, $this->lastlogin);
		if ($this->isColumnModified(CcSubjsPeer::LASTFAIL)) $criteria->add(CcSubjsPeer::LASTFAIL, $this->lastfail);
		if ($this->isColumnModified(CcSubjsPeer::SKYPE_CONTACT)) $criteria->add(CcSubjsPeer::SKYPE_CONTACT, $this->skype_contact);
		if ($this->isColumnModified(CcSubjsPeer::JABBER_CONTACT)) $criteria->add(CcSubjsPeer::JABBER_CONTACT, $this->jabber_contact);
		if ($this->isColumnModified(CcSubjsPeer::EMAIL)) $criteria->add(CcSubjsPeer::EMAIL, $this->email);
		if ($this->isColumnModified(CcSubjsPeer::CELL_PHONE)) $criteria->add(CcSubjsPeer::CELL_PHONE, $this->cell_phone);
		if ($this->isColumnModified(CcSubjsPeer::LOGIN_ATTEMPTS)) $criteria->add(CcSubjsPeer::LOGIN_ATTEMPTS, $this->login_attempts);

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether or not they have been modified.
	 *
	 * @return     Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CcSubjsPeer::DATABASE_NAME);
		$criteria->add(CcSubjsPeer::ID, $this->id);

		return $criteria;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return     int
	 */
	public function getPrimaryKey()
	{
		return $this->getDbId();
	}

	/**
	 * Generic method to set the primary key (id column).
	 *
	 * @param      int $key Primary key.
	 * @return     void
	 */
	public function setPrimaryKey($key)
	{
		$this->setDbId($key);
	}

	/**
	 * Returns true if the primary key for this object is null.
	 * @return     boolean
	 */
	public function isPrimaryKeyNull()
	{
		return null === $this->getDbId();
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      object $copyObj An object of CcSubjs (or compatible) type.
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws     PropelException
	 */
	public function copyInto($copyObj, $deepCopy = false)
	{
		$copyObj->setDbLogin($this->login);
		$copyObj->setDbPass($this->pass);
		$copyObj->setDbType($this->type);
		$copyObj->setDbFirstName($this->first_name);
		$copyObj->setDbLastName($this->last_name);
		$copyObj->setDbLastlogin($this->lastlogin);
		$copyObj->setDbLastfail($this->lastfail);
		$copyObj->setDbSkypeContact($this->skype_contact);
		$copyObj->setDbJabberContact($this->jabber_contact);
		$copyObj->setDbEmail($this->email);
		$copyObj->setDbCellPhone($this->cell_phone);
		$copyObj->setDbLoginAttempts($this->login_attempts);

		if ($deepCopy) {
			// important: temporarily setNew(false) because this affects the behavior of
			// the getter/setter methods for fkey referrer objects.
			$copyObj->setNew(false);

			foreach ($this->getCcAccesss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcAccess($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcFiless() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcFiles($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcPermss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcPerms($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcShowHostss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcShowHosts($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcPlaylists() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcPlaylist($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcPrefs() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcPref($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcSesss() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcSess($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCcSubjsTokens() as $relObj) {
				if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
					$copyObj->addCcSubjsToken($relObj->copy($deepCopy));
				}
			}

		} // if ($deepCopy)


		$copyObj->setNew(true);
		$copyObj->setDbId(NULL); // this is a auto-increment column, so set to default value
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @return     CcSubjs Clone of current object.
	 * @throws     PropelException
	 */
	public function copy($deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	/**
	 * Returns a peer instance associated with this om.
	 *
	 * Since Peer classes are not to have any instance attributes, this method returns the
	 * same instance for all member of this class. The method could therefore
	 * be static, but this would prevent one from overriding the behavior.
	 *
	 * @return     CcSubjsPeer
	 */
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new CcSubjsPeer();
		}
		return self::$peer;
	}

	/**
	 * Clears out the collCcAccesss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcAccesss()
	 */
	public function clearCcAccesss()
	{
		$this->collCcAccesss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcAccesss collection.
	 *
	 * By default this just sets the collCcAccesss collection to an empty array (like clearcollCcAccesss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcAccesss()
	{
		$this->collCcAccesss = new PropelObjectCollection();
		$this->collCcAccesss->setModel('CcAccess');
	}

	/**
	 * Gets an array of CcAccess objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcAccess[] List of CcAccess objects
	 * @throws     PropelException
	 */
	public function getCcAccesss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcAccesss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcAccesss) {
				// return empty collection
				$this->initCcAccesss();
			} else {
				$collCcAccesss = CcAccessQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcAccesss;
				}
				$this->collCcAccesss = $collCcAccesss;
			}
		}
		return $this->collCcAccesss;
	}

	/**
	 * Returns the number of related CcAccess objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcAccess objects.
	 * @throws     PropelException
	 */
	public function countCcAccesss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcAccesss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcAccesss) {
				return 0;
			} else {
				$query = CcAccessQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcAccesss);
		}
	}

	/**
	 * Method called to associate a CcAccess object to this object
	 * through the CcAccess foreign key attribute.
	 *
	 * @param      CcAccess $l CcAccess
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcAccess(CcAccess $l)
	{
		if ($this->collCcAccesss === null) {
			$this->initCcAccesss();
		}
		if (!$this->collCcAccesss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcAccesss[]= $l;
			$l->setCcSubjs($this);
		}
	}

	/**
	 * Clears out the collCcFiless collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcFiless()
	 */
	public function clearCcFiless()
	{
		$this->collCcFiless = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcFiless collection.
	 *
	 * By default this just sets the collCcFiless collection to an empty array (like clearcollCcFiless());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcFiless()
	{
		$this->collCcFiless = new PropelObjectCollection();
		$this->collCcFiless->setModel('CcFiles');
	}

	/**
	 * Gets an array of CcFiles objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcFiles[] List of CcFiles objects
	 * @throws     PropelException
	 */
	public function getCcFiless($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcFiless || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcFiless) {
				// return empty collection
				$this->initCcFiless();
			} else {
				$collCcFiless = CcFilesQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcFiless;
				}
				$this->collCcFiless = $collCcFiless;
			}
		}
		return $this->collCcFiless;
	}

	/**
	 * Returns the number of related CcFiles objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcFiles objects.
	 * @throws     PropelException
	 */
	public function countCcFiless(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcFiless || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcFiless) {
				return 0;
			} else {
				$query = CcFilesQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcFiless);
		}
	}

	/**
	 * Method called to associate a CcFiles object to this object
	 * through the CcFiles foreign key attribute.
	 *
	 * @param      CcFiles $l CcFiles
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcFiles(CcFiles $l)
	{
		if ($this->collCcFiless === null) {
			$this->initCcFiless();
		}
		if (!$this->collCcFiless->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcFiless[]= $l;
			$l->setCcSubjs($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this CcSubjs is new, it will return
	 * an empty collection; or if this CcSubjs has previously
	 * been saved, it will retrieve related CcFiless from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in CcSubjs.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CcFiles[] List of CcFiles objects
	 */
	public function getCcFilessJoinCcMusicDirs($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CcFilesQuery::create(null, $criteria);
		$query->joinWith('CcMusicDirs', $join_behavior);

		return $this->getCcFiless($query, $con);
	}

	/**
	 * Clears out the collCcPermss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcPermss()
	 */
	public function clearCcPermss()
	{
		$this->collCcPermss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcPermss collection.
	 *
	 * By default this just sets the collCcPermss collection to an empty array (like clearcollCcPermss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcPermss()
	{
		$this->collCcPermss = new PropelObjectCollection();
		$this->collCcPermss->setModel('CcPerms');
	}

	/**
	 * Gets an array of CcPerms objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcPerms[] List of CcPerms objects
	 * @throws     PropelException
	 */
	public function getCcPermss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcPermss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcPermss) {
				// return empty collection
				$this->initCcPermss();
			} else {
				$collCcPermss = CcPermsQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcPermss;
				}
				$this->collCcPermss = $collCcPermss;
			}
		}
		return $this->collCcPermss;
	}

	/**
	 * Returns the number of related CcPerms objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcPerms objects.
	 * @throws     PropelException
	 */
	public function countCcPermss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcPermss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcPermss) {
				return 0;
			} else {
				$query = CcPermsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcPermss);
		}
	}

	/**
	 * Method called to associate a CcPerms object to this object
	 * through the CcPerms foreign key attribute.
	 *
	 * @param      CcPerms $l CcPerms
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcPerms(CcPerms $l)
	{
		if ($this->collCcPermss === null) {
			$this->initCcPermss();
		}
		if (!$this->collCcPermss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcPermss[]= $l;
			$l->setCcSubjs($this);
		}
	}

	/**
	 * Clears out the collCcShowHostss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcShowHostss()
	 */
	public function clearCcShowHostss()
	{
		$this->collCcShowHostss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcShowHostss collection.
	 *
	 * By default this just sets the collCcShowHostss collection to an empty array (like clearcollCcShowHostss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcShowHostss()
	{
		$this->collCcShowHostss = new PropelObjectCollection();
		$this->collCcShowHostss->setModel('CcShowHosts');
	}

	/**
	 * Gets an array of CcShowHosts objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcShowHosts[] List of CcShowHosts objects
	 * @throws     PropelException
	 */
	public function getCcShowHostss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcShowHostss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcShowHostss) {
				// return empty collection
				$this->initCcShowHostss();
			} else {
				$collCcShowHostss = CcShowHostsQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcShowHostss;
				}
				$this->collCcShowHostss = $collCcShowHostss;
			}
		}
		return $this->collCcShowHostss;
	}

	/**
	 * Returns the number of related CcShowHosts objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcShowHosts objects.
	 * @throws     PropelException
	 */
	public function countCcShowHostss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcShowHostss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcShowHostss) {
				return 0;
			} else {
				$query = CcShowHostsQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcShowHostss);
		}
	}

	/**
	 * Method called to associate a CcShowHosts object to this object
	 * through the CcShowHosts foreign key attribute.
	 *
	 * @param      CcShowHosts $l CcShowHosts
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcShowHosts(CcShowHosts $l)
	{
		if ($this->collCcShowHostss === null) {
			$this->initCcShowHostss();
		}
		if (!$this->collCcShowHostss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcShowHostss[]= $l;
			$l->setCcSubjs($this);
		}
	}


	/**
	 * If this collection has already been initialized with
	 * an identical criteria, it returns the collection.
	 * Otherwise if this CcSubjs is new, it will return
	 * an empty collection; or if this CcSubjs has previously
	 * been saved, it will retrieve related CcShowHostss from storage.
	 *
	 * This method is protected by default in order to keep the public
	 * api reasonable.  You can provide public methods for those you
	 * actually need in CcSubjs.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @param      string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
	 * @return     PropelCollection|array CcShowHosts[] List of CcShowHosts objects
	 */
	public function getCcShowHostssJoinCcShow($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$query = CcShowHostsQuery::create(null, $criteria);
		$query->joinWith('CcShow', $join_behavior);

		return $this->getCcShowHostss($query, $con);
	}

	/**
	 * Clears out the collCcPlaylists collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcPlaylists()
	 */
	public function clearCcPlaylists()
	{
		$this->collCcPlaylists = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcPlaylists collection.
	 *
	 * By default this just sets the collCcPlaylists collection to an empty array (like clearcollCcPlaylists());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcPlaylists()
	{
		$this->collCcPlaylists = new PropelObjectCollection();
		$this->collCcPlaylists->setModel('CcPlaylist');
	}

	/**
	 * Gets an array of CcPlaylist objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcPlaylist[] List of CcPlaylist objects
	 * @throws     PropelException
	 */
	public function getCcPlaylists($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcPlaylists || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcPlaylists) {
				// return empty collection
				$this->initCcPlaylists();
			} else {
				$collCcPlaylists = CcPlaylistQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcPlaylists;
				}
				$this->collCcPlaylists = $collCcPlaylists;
			}
		}
		return $this->collCcPlaylists;
	}

	/**
	 * Returns the number of related CcPlaylist objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcPlaylist objects.
	 * @throws     PropelException
	 */
	public function countCcPlaylists(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcPlaylists || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcPlaylists) {
				return 0;
			} else {
				$query = CcPlaylistQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcPlaylists);
		}
	}

	/**
	 * Method called to associate a CcPlaylist object to this object
	 * through the CcPlaylist foreign key attribute.
	 *
	 * @param      CcPlaylist $l CcPlaylist
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcPlaylist(CcPlaylist $l)
	{
		if ($this->collCcPlaylists === null) {
			$this->initCcPlaylists();
		}
		if (!$this->collCcPlaylists->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcPlaylists[]= $l;
			$l->setCcSubjs($this);
		}
	}

	/**
	 * Clears out the collCcPrefs collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcPrefs()
	 */
	public function clearCcPrefs()
	{
		$this->collCcPrefs = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcPrefs collection.
	 *
	 * By default this just sets the collCcPrefs collection to an empty array (like clearcollCcPrefs());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcPrefs()
	{
		$this->collCcPrefs = new PropelObjectCollection();
		$this->collCcPrefs->setModel('CcPref');
	}

	/**
	 * Gets an array of CcPref objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcPref[] List of CcPref objects
	 * @throws     PropelException
	 */
	public function getCcPrefs($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcPrefs || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcPrefs) {
				// return empty collection
				$this->initCcPrefs();
			} else {
				$collCcPrefs = CcPrefQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcPrefs;
				}
				$this->collCcPrefs = $collCcPrefs;
			}
		}
		return $this->collCcPrefs;
	}

	/**
	 * Returns the number of related CcPref objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcPref objects.
	 * @throws     PropelException
	 */
	public function countCcPrefs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcPrefs || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcPrefs) {
				return 0;
			} else {
				$query = CcPrefQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcPrefs);
		}
	}

	/**
	 * Method called to associate a CcPref object to this object
	 * through the CcPref foreign key attribute.
	 *
	 * @param      CcPref $l CcPref
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcPref(CcPref $l)
	{
		if ($this->collCcPrefs === null) {
			$this->initCcPrefs();
		}
		if (!$this->collCcPrefs->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcPrefs[]= $l;
			$l->setCcSubjs($this);
		}
	}

	/**
	 * Clears out the collCcSesss collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcSesss()
	 */
	public function clearCcSesss()
	{
		$this->collCcSesss = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcSesss collection.
	 *
	 * By default this just sets the collCcSesss collection to an empty array (like clearcollCcSesss());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcSesss()
	{
		$this->collCcSesss = new PropelObjectCollection();
		$this->collCcSesss->setModel('CcSess');
	}

	/**
	 * Gets an array of CcSess objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcSess[] List of CcSess objects
	 * @throws     PropelException
	 */
	public function getCcSesss($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcSesss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcSesss) {
				// return empty collection
				$this->initCcSesss();
			} else {
				$collCcSesss = CcSessQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcSesss;
				}
				$this->collCcSesss = $collCcSesss;
			}
		}
		return $this->collCcSesss;
	}

	/**
	 * Returns the number of related CcSess objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcSess objects.
	 * @throws     PropelException
	 */
	public function countCcSesss(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcSesss || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcSesss) {
				return 0;
			} else {
				$query = CcSessQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcSesss);
		}
	}

	/**
	 * Method called to associate a CcSess object to this object
	 * through the CcSess foreign key attribute.
	 *
	 * @param      CcSess $l CcSess
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcSess(CcSess $l)
	{
		if ($this->collCcSesss === null) {
			$this->initCcSesss();
		}
		if (!$this->collCcSesss->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcSesss[]= $l;
			$l->setCcSubjs($this);
		}
	}

	/**
	 * Clears out the collCcSubjsTokens collection
	 *
	 * This does not modify the database; however, it will remove any associated objects, causing
	 * them to be refetched by subsequent calls to accessor method.
	 *
	 * @return     void
	 * @see        addCcSubjsTokens()
	 */
	public function clearCcSubjsTokens()
	{
		$this->collCcSubjsTokens = null; // important to set this to NULL since that means it is uninitialized
	}

	/**
	 * Initializes the collCcSubjsTokens collection.
	 *
	 * By default this just sets the collCcSubjsTokens collection to an empty array (like clearcollCcSubjsTokens());
	 * however, you may wish to override this method in your stub class to provide setting appropriate
	 * to your application -- for example, setting the initial array to the values stored in database.
	 *
	 * @return     void
	 */
	public function initCcSubjsTokens()
	{
		$this->collCcSubjsTokens = new PropelObjectCollection();
		$this->collCcSubjsTokens->setModel('CcSubjsToken');
	}

	/**
	 * Gets an array of CcSubjsToken objects which contain a foreign key that references this object.
	 *
	 * If the $criteria is not null, it is used to always fetch the results from the database.
	 * Otherwise the results are fetched from the database the first time, then cached.
	 * Next time the same method is called without $criteria, the cached collection is returned.
	 * If this CcSubjs is new, it will return
	 * an empty collection or the current collection; the criteria is ignored on a new object.
	 *
	 * @param      Criteria $criteria optional Criteria object to narrow the query
	 * @param      PropelPDO $con optional connection object
	 * @return     PropelCollection|array CcSubjsToken[] List of CcSubjsToken objects
	 * @throws     PropelException
	 */
	public function getCcSubjsTokens($criteria = null, PropelPDO $con = null)
	{
		if(null === $this->collCcSubjsTokens || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcSubjsTokens) {
				// return empty collection
				$this->initCcSubjsTokens();
			} else {
				$collCcSubjsTokens = CcSubjsTokenQuery::create(null, $criteria)
					->filterByCcSubjs($this)
					->find($con);
				if (null !== $criteria) {
					return $collCcSubjsTokens;
				}
				$this->collCcSubjsTokens = $collCcSubjsTokens;
			}
		}
		return $this->collCcSubjsTokens;
	}

	/**
	 * Returns the number of related CcSubjsToken objects.
	 *
	 * @param      Criteria $criteria
	 * @param      boolean $distinct
	 * @param      PropelPDO $con
	 * @return     int Count of related CcSubjsToken objects.
	 * @throws     PropelException
	 */
	public function countCcSubjsTokens(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if(null === $this->collCcSubjsTokens || null !== $criteria) {
			if ($this->isNew() && null === $this->collCcSubjsTokens) {
				return 0;
			} else {
				$query = CcSubjsTokenQuery::create(null, $criteria);
				if($distinct) {
					$query->distinct();
				}
				return $query
					->filterByCcSubjs($this)
					->count($con);
			}
		} else {
			return count($this->collCcSubjsTokens);
		}
	}

	/**
	 * Method called to associate a CcSubjsToken object to this object
	 * through the CcSubjsToken foreign key attribute.
	 *
	 * @param      CcSubjsToken $l CcSubjsToken
	 * @return     void
	 * @throws     PropelException
	 */
	public function addCcSubjsToken(CcSubjsToken $l)
	{
		if ($this->collCcSubjsTokens === null) {
			$this->initCcSubjsTokens();
		}
		if (!$this->collCcSubjsTokens->contains($l)) { // only add it if the **same** object is not already associated
			$this->collCcSubjsTokens[]= $l;
			$l->setCcSubjs($this);
		}
	}

	/**
	 * Clears the current object and sets all attributes to their default values
	 */
	public function clear()
	{
		$this->id = null;
		$this->login = null;
		$this->pass = null;
		$this->type = null;
		$this->first_name = null;
		$this->last_name = null;
		$this->lastlogin = null;
		$this->lastfail = null;
		$this->skype_contact = null;
		$this->jabber_contact = null;
		$this->email = null;
		$this->cell_phone = null;
		$this->login_attempts = null;
		$this->alreadyInSave = false;
		$this->alreadyInValidation = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);
	}

	/**
	 * Resets all collections of referencing foreign keys.
	 *
	 * This method is a user-space workaround for PHP's inability to garbage collect objects
	 * with circular references.  This is currently necessary when using Propel in certain
	 * daemon or large-volumne/high-memory operations.
	 *
	 * @param      boolean $deep Whether to also clear the references on all associated objects.
	 */
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collCcAccesss) {
				foreach ((array) $this->collCcAccesss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcFiless) {
				foreach ((array) $this->collCcFiless as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcPermss) {
				foreach ((array) $this->collCcPermss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcShowHostss) {
				foreach ((array) $this->collCcShowHostss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcPlaylists) {
				foreach ((array) $this->collCcPlaylists as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcPrefs) {
				foreach ((array) $this->collCcPrefs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcSesss) {
				foreach ((array) $this->collCcSesss as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCcSubjsTokens) {
				foreach ((array) $this->collCcSubjsTokens as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} // if ($deep)

		$this->collCcAccesss = null;
		$this->collCcFiless = null;
		$this->collCcPermss = null;
		$this->collCcShowHostss = null;
		$this->collCcPlaylists = null;
		$this->collCcPrefs = null;
		$this->collCcSesss = null;
		$this->collCcSubjsTokens = null;
	}

	/**
	 * Catches calls to virtual methods
	 */
	public function __call($name, $params)
	{
		if (preg_match('/get(\w+)/', $name, $matches)) {
			$virtualColumn = $matches[1];
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
			// no lcfirst in php<5.3...
			$virtualColumn[0] = strtolower($virtualColumn[0]);
			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}
		throw new PropelException('Call to undefined method: ' . $name);
	}

} // BaseCcSubjs
