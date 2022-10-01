<?php

namespace app\core\form;

use app\core\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;
    
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }


    abstract public function renderInput() : string;

    public function __toString()
    {
        return sprintf(
            '
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">%s</span>
                %s
                %s
            </label>
        ',
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}
