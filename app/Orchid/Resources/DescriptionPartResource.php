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
            // Fila 0
            Group::make([
                Input::make('code')
                    ->title('Código')
                    ->type(value: 'text')
                    ->placeholder('Código')
                    ->autofocus(),
            ]),
            // Fila 1
            Group::make([
                Select::make('typeid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('vehiculoid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Vehíulo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('modelid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Modelo')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 2
            Group::make([
                Input::make('apodo')
                    ->title('Apodo')
                    ->type(value: 'text')
                    ->placeholder('Apodo'),
                Select::make('yearid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un año')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('positionid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una posición')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 3
            Group::make([
                Select::make('dlttrsid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Dlt/Trs')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('identidad')
                    ->title('Identidad')
                    ->type(value: 'text')
                    ->placeholder('Identidad')
                    ->attributes(['maxlength' => '4']),
                Select::make('refauxid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Ref/Aux')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 4
            Group::make([
                Select::make('materialgrapaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Material Grapa')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('materialid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Material')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('anchomm')
                    ->title('Ancho MM')
                    ->type(value: 'text')
                    ->placeholder('Ancho MM'),
            ]),
            // Fila 5
            Group::make([
                Input::make('gruesomm')
                    ->title('Grueso MM')
                    ->type(value: 'text')
                    ->placeholder('Grueso MM'),
                Input::make('longit')
                    ->title('Longit CM')
                    ->type(value: 'text')
                    ->placeholder('Longit MM'),
                /* ->rules('required|numeric|min:10|max:180') */
                // Añade las reglas de validación aquí,
                Input::make('description')
                    ->title('Descripción')
                    ->type(value: 'text')
                    ->placeholder('Descripción'),
            ]),
            // Fila 6
            Group::make([
                Select::make('tipohojaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo de Hoja')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('cortecm')
                    ->title('Corte Cm')
                    ->type(value: 'text')
                    ->placeholder('Corte CM'),
                Input::make('distcccm')
                    ->title('Distcc CM')
                    ->type(value: 'text')
                    ->placeholder('Distcc CM'),
            ]),
            // Fila 7
            Group::make([
                Input::make('lccm')
                    ->title('LC CM')
                    ->type(value: 'text')
                    ->placeholder('LC CM'),
                Input::make('llcm')
                    ->title('LL CM')
                    ->type(value: 'text')
                    ->placeholder('LL CM'),
                Select::make('roleolcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Roleo LC')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 8
            Group::make([
                Select::make('roleollid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Roleo LL')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('2roleolc')
                    ->title('2Roleo LC')
                    ->type(value: 'text')
                    ->placeholder('2Roleo LC'),
                Input::make(name: '2roleollllcm')
                    ->title('2Roleo LL')
                    ->type(value: 'text')
                    ->placeholder('2Roleo LL'),
            ]),
            // Fila 9
            Group::make([
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
                Select::make('diambocadoid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Diam Bocado')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('anchoteid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Ancho TE')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 10
            Group::make([
                Select::make('destajeid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Destaje')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
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
            // Fila 11
            Group::make([
                Select::make('abrazmasterid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Abraz Master')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('abrazlongcm')
                    ->title('Abraz Long CM')
                    ->type(value: 'text')
                    ->placeholder('Abraz Long CM'),
                Select::make('diatcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un DiaTc')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 12
            Group::make([
                Select::make('tiposbujesid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Tipo de Buje')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('bujelcid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Buje LC')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Select::make('bujellid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Buje LL')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 13
            Group::make([
                Select::make('brioid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione un Brio CM')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
                Input::make('pesokg')
                    ->title('Peso KG')
                    ->type(value: 'text')
                    ->placeholder('Peso KG'),
            ]),
            // Fila 14
            Group::make([
                Select::make('roscaid')
                    // ->fromModel(\App\Models\Vehiculo::class, 'descripcionvehiculo', 'id') // Usar el modelo Vehiculo
                    ->title('Seleccione una Rosca')
                    ->empty('')  // Mensaje si no hay opciones disponibles
                    ->searchable(),  // Hacer que el select sea "searchable"
            ]),
            // Fila 15
            Group::make([
                TextArea::make('observacion')
                    ->title('Observación')
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
            TD::make('code')
                ->sort()
                ->filter(Input::make()),
            TD::make('typeid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            }*/
            TD::make('vehiculoid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            }*/
            TD::make('modelid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->modelid;
            }*/
            TD::make('apodo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->apodo;
            }*/
            TD::make('yearid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->yearid;
            }*/
            TD::make('positionid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->positionid;
            }*/
            TD::make('dlttrsid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->dlttrsid;
            }*/
            TD::make('identidad')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->identidad;
            }*/
            TD::make('refauxid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->refauxid;
            }*/
            TD::make('materialgrapaid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialgrapaid;
            }*/
            TD::make('anchomm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchomm;
            }*/
            TD::make('gruesomm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->gruesomm;
            }*/
            TD::make('longit')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->longit;
            }*/
            TD::make('description')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->description;
            }*/
            TD::make('tipohojaid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tipohojaid;
            }*/
            TD::make('cortecm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->cortecm;
            }*/
            TD::make('distcccm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->distcccm;
            }*/
            TD::make('lccm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->lccm;
            }*/
            TD::make('llcm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->llcm;
            }*/
            TD::make('roleolcid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            }*/
            TD::make('roleollid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleollid;
            }*/
            TD::make('2roleolc')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleolc;
            }*/
            TD::make('2roleoll')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleollllcm;
            }*/
            TD::make('2porcenroleo')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2porcenroleo;
            }*/
            TD::make('diambocadoid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diambocadoid;
            }*/
            TD::make('anchoteid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchoteid;
            }*/
            TD::make('destajeid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            }*/
            TD::make('porcendespunte')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            }*/
            TD::make('abraztipoid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abraztipoid;
            }*/
            TD::make('abrazmasterid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazmasterid;
            }*/
            TD::make('abrazlongcm')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazlongcm;
            }*/
            TD::make('diatcid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diatcid;
            }*/
            TD::make('tiposbujesid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tiposbujesid;
            }*/
            TD::make('bujelcid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujelcid;
            }*/
            TD::make('bujellid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujellid;
            }*/
            TD::make('brioid')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->brioid;
            }*/
            TD::make('pesokg')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->pesokg;
            }*/
            TD::make('observacion')
                ->sort()
                ->filter(Input::make()),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->observacion;
            }*/
            TD::make('rosca')
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
            Sight::make('code'),
            Sight::make('typeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->typeid;
            })*/
            Sight::make('vehiculoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->vehiculoid;
            })*/
            Sight::make('modelid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->modelid;
            })*/
            Sight::make('apodo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->apodo;
            })*/
            Sight::make('yearid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->yearid;
            })*/
            Sight::make('positionid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->positionid;
            })*/
            Sight::make('dlttrsid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->dlttrsid;
            })*/
            Sight::make('identidad'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->identidad;
            })*/
            Sight::make('refauxid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->refauxid;
            })*/
            Sight::make('materialgrapaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialgrapaid;
            })*/
            Sight::make('materialid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->materialid;
            })*/
            Sight::make('anchomm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchomm;
            })*/
            Sight::make('gruesomm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->gruesomm;
            })*/
            Sight::make('longit'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->longit;
            })*/
            Sight::make('description'),
            Sight::make('tipohojaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tipohojaid;
            })*/
            Sight::make('cortecm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->cortecm;
            })*/
            Sight::make('distcccm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->distcccm;
            })*/
            Sight::make('lccm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->lccm;
            })*/
            Sight::make('llcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->llcm;
            })*/
            Sight::make('roleolcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roleolcid;
            })*/
            Sight::make('2roleolc'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleolc;
            })*/
            Sight::make('2roleoll'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2roleollllcm;
            })*/
            Sight::make('2porcenroleo'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->2porcenroleo;
            })*/
            Sight::make('diambocadoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diambocadoid;
            })*/
            Sight::make('anchoteid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->anchoteid;
            })*/
            Sight::make('destajeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->destajeid;
            })*/
            Sight::make('porcendespunte'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->porcendespunte;
            })*/
            Sight::make('abraztipoid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abraztipoid;
            })*/
            Sight::make('abrazmasterid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazmasterid;
            })*/
            Sight::make('abrazlongcm'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->abrazlongcm;
            })*/
            Sight::make('diatcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->diatcid;
            })*/
            Sight::make('tiposbujesid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->tiposbujesid;
            })*/
            Sight::make('bujelcid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujelcid;
            })*/
            Sight::make('bujellid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->bujellid;
            })*/
            Sight::make('brioid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->brioid;
            })*/
            Sight::make('pesokg'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->pesokg;
            })*/
            Sight::make('observacion'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->observacion;
            })*/
            Sight::make('roscaid'),
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
}
