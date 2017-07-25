<?php
/**
 * Created by PhpStorm.
 * User: V.ahmedzhanov
 * Date: 25/07/17
 * Time: 11:52
 */

namespace unisender\data;


use function base64_encode;
use Exception;
use function file_get_contents;
use function is_null;
use function pathinfo;
use const PATHINFO_BASENAME;

/**
 * Class AttachData
 * @package unisender\data
 */
class AttachData
{
    private $data = [];

    public $inline = false;

    public function __construct($filePath, $type = null, $name = null, $inline = false)
    {
        if (is_null($type)) {
            $type = mime_content_type($filePath);
        }

        if (is_null($name)) {
            $name = pathinfo($filePath, PATHINFO_BASENAME);
        }

        $this->data['type'] = $type;
        $this->data['content'] = base64_encode(file_get_contents($filePath));
        $this->data['name'] = $name;

        $this->inline = $inline;
    }


    public function __invoke()
    {
        return $this->data;
    }

}