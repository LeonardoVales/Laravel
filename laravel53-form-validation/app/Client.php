<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    const ESTADOS_CIVIS = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divorciado'
    ];

    const PESSOA_FISICA = 'fisica';
    const PESSOA_JURIDICA = 'juridica';

    protected $fillableGeneral = [
        'nome',
        'documento',
        'email',
        'telefone',
        'inadimplente',       
    ];

    protected $fillableFisica = [
        'data_nasc',
        'sexo',
        'estado_civil',
        'deficiencia_fisica'
    ];

    protected $fillableJuridica = [
        'fantasia'
    ];


    public static function getPessoa($value)
    {
        return $value == Client::PESSOA_JURIDICA ? $value : Client::PESSOA_FISICA;
    }

    protected function setFillable()
    {
        if ($this->pessoa == self::PESSOA_FISICA) {
            $this->fillable(array_merge($this->fillableGeneral, $this->fillableFisica));
        } else {
            $this->fillable(array_merge($this->fillableGeneral, $this->fillableJuridica));
        }
    }

    public function fill(array $attributes)
    {
        if (!$this->pessoa) {
            $this->pessoa = self::getPessoa(isset($attributes['pessoa']) ? $attributes['pessoa'] : null);
        }
        $this->setFillable();
        return parent::fill($attributes);
    }

}
