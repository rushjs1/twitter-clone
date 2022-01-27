<?php
namespace App\Tweets\Entities;


class EntityExtractor
{
    protected $string;

    const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';
    

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function getHastagEntities()
    {
        return $this->match(self::HASHTAG_REGEX);
    
    }

    protected function match($pattern)
    {
       preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);
       return $matches;

    }
}