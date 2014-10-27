<?php
/**
 * Created by PhpStorm.
 * User: Hamaryuginh
 * Date: 27/10/2014
 * Time: 20:16
 */

namespace Hamaryuginh\MeekroDbBundle\Services;
use Hamaryuginh\MeekroDbBundle\Model\MDBFactory;
use Hamaryuginh\MeekroDbBundle\Model\MeekroDBConnection;

/**
 * Class MeekroDB
 * @package Hamaryuginh\MeekroDbBundle\Services
 */
class MeekroDB
{
    /** @var MDBFactory $factory */
    private $factory;
    /** @var array $connections */
    private $connections;

    /**
     * @param MDBFactory $factory
     * @param array $config
     */
    public function __construct(MDBFactory $factory, $config)
    {
        $this->factory = $factory;
        $this->createConnections($config);
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->connections;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->connections);
    }

    /**
     * @param string $name
     * @return MeekroDBConnection|null
     */
    public function get($name)
    {
        if (array_key_exists($name, $this->connections))
            return $this->connections[$name];

        return null;
    }

    /**
     * @param $config
     */
    private function createConnections($config)
    {
        foreach ($config['connections'] as $connectionName => $connectionConfig)
        {
            $this->connections[$connectionName] = $this->factory->createConnection(
                $connectionConfig['host'],
                $connectionConfig['port'],
                $connectionConfig['db_name'],
                $connectionConfig['user'],
                $connectionConfig['password']
            );
        }
    }
} 