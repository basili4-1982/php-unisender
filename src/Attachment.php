<?php

class Attachment
{
    private $type=null;
    private $name=null;
    private $filePath=null;

    function __construct($type,$name,$filePath)
    {
        $this->type=$type;
        $this->name=$name;
        $this->filePath=$filePath;
    }

    private function run()
    {
        return [

        ];
    }

    function __invoke()
    {
        return $this->run();
    }
}