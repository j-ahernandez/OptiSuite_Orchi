<?php
namespace App\Orchid\Components;

use Orchid\Screen\Field;

class ImagePreview extends Field
{
    protected $view = 'components.image-preview';

    public function __construct()
    {
        $this->addBeforeRender(function () {
            $this->set('imageUrl', '');  // Inicialmente vacío
            $this->set('title', '');  // Inicialmente vacío
        });
    }

    public function setImageUrl($url)
    {
        $this->set('imageUrl', $url);
        return $this;
    }

    public function title($title)
    {
        $this->set('title', $title);
        return $this;
    }

    public function render()
    {
        return view($this->view, [
            'imageUrl' => $this->get('imageUrl'),
            'title' => $this->get('title'),
        ])->render();
    }
}
