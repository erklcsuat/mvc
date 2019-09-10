<?php


namespace Framework\Classes;


trait FormInputs
{
    // Request den gelen form field ını key
    // ile almaya yarıyor.
    public function get(string $field)
    {
        return $this->request[$field] ?? null;
    }

    // Request den gelen form fieldların hepsini
    // almaya yarıyor.
    public function all()
    {
        return $this->request;
    }
}
