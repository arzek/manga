<?php
/**
 * Created by PhpStorm.
 * User: artembondarchuk
 * Date: 13.01.18
 * Time: 15:41
 */

namespace App\Repositories;

use Curl\Curl;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

/**
 * Class CatalogRepository
 * @package App\Repositories
 */
class CatalogRepository
{
    /**
     * @var string
     */
    private $order;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $tags;

    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $status;

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     * @return $this
     */
    public function setOrder(string $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param string $tags
     * @return $this
     */
    public function setTags(string $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return mixed
     * @throws \ErrorException
     */
    public function get()
    {
        $data = [
            'secretlinkType' => getenv('SECRET_LINK_TYPE')
        ];

        if ($this->getOrder()) {
            $data['order'] = $this->getOrder();
        }

        if ($this->getType()) {
            $data['type'] = $this->getType();
        }

        if ($this->getTags()) {
        	
            $data['tags'] = $this->getTags();
        }

        $uri = http_build_query($data);
        $url = getenv('API_MANGA_CATALOG').$uri;



        if ($this->getType() != 'random') {
            return Cache::store('redis')->remember($url, 1440, function () use ($url) {
                return $this->getDateFromApi($url);
            });
        } else {
            return $this->getDateFromApi($url);
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    private function dataFormatting($data)
    {
        return $data['data'];
    }

    /**
     * @param string $url
     * @return mixed
     * @throws \ErrorException
     */
    private function getDateFromApi(string $url)
    {
        $curl = new Curl();
        $curl->get($url);
        if (!$curl->error) {
            return $this->dataFormatting(json_decode($curl->rawResponse,1));
        } else {
            throw new Exception('Error API');
        }
    }
}
