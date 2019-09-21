<?php

namespace InstagramScraper\Model;


class Location extends AbstractModel
{
    /**
     * @var array
     */
    protected static $initPropertiesMap = [
        'id' => 'id',
        'has_public_page' => 'hasPublicPage',
        'name' => 'name',
        'slug' => 'slug',
        'lat' => 'lat',
        'lng' => 'lng',
        'modified' => 'modified'
    ];
    /**
     * @var
     */
    protected $id;
    /**
     * @var
     */
    protected $hasPublicPage;
    /**
     * @var
     */
    protected $name;
    /**
     * @var
     */
    protected $slug;
    /**
     * @var
     */
    protected $lng;
    /**
     * @var
     */
    protected $lat;
    /**
     * @var bool
     */
    protected $isLoaded = false;

    /**
     * @var int
     */
    protected $mediaCount;

    /**
     * @var int
     */
    protected $mediaCountTopPost;
    /**
     * @var 
     */
    protected $modified;
    
    /**
     * @var
     */
    protected $address;
    
    /**
     * @var
     */
    protected $cityName;
    

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getHasPublicPage()
    {
        return $this->hasPublicPage;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return mixed
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->modified;
    }
    
    /** 
     * @return mixed
     */
    public function getMediaCount()
    {
        return $this->mediaCount;
    }

    /** 
     * @return mixed
     */
    public function getMediaCountTopPost()
    {
        return $this->mediaCountTopPost;
    }
    
    /** 
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /** 
     * @return mixed
     */
    public function getCityName()
    {
        return $this->cityName;
    }
    
    protected function initPropertiesCustom($value, $prop, $arr)
    {
        if(array_key_exists($prop, self::$initPropertiesMap)){
            $this->{self::$initPropertiesMap[$prop]} = $value;
        }

        switch($prop) {
            case 'edge_location_to_media':
                $this->mediaCount = $arr[$prop]['count'];
                break;
            case 'edge_location_to_top_posts':
                $this->mediaCountTopPost = $arr[$prop]['count'];
                break;
            case 'address_json':
                $this->cityName = json_decode($arr[$prop], true)['city_name'];
                $this->address = json_decode($arr[$prop], true)['street_address'];
                break;
        }

    }
}
