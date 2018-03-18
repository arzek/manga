<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 18.03.2018
 * Time: 13:54
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Manga extends Model implements \JsonSerializable
{
    protected $table = 'manga';

    public $timestamps = false;

    /**
     * @param array $data
     */
    public function prepareData(array $data) 
    {
        $this->id = $data['id'];
        $this->alt_name = $data['alt_name'];
        $this->const_long = $data['const_long'];
        $this->count_ch = $data['count_ch'];
        $this->img = $data['img'];
        $this->mangaka = json_encode($data['mangaka']);
        $this->rating = $data['rating'];
        $this->short_story = $data['short_story'];
        $this->status = $data['status'];
        $this->tags = $data['tags'];
        $this->title_full = $data['title_full'];
        $this->trans_status = $data['trans_status'];
        $this->translation_full = json_encode($data['translation_full']);
        $this->type = $data['type'];
        $this->chapters = json_encode($data['chapters']);
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'alt_name' => $this->alt_name,
            'const_long' => $this->const_long,
            'count_ch' => $this->count_ch,
            'img' => $this->img,
            'mangaka' => json_decode($this->mangaka, true),
            'rating' => $this->rating,
            'short_story' => $this->short_story,
            'status' => $this->status,
            'tags' => $this->tags,
            'title_full' => $this->title_full,
            'trans_status' => $this->trans_status,
            'translation_full' => json_decode($this->translation_full, true),
            'type' => $this->type,
            'chapters' => json_decode($this->chapters)
        ];
    }
}