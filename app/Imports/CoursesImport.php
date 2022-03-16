<?php

namespace App\Imports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CoursesImport implements ToModel, WithValidation, WithHeadingRow
{
    private $numRows = 0;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->numRows;

        return new Course([
            'name'              => $row['nombre'],
            'code'              => $row['codigo'],
            'section'           => $row['seccion'],
            'id_sima'           => $row['id_sima'],
            'id_continua'       => $row['id_continua'],
            'id_sima_doc'       => $row['id_sima_doc'],
            'id_continua_doc'   => $row['id_continua_doc'],
            'id_dpto'           => $row['id_dpto'],
            'id_faculty'        => $row['id_facultad'],
            'slug'              => Str::slug('codigo'),

        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'            => 'required|unique:courses,name',
            'codigo'            => 'required|unique:courses,code',
            'seccion'           => 'required',
            'id_sima'           => 'unique:courses,id_sima',
            'id_continua'       => 'unique:courses,id_continua',
            'id_sima_doc'       => 'unique:courses,id_sima_doc',
            'id_continua_doc'   => 'unique:courses,id_continua_doc',
            'id_dpto'           => 'unique:courses,id_dpto',
            'id_facultad'       => 'unique:courses,id_faculty',
        ];
    }

    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
