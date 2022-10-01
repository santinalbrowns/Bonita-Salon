<?php

namespace app\core;

use app\core\database\DatabaseModel;

abstract class UserModel extends DatabaseModel
{
    abstract public function getDisplayName() : string;

    abstract public function getId();
}
