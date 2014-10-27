<?php
/**
 * Created by PhpStorm.
 * User: Hamaryuginh
 * Date: 27/10/2014
 * Time: 20:34
 */

namespace Hamaryuginh\MeekroDbBundle\Model;

/**
 * Class MeekroDBConnection
 * @package Hamaryuginh\MeekroDbBundle\Model
 */
class MeekroDBConnection
{
    public static $ALLOWED_METHODS = array(
        'query',
        'queryFirstRow',
        'queryOneRow',
        'queryAllLists',
        'queryFullColumns',
		'queryFirstList',
		'queryOneList',
		'queryFirstColumn',
		'queryOneColumn',
		'queryFirstField',
		'queryOneField',
		'queryRaw',
		'queryRawUnbuf',
		'insert',
		'insertIgnore',
		'insertUpdate',
		'replace',
		'update',
		'delete',
		'insertId',
		'count',
		'affectedRows',
		'useDB',
		'startTransaction',
		'commit',
		'rollback',
		'tableList',
		'columnList',
		'sqlEval',
		'nonSQLError',
		'serverVersion',
		'transactionDepth',
    );

    /** @var string $host */
    private $host;
    /** @var int $port */
    private $port;
    /** @var string $dbName */
    private $dbName;
    /** @var string $user */
    private $user;
    /** @var string $password */
    private $password;

    /**
     * @param string $host
     * @param int    $port
     * @param string $dbName
     * @param string $user
     * @param string $password
     */
    public function __construct($host, $port, $dbName, $user, $password)
    {
        $this->host     = $host;
        $this->port     = $port;
        $this->dbName   = $dbName;
        $this->user     = $user;
        $this->password = $password;
    }

    /**
     * @param $name
     * @param $args
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $args)
    {
        if (!in_array($name, self::$ALLOWED_METHODS))
            throw new \Exception(sprintf('The method "%s" is not allowed.', $name));

        $this->connect();
        $result = call_user_func_array(array(\DB::getMDB(), $name), $args);
        $this->disconnect();

        return $result;
    }

    /**
     * Connection
     */
    private function connect()
    {
        \DB::$host     = $this->host;
        \DB::$port     = $this->port;
        \DB::$dbName   = $this->dbName;
        \DB::$user     = $this->user;
        \DB::$password = $this->password;
    }

    /**
     * Disconnect
     */
    private function disconnect()
    {
        \DB::disconnect();
    }
} 