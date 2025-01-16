<?php

namespace app\Models;

abstract class Label
{
    protected int $id = 0;
    protected string $name;
    protected string $description = "";

    public function  __construct() {}

    public function __call($name, $arguments)
    {
        if ($name == "construct") {
            if (count($arguments) == 1) {
                $this->name = $arguments[0];
            }

            if (count($arguments) == 2) {
                $this->name = $arguments[0];
                $this->description = $arguments[1];
            }
        }
    }



    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getId(): int
    {
        return  $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    // public function __toString(): string
    // {
    //     return "id: " . $this->id . " , name: " . $this->name . " , description: " . $this->description . ".";
    // }
}
