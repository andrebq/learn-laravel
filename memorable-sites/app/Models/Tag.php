<?php

namespace App\Models;

class Tag {
    public $key;
    public $value;

    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public static function to_tag_list($obj) {
        if (!$obj) { return []; }
        return array_map(fn(string $key, string $val) => new Tag($key, $val), array_keys($obj), array_values($obj));
    }
}

?>