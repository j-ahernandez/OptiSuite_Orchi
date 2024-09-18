<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

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
            // Fila 1
            Group::make([
                Input::make('code')
                    ->title('Código')
                    ->type(value: 'text')
                    ->placeholder('Código')
                    ->autofocus(),
                Input::make('description')
                    ->title('Descripción')
                    ->type(value: 'text')
                    ->placeholder('Descripción'),
                Select::make('abraztipoid')
                    ->options([
                        0 => '',
                        1 => 'Tornillo',
                        2 => 'Doblada',
                    ])
                    ->title('Seleccione un Abraz Tipo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 2
            Group::make([
                Select::make('typeid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('tipohojaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo de Hoja')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('abrazmasterid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Abraz Master')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 3
            Group::make([
                Select::make('vehiculoid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Vehíulo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('cortecm')
                    ->title('Corte Cm')
                    ->type(value: 'text')
                    ->placeholder('Corte CM'),
                Input::make('abrazlongcm')
                    ->title('Abraz Long CM')
                    ->type(value: 'text')
                    ->placeholder('Abraz Long CM'),
            ]),
            // Fila 4
            Group::make([
                Select::make('modelid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Modelo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('distcccm')
                    ->title('Distcc CM')
                    ->type(value: 'text')
                    ->placeholder('Distcc CM'),
                Select::make('diatcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un DiaTc')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 5
            Group::make([
                Input::make('apodo')
                    ->title('Apodo')
                    ->type(value: 'text')
                    ->placeholder('Apodo'),
                Input::make('lccm')
                    ->title('LC CM')
                    ->type(value: 'text')
                    ->placeholder('LC CM'),
                Select::make('tiposbujesid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo de Buje')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 6
            Group::make([
                Select::make('yearid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un año')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('llcm')
                    ->title('LL CM')
                    ->type(value: 'text')
                    ->placeholder('LL CM'),
                Select::make('bujelcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Buje LC')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 7
            Group::make([
                Select::make('positionid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una posición')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('roleolcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Roleo LC')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('bujellid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Buje LL')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 8
            Group::make([
                Select::make('dlttrsid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Dlt/Trs')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('roleollid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Roleo LL')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('brioid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Brio CM')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 9
            Group::make([
                Input::make('identidad')
                    ->title('Identidad')
                    ->type(value: 'text')
                    ->placeholder('Apodo')
                    ->attributes(['maxlength' => '4']),
                Input::make('2roleolc')
                    ->title('2Roleo LC')
                    ->type(value: 'text')
                    ->placeholder('2Roleo LC'),
                Input::make('pesokg')
                    ->title('Peso KG')
                    ->type(value: 'text')
                    ->placeholder('Peso KG'),
            ]),
            // Fila 10
            Group::make([
                Select::make('refauxid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Ref/Aux')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make(name: '2roleollllcm')
                    ->title('2RoleoLL')
                    ->type(value: 'text')
                    ->placeholder('2RoleoLL'),
                Input::make('observacion')
                    ->title('Observación')
                    ->type(value: 'text')
                    ->placeholder('Observación'),
            ]),
            // Fila 11
            Group::make([
                Select::make('materialgrapaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Material Grapa')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('2porcenroleo')
                    ->options([
                        0 => '0%',
                        1 => '25%',
                        2 => '75%',
                        3 => '100%',
                    ])
                    ->title('Seleccione un 2% Roleo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('materialid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Material')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 12
            Group::make([
                Select::make('diambocadoid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Diam Bocado')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('anchomm')
                    ->title('Ancho MM')
                    ->type(value: 'text')
                    ->placeholder('Ancho MM'),
                Select::make('anchoteid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Anco TE')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 13
            Group::make([
                Input::make('gruesomm')
                    ->title('Grueso MM')
                    ->type(value: 'text')
                    ->placeholder('Grueso MM'),
                Select::make('destajeid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Destaje')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('longit')
                    ->title('Longit CM')
                    ->type(value: 'text')
                    ->placeholder('Longit MM'),
                /* ->rules('required|numeric|min:10|max:180') */
                // Añade las reglas de validación aquí,
            ]),
            // Fila 14
            Group::make([
                Select::make('porcendespunte')
                    ->options([
                        0 => '0%',
                        1 => '25%',
                        2 => '75%',
                        3 => '100%',
                    ])
                    ->title('Seleccione un % Despunte')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('rosca')
                    ->title('Rosca')
                    ->type(value: 'text')
                    ->placeholder('Rosca'),
                /* ->rules('required|numeric|min:10|max:180') */
                // Añade las reglas de validación aquí,
            ]),
            // Fila 15
            Group::make([
                TextArea::make('notas')
                    ->title('Notas')
                    ->rows(5)
                    ->width('100%'),  // Asegúrate de que el ancho sea el 100% del contenedor
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
            // Fila 1
            TD::make('code'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->code;
            }*/
            TD::make('description'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->description;
            }*/
            TD::make('abraztipoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abraztipoid;
            }*/
            // Fila 2
            TD::make('typeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->typeid;
            }*/
            TD::make('tipohojaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tipohojaid;
            }*/
            TD::make('abrazmasterid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazmasterid;
            }*/
            // Fila 3
            TD::make('vehiculoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            }*/
            TD::make('cortecm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->cortecm;
            }*/
            TD::make('abrazlongcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazlongcm;
            }*/
            // Fila 4
            TD::make('modelid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->modelid;
            }*/
            TD::make('distcccm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->distcccm;
            }*/
            TD::make('diatcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diatcid;
            }*/
            // Fila 5
            TD::make('apodo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->apodo;
            }*/
            TD::make('lccm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->lccm;
            }*/
            TD::make('tiposbujesid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tiposbujesid;
            }*/
            // Fila 6
            TD::make('yearid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->yearid;
            }*/
            TD::make('llcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->llcm;
            }*/
            TD::make('bujelcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujelcid;
            }*/
            // Fila 7
            TD::make('positionid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->positionid;
            }*/
            TD::make('roleolcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            }*/
            TD::make('bujellid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujellid;
            }*/
            // Fila 8
            TD::make('dlttrsid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->dlttrsid;
            }*/
            TD::make('roleollid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleollid;
            }*/
            TD::make('brioid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->brioid;
            }*/
            // Fila 9
            TD::make('identidad'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->identidad;
            }*/
            TD::make('2roleolc'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleolc;
            }*/
            TD::make('pesokg'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->pesokg;
            }*/
            // Fila 10
            TD::make('refauxid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->refauxid;
            }*/
            TD::make('2roleollllcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleollllcm;
            }*/
            TD::make('observacion'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->observacion;
            }*/
            // Fila 11
            TD::make('materialgrapaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialgrapaid;
            }*/
            TD::make('2porcenroleo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2porcenroleo;
            }*/
            // Fila 12
            TD::make('materialid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialid;
            }*/
            TD::make('diambocadoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diambocadoid;
            }*/
            // Fila 13
            TD::make('anchomm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchomm;
            }*/
            TD::make('anchoteid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchoteid;
            }*/
            // Fila 14
            TD::make('gruesomm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->gruesomm;
            }*/
            TD::make('destajeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            }*/
            // Fila 15
            TD::make('longit'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->longit;
            }*/
            TD::make('materialmadridid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialmadridid;
            }*/
            TD::make('ensamblajeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->ensamblajeid;
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
            Sight::make('code'),
            Sight::make('description'),
            Sight::make('abraztipoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abraztipoid;
            })*/
            // Fila 2
            Sight::make('typeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->typeid;
            })*/
            Sight::make('tipohojaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tipohojaid;
            })*/
            Sight::make('abrazmasterid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazmasterid;
            })*/
            // Fila 3
            Sight::make('vehiculoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            })*/
            Sight::make('cortecm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->cortecm;
            })*/
            Sight::make('abrazlongcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazlongcm;
            })*/
            // Fila 4
            Sight::make('modelid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->modelid;
            })*/
            Sight::make('distcccm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->distcccm;
            })*/
            Sight::make('diatcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diatcid;
            })*/
            // Fila 5
            Sight::make('apodo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->apodo;
            })*/
            Sight::make('lccm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->lccm;
            })*/
            Sight::make('tiposbujesid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tiposbujesid;
            })*/
            // Fila 6
            Sight::make('yearid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->yearid;
            })*/
            Sight::make('llcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->llcm;
            })*/
            Sight::make('bujelcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujelcid;
            })*/
            // Fila 7
            Sight::make('positionid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->positionid;
            })*/
            Sight::make('roleolcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            })*/
            Sight::make('bujellid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujellid;
            })*/
            // Fila 8
            Sight::make('dlttrsid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->dlttrsid;
            })*/
            Sight::make('roleollid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleollid;
            })*/
            Sight::make('brioid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->brioid;
            })*/
            // Fila 9
            Sight::make('identidad'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->identidad;
            })*/
            Sight::make('2roleolc'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleolc;
            })*/
            Sight::make('pesokg'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->pesokg;
            })*/
            // Fila 10
            Sight::make('refauxid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->refauxid;
            })*/
            Sight::make('2roleollllcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleollllcm;
            })*/
            Sight::make('observacion'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->observacion;
            })*/
            // Fila 11
            Sight::make('materialgrapaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialgrapaid;
            })*/
            Sight::make('2porcenroleo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2porcenroleo;
            })*/
            // Fila 12
            Sight::make('materialid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialid;
            })*/
            Sight::make('diambocadoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diambocadoid;
            })*/
            // Fila 13
            Sight::make('anchomm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchomm;
            })*/
            Sight::make('anchoteid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchoteid;
            })*/
            // Fila 14
            Sight::make('gruesomm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->gruesomm;
            })*/
            Sight::make('destajeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            })*/
            // Fila 15
            Sight::make('longit'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->longit;
            })*/
            Sight::make('porcendespunte'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->porcendespunte;
            })*/
            Sight::make('notas'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->notas;
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
}
