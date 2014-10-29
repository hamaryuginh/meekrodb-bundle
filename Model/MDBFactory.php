<?php
/**
 * Created by PhpStorm.
 * User: Hamaryuginh
 * Date: 27/10/2014
 * Time: 20:37
 */

namespace Hamaryuginh\MeekroDbBundle\Model;

/**
 * Class MDBFactory
 * @package Hamaryuginh\MeekroDbBundle\Model
 */
class MDBFactory
{
    /**
     * @param $host
     * @param $port
     * @param $encoding
     * @param $dbName
     * @param $user
     * @param $password
     * @return MeekroDBConnection
     */
    public function createConnection($host, $port, $encoding, $dbName, $user, $password)
    {
        return new MeekroDBConnection($host, $port, $encoding,$dbName, $user, $password);
    }
} 