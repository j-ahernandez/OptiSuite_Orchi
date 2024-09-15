<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
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
        return [];
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
            TD::make('moldeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->moldeid;
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
            TD::make('formaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->formaid;
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
            TD::make('interiorid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->interiorid;
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
            TD::make('roscaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roscaid;
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
            Sight::make('moldeid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->moldeid;
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
            Sight::make('formaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->formaid;
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
            Sight::make('interiorid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->interiorid;
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
            Sight::make('roscaid'),
            /*->render(function ($model) {
                // Aquí puedes personalizar cómo mostrar el valor
                return $model->roscaid;
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
