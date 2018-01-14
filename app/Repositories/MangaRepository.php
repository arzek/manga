<?php
/**
 * Created by PhpStorm.
 * User: artembondarchuk
 * Date: 13.01.18
 * Time: 15:29
 */

namespace App\Repositories;


use Curl\Curl;

class MangaRepository
{
    /**
     * @var Curl
     */
    private $curl;

    public function __construct()
    {
        $this->curl = new Curl();
    }

    /**
     * @param int $id
     */
    public function getById(int $id)
    {

    }
}