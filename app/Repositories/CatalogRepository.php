<?php
/**
 * Created by PhpStorm.
 * User: artembondarchuk
 * Date: 13.01.18
 * Time: 15:41
 */

namespace App\Repositories;

use Curl\Curl;

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
    public function getOrder(): string
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
    public function getType(): string
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
    public function getTags(): string
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
    public function getText(): string
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
    public function getStatus(): string
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

    public function get()
    {
        $curl = new Curl();

        $data = [
            'secretlinkType' => getenv('SECRET_LINK_TYPE')
        ];

        if ($this->getOrder()) {
            $data['order'] = $this->getOrder();
        }

        /**
         * TODO Досисати
         */

        $curl->get(getenv('API_MANGA'),[

        ]);


    }
}
