<?php


namespace Framework\Classes;


trait FormInputs
{
    public function get(string $field)
    {
        return $this->request[$field] ?? null;
    }

    public function all()
    {
        return $this->request;
    }
}
