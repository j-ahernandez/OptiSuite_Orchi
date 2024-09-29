<?php

namespace App\Orchid\Resources;

use App\Models\ModeloVehiculo;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use Orchid\Crud\Resource;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use \App\Models\PosicionVehiculo;
use \App\Models\YearVehiculo;

class DescriptionPartResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\DescriptionPart::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            // Fila 0
            Group::make([
                Input::make('code')
                    ->title('Código')
                    ->type(value: 'text')
                    ->id('CódigoInput')
                    ->placeholder('Código')
                    ->readonly(),
            ]),
            // Fila 1
            Group::make([
                Select::make('typeid')
                    ->options([
                        0 => 'VEHICULO (01-99)',
                        1 => 'TRAMO TERMINADO (9T -- TrT)',
                        2 => 'TRAMO RECTO (9TR -- TrR)',
                        3 => 'GRAPA',
                    ])
                    ->title('Tipo Vehículo')
                    ->id('typeidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'form-select'),
                Relation::make('modelid')
                    ->fromModel(ModeloVehiculo::class, 'modelo_detalle', 'id')
                    ->displayAppend('vehiculo_y_modelo')  // Usa el nuevo atributo
                    ->title('Seleccione un Vehículo con su Modelo')
                    ->empty('Seleccione una opción')
                    ->id('modelidInput')
                    ->set('class', 'form-select')
                    ->disabled()
                    ->help('Por favor seleccione el vehículo y modelo.'),
                Input::make('apodo')
                    ->title('Apodo')
                    ->type(value: 'text')
                    ->id(value: 'apodoInput')
                    ->readonly()
                    ->placeholder('Apodo'),
            ]),
            // Fila 2
            Group::make([
                Relation::make('yearid')
                    ->fromModel(YearVehiculo::class, 'year_vh', 'id')  // Usar el modelo YearVehiculo
                    ->title('Seleccione un año')
                    ->id('yearidInput')
                    ->empty('Seleccione un año')
                    ->searchable()
                    ->set('class', 'form-select')
                    ->disabled()
                    ->help('Por favor seleccione un año.'),
                Relation::make('positionid')
                    ->fromModel(PosicionVehiculo::class, 'posicion', 'id')  // Usar el modelo PosicionVehiculo
                    ->title('Seleccione una posición')
                    ->id('positionidInput')
                    ->empty('Seleccione una posición')
                    ->searchable()
                    ->set('class', 'form-select')
                    ->disabled()
                    ->help('Por favor seleccione una posición.'),
                Relation::make('dlttrsid')
                    ->fromModel(Vehiculo::class, 'descripcionname: vehiculo', 'id')  // Modelo Vehiculo (puedes cambiarlo si es otro)
                    ->title('Seleccione una Dlt/Trs')
                    ->id('dlttrsidInput')
                    ->empty('Seleccione una Dlt/Trs')
                    ->searchable()
                    ->set('class', 'form-select')
                    ->disabled()
                    ->help('Por favor seleccione una Dlt/Trs.'),
            ]),
            // Fila 3
            Group::make([
                Input::make('identidad')
                    ->title('Identidad')
                    ->type(value: 'text')
                    ->id('identidadInput')
                    ->readonly()
                    ->placeholder('Identidad'),
                Relation::make('refauxid')
                    ->fromModel(Vehiculo::class, 'descripcionvehiculo', 'id')  // Cambia a tu modelo correspondiente
                    ->title('Seleccione un Ref/Aux')
                    ->id('refauxidInput')
                    ->empty('Seleccione una Ref/Aux')
                    ->searchable()
                    ->set('class', 'form-select')
                    ->disabled()
                    ->help('Por favor seleccione una Ref/Aux.'),
                Relation::make('materialgrapaid')
                    ->fromModel(Vehiculo::class, 'descripcionvehiculo', 'id')  // Cambia a tu modelo correspondiente
                    ->title('Seleccione un Material Grapa')
                    ->id('materialgrapaidInput')
                    ->empty('Seleccione una opción')
                    ->searchable()
                    ->set('class', 'form-select')
                    ->disabled()
                    ->help('Por favor seleccione una Material Grapa.'),
            ]),
            // Fila 4
            Group::make([
                Select::make('materialid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Material')
                    ->id('materialidInput')
                    ->empty('')
                    ->searchable()
                    ->disabled()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione una Material.'),
                Input::make('anchomm')
                    ->title('Ancho MM')
                    ->type(value: 'text')
                    ->id('anchommInput')
                    ->readonly()
                    ->placeholder('Ancho MM'),
                Input::make('gruesomm')
                    ->title('Grueso MM')
                    ->type(value: 'text')
                    ->id('gruesommInput')
                    ->readonly()
                    ->placeholder('Grueso MM'),
            ]),
            // Fila 5
            Group::make([
                Input::make('longit')
                    ->title('Longit CM')
                    ->type(value: 'text')
                    ->id('longitInput')
                    ->readonly()
                    ->placeholder('Longit MM'),
                /* ->rules('required|numeric|min:10|max:180') */
                // Añade las reglas de validación aquí,
                Input::make('description')
                    ->title('Descripción')
                    ->type(value: 'text')
                    ->id('descriptionInput')
                    ->readonly()
                    ->placeholder('Descripción'),
                Select::make('tipohojaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo de Hoja')
                    ->empty('')
                    ->id('tipohojaidInput')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Tipo de Hoja.'),
            ]),
            // Fila 6
            Group::make([
                Input::make('cortecm')
                    ->title('Corte Cm')
                    ->type(value: 'text')
                    ->id('cortecmInput')
                    ->readonly()
                    ->placeholder('Corte CM'),
                Input::make('distcccm')
                    ->title('Distcc CM')
                    ->type(value: 'text')
                    ->id('distcccmInput')
                    ->readonly()
                    ->placeholder('Distcc CM'),
                Input::make('lccm')
                    ->title('LC CM')
                    ->type(value: 'text')
                    ->id('lccmInput')
                    ->readonly()
                    ->placeholder('LC CM'),
            ]),
            // Fila 7
            Group::make([
                Input::make('llcm')
                    ->title('LL CM')
                    ->type(value: 'text')
                    ->id('llcmInput')
                    ->readonly()
                    ->placeholder('LL CM'),
                Select::make('roleolcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Roleo LC')
                    ->empty('')
                    ->id('roleolcidInput')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Roleo LC.'),
                Select::make('roleollid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Roleo LL')
                    ->empty('')
                    ->id('roleollidInput')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Roleo LL.'),
            ]),
            // Fila 8
            Group::make([
                Input::make('2roleolc')
                    ->title('2Roleo LC')
                    ->type(value: 'text')
                    ->id('2roleolcInput')
                    ->readonly()
                    ->placeholder('2Roleo LC'),
                Input::make(name: '2roleollllcm')
                    ->title('2Roleo LL')
                    ->type(value: 'text')
                    ->id('2roleollllcmInput')
                    ->readonly()
                    ->placeholder('2Roleo LL'),
                Select::make('2porcenroleo')
                    ->options([
                        0 => '0%',
                        1 => '25%',
                        2 => '75%',
                        3 => '100%',
                    ])
                    ->title('Seleccione un 2% Roleo')
                    ->id('2porcenroleoInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un 2% Roleo.'),
            ]),
            // Fila 9
            Group::make([
                Select::make('diambocadoid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Diam Bocado')
                    ->id('diambocadoidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Diam Bocado.'),
                Select::make('anchoteid')
                    ->options(value: [
                        0 => '1.0"',
                        1 => '1.25"',
                        2 => '1.50"',
                        3 => '1.75"',
                        4 => '2.0"',
                        5 => '2.25"',
                    ])
                    ->title('Seleccione un Ancho TE')
                    ->id('anchoteidInput')
                    ->empty('')
                    ->searchable()
                    ->disable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Ancho TE.'),
                Select::make('destajeid')
                    ->options(value: [
                        0 => 'SiLC -- NoLL',
                        1 => 'No',
                        2 => 'SiLL -- NoLC',
                        3 => 'SiLL -- SiLC',
                    ])
                    ->title('Seleccione un Destaje')
                    ->id('destajeidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Destaje.'),
            ]),
            // Fila 10
            Group::make([
                Select::make('porcendespunte')
                    ->options([
                        0 => '0%',
                        1 => '25%',
                        2 => '75%',
                        3 => '100%',
                    ])
                    ->title('Seleccione un % Despunte')
                    ->id('porcendespunteInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un % Despunte.'),
                Select::make('abraztipoid')
                    ->options([
                        0 => '',
                        1 => 'Tornillo',
                        2 => 'Doblada',
                    ])
                    ->title('Seleccione un Abraz Tipo')
                    ->id('abraztipoidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Abraz Tipo.'),
                Select::make('abrazmasterid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Abraz Master')
                    ->id('abrazmasteridInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Abraz Master.'),
            ]),
            // Fila 11
            Group::make([
                Input::make('abrazlongcm')
                    ->title('Abraz Long CM')
                    ->type(value: 'text')
                    ->id('abrazlongcmInput')
                    ->readonly()
                    ->placeholder('Abraz Long CM'),
                Select::make('diatcid')
                    ->options([
                        0 => '',
                        1 => '6',
                        2 => '7',
                        3 => '8',
                        4 => '8.5',
                        5 => '9',
                        6 => '9.5',
                        7 => '10',
                        8 => '10.5',
                        9 => '11',
                        10 => '11.5',
                        11 => '12',
                        12 => '12.5',
                        13 => '13',
                        14 => '13.5',
                        15 => '14',
                        16 => '14.5',
                        17 => '15',
                        18 => '15.5',
                        19 => '16',
                        20 => '16.5',
                        21 => '19',
                        22 => '19.5',
                        23 => '20',
                        24 => '22',
                        25 => '23',
                        26 => '25',
                        27 => '26',
                    ])
                    ->title('Seleccione un Dia TC')
                    ->id('diatcidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Dia TC.'),
                Select::make('tiposbujesid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo de Buje')
                    ->id('tiposbujesidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Tipo de Buje.'),
            ]),
            // Fila 12
            Group::make([
                Select::make('bujelcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Buje LC')
                    ->id('bujelcidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Buje LC.'),
                Select::make('bujellid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Buje LL')
                    ->id('bujellidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Buje LL.'),
                Select::make('brioid')
                    ->options(function () {
                        // Selecciona los campos 'cm' e 'inches' y los concatena
                        return DB::table('brios')
                            ->select(
                                'id',
                                DB::raw("CONCAT(cm, ' - ', inches) as cm_and_inches")
                            )
                            ->pluck('cm_and_inches', 'id');
                    })
                    ->title('Seleccione un Brio CM')
                    ->id('brioidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione un Brio CM.'),
            ]),
            // Fila 13
            Group::make([
                Input::make('pesokg')
                    ->title('Peso KG')
                    ->type(value: 'text')
                    ->id('pesokgInput')
                    ->readonly()
                    ->placeholder('Peso KG'),
                Select::make('roscaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Rosca')
                    ->id('roscaidInput')
                    ->empty('')
                    ->searchable()
                    ->set('class', 'selectpicker')
                    ->disabled()
                    ->help('Por favor seleccione una Rosca.'),
            ]),
            // Fila 15
            Group::make([
                TextArea::make('observacion')
                    ->title('Observación')
                    ->id('observacionInput')
                    ->rows(5)
                    ->width('100%'),
            ]),
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id')
                ->sort()
                ->filter(Input::make()),
            TD::make('code', 'Código')
                ->sort()
                ->filter(Input::make()),
            TD::make('typeid', 'Tipo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            }*/
            TD::make('vehiculoid', 'Vehiculo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            }*/
            TD::make('modelid', 'Modelo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->modelid;
            }*/
            TD::make('apodo', 'Apodo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->apodo;
            }*/
            TD::make('yearid', 'Año')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->yearid;
            }*/
            TD::make('positionid', 'Posición')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->positionid;
            }*/
            TD::make('dlttrsid', 'Dlt/Trs')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->dlttrsid;
            }*/
            TD::make('identidad', 'Identidad')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->identidad;
            }*/
            TD::make('refauxid', 'Ref/Aux')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->refauxid;
            }*/
            TD::make('materialgrapaid', 'Material Grapa')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialgrapaid;
            }*/
            TD::make('anchomm', 'Ancho')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchomm;
            }*/
            TD::make('gruesomm', 'Grueso (mm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->gruesomm;
            }*/
            TD::make('longit', 'Longit (mm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->longit;
            }*/
            TD::make('description', 'Descripción')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->description;
            }*/
            TD::make('tipohojaid', 'Tipo Hoja')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tipohojaid;
            }*/
            TD::make('cortecm', 'Corte (cm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->cortecm;
            }*/
            TD::make('distcccm', 'DistCC (cm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->distcccm;
            }*/
            TD::make('lccm', 'LC (cm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->lccm;
            }*/
            TD::make('llcm', 'LL (cm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->llcm;
            }*/
            TD::make('roleolcid', 'RoleoLC')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            }*/
            TD::make('roleollid', 'Roleo LL')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleollid;
            }*/
            TD::make('2roleolc', '2RoleoLL')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleolc;
            }*/
            TD::make('2roleoll', '2RoleoLC')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleollllcm;
            }*/
            TD::make('2porcenroleo', '2% Roleo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2porcenroleo;
            }*/
            TD::make('diambocadoid', 'Diam Bocado')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diambocadoid;
            }*/
            TD::make('anchoteid', 'Ancho TE')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchoteid;
            }*/
            TD::make('destajeid', 'Destaje')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            }*/
            TD::make('porcendespunte', '% Despunte')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            }*/
            TD::make('abraztipoid', 'Abraz-Tipo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abraztipoid;
            }*/
            TD::make('abrazmasterid', 'Abraz-Master')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazmasterid;
            }*/
            TD::make('abrazlongcm', 'Abrazad-Long (cm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazlongcm;
            }*/
            TD::make('diatcid', 'DiaTC')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diatcid;
            }*/
            TD::make('tiposbujesid', 'Tipos de Buje')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tiposbujesid;
            }*/
            TD::make('bujelcid', 'Buje LC')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujelcid;
            }*/
            TD::make('bujellid', 'Buje LL')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujellid;
            }*/
            TD::make('brioid', 'Brio (cm)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->brioid;
            }*/
            TD::make('pesokg', 'Peso (kg)')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->pesokg;
            }*/
            TD::make('observacion', 'Observación')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->observacion;
            }*/
            TD::make('rosca', 'Rosca')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->typeid;
            }*/
            TD::make('created_at', 'Fecha de creación')
                ->sort()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            TD::make('updated_at', 'Fecha de actualización')
                ->sort()
                ->filter(Input::make())
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id'),
            // Fila 1
            Sight::make('code', 'Código'),
            Sight::make('typeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->typeid;
            })*/
            Sight::make('vehiculoid', 'Vehiculo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            })*/
            Sight::make('modelid', 'Modelo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->modelid;
            })*/
            Sight::make('apodo', 'Apodo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->apodo;
            })*/
            Sight::make('yearid', 'Año'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->yearid;
            })*/
            Sight::make('positionid', 'Posición'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->positionid;
            })*/
            Sight::make('dlttrsid', 'Dlt/Trs'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->dlttrsid;
            })*/
            Sight::make('identidad', 'Identidad'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->identidad;
            })*/
            Sight::make('refauxid', 'Ref/Aux'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->refauxid;
            })*/
            Sight::make('materialgrapaid', 'Material Grapa'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialgrapaid;
            })*/
            Sight::make('materialid', 'Material'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialid;
            })*/
            Sight::make('anchomm', 'Ancho (mm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchomm;
            })*/
            Sight::make('gruesomm', 'Grueso (mm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->gruesomm;
            })*/
            Sight::make('longit', 'Longit (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->longit;
            })*/
            Sight::make('description', 'Descripción'),
            Sight::make('tipohojaid', 'Tipo Hoja'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tipohojaid;
            })*/
            Sight::make('cortecm', 'Corte (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->cortecm;
            })*/
            Sight::make('distcccm', 'DistCC (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->distcccm;
            })*/
            Sight::make('lccm', 'LC (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->lccm;
            })*/
            Sight::make('llcm', 'LL (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->llcm;
            })*/
            Sight::make('roleolcid', 'RoleoLC'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            })*/
            Sight::make('roleollid', 'RoleoLL'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            })*/
            Sight::make('2roleolc', '2Roleo LC'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleolc;
            })*/
            Sight::make('2roleoll', '2Roleo LL'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleollllcm;
            })*/
            Sight::make('2porcenroleo', '2% Roleo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2porcenroleo;
            })*/
            Sight::make('diambocadoid', 'Diam Bocado'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diambocadoid;
            })*/
            Sight::make('anchoteid', 'Ancho TE'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchoteid;
            })*/
            Sight::make('destajeid', 'Destaje'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            })*/
            Sight::make('porcendespunte', '% Despunte'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->porcendespunte;
            })*/
            Sight::make('abraztipoid', 'Abraz-Tipo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abraztipoid;
            })*/
            Sight::make('abrazmasterid', 'Abraz-Master'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazmasterid;
            })*/
            Sight::make('abrazlongcm', 'Abraz-Long (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazlongcm;
            })*/
            Sight::make('diatcid', 'DiaTC'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diatcid;
            })*/
            Sight::make('tiposbujesid', 'Tipos de Buje'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tiposbujesid;
            })*/
            Sight::make('bujelcid', 'Buje LC'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujelcid;
            })*/
            Sight::make('bujellid', 'Buje LL'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujellid;
            })*/
            Sight::make('brioid', 'Brio (cm)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->brioid;
            })*/
            Sight::make('pesokg', 'Peso (kg)'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->pesokg;
            })*/
            Sight::make('observacion', 'Observación'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->observacion;
            })*/
            Sight::make('roscaid', 'Rosca'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleollid;
            })*/
            Sight::make('created_at', 'Fecha de actualización')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
            Sight::make('updated_at', 'Fecha de actualización')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    /**
     * Get the label for the resource.
     *
     * @return string
     */
    public static function label(): string
    {
        // Este método define el nombre que aparecerá en el menú para este recurso.
        return __('Descripción de Partes');
    }

    /**
     * Get the title for the resource.
     *
     * @return string
     */
    public function title(): string
    {
        // Este método define el título que se mostrará en la vista de detalles del recurso.
        return __('Descripción de Partes');
    }

    /**
     * Get the singular name of the resource.
     *
     * @return string
     */
    public static function singular(): string
    {
        return __('Descripción de Parte');
    }

    /**
     * Get the plural name of the resource.
     *
     * @return string
     */
    public static function plural(): string
    {
        return __('Descripción de Partes');
    }

    /**
     * Get the description of the resource.
     *
     * @return string
     */
    public static function description(): string
    {
        return __('Gestión de Descripciones de Partes');
    }

    /**
     * Get the text for the list breadcrumbs.
     *
     * @return string
     */
    public static function listBreadcrumbsMessage(): string
    {
        return static::label();
    }

    /**
     * Get the text for the create breadcrumbs.
     *
     * @return string
     */
    public static function createBreadcrumbsMessage(): string
    {
        return __('Nuevo :resource', ['resource' => static::singular()]);
    }

    /**
     * Get the text for the edit breadcrumbs.
     *
     * @return string
     */
    public static function editBreadcrumbsMessage(): string
    {
        return __('Editar :resource', ['resource' => static::singular()]);
    }

    /**
     * Get the text for the create resource button.
     *
     * @return string|null
     */
    public static function createButtonLabel(): string
    {
        return __('Crear :resource', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the create resource toast.
     *
     * @return string
     */
    public static function createToastMessage(): string
    {
        return __(':resource fue creado!', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the update resource button.
     *
     * @return string|null
     */
    public static function updateButtonLabel(): string
    {
        return __('Actualizar :resource', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the update resource toast.
     *
     * @return string
     */
    public static function updateToastMessage(): string
    {
        return __(':resource fue actualizado!', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Get the text for the delete resource button.
     *
     * @return string|null
     */
    public static function deleteButtonLabel(): string
    {
        return __('Eliminar :resource', [
            'resource' => static::singular()
        ]);
    }

    /**
     * Determine if the resource should be displayed in the navigation menu.
     *
     * This method controls whether the resource will appear in the navigation menu.
     * Returning false means the resource will not be automatically added to the menu.
     *
     * @return bool
     */
    public static function displayInNavigation(): bool
    {
        return false;
    }
}
