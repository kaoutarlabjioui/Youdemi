
<?php

abstract class Label
{
    protected int $id;
    protected string $name;
    protected string $description;

    public function  __construct(){}

    public function __call($name,$arguments)
    {
        if($name == "construct")
        {
            if(count($arguments) == 1)
            {
                $this->name=$arguments[0];
            }

            if(count($arguments) == 2)
            {
                $this->name=$arguments[0];
                $this->description=$arguments[1];
            }
        }
    }



    public function setId(int $id):int
    {
        return $this->id=$id;
    }

    public function setName(string $name):string
    {
       return  $this->name=$name;
    }

    public function setDescription(string $description):string
    {
       return $this->description=$description;
    }


    public function getId()
    {
        $this->id;
    }

    public function getName()
    {
        $this->name;
    }

    public function getDescription()
    {
        $this->description;
    }

    public function __toString():string
    {
        return "id: " .$this->id. " , name: " .$this->name. " , description: " .$this->description. ".";
    }
}

?>