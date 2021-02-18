<?php

namespace App\Mitpal;

class CMain
{
    private $name;

//    public function __construct()
//    {
//    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}