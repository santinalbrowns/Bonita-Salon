<?php

namespace app\core;

use app\core\database\DatabaseModel;

abstract class AdminModel extends DatabaseModel
{
    abstract public function getDisplayName() : string;

    abstract public function getId();
}
