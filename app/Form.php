<?php

class Form
{
    private $data;
    private $constraints;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function constraints($field, array $constraints) {
        $this->constraints[$field] = $constraints;
    }

    public function checkForm() {
        $errors = false;
        foreach ($this->constraints as $field => $constraints) {
            foreach ($constraints as $constraint => $value) {
                switch ($constraint) {
                    case 'required':
                        if ($value && (!isset($this->data[$field]) || empty($this->data[$field]))) {
                            $errors[$field] = "Le champ $field est requis";
                        }
                }
            }
        }

        return $errors;
    }
}

?>
