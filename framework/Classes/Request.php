<?php


namespace Framework\Classes;


class Request
{
    use FormInputs;

    protected $request;

    public function __construct()
    {
        $this->request = $_REQUEST;

        $this->formFields();
    }


    /**
     * Form isimlerine dinamik olarak erişebilmek için
     * Request nesnesi üzerine, form un değerleri aktarıldı.
     */
    private function formFields(): void
    {
        foreach ($this->request as $k => $form) {
            $this->{$k} = $form;
        }
    }


    /**
     * Canlı kalıtımı bozmamak için sınıfın
     * yaşayan(çalışmakta olan) kalıtımı alındı.
     *
     * @return Request
     */
    public static function newInstance(): Request
    {
        return new static();
    }
}
