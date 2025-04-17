<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(
        public string $type = 'text',
        public string $name,
        public ?string $id = null,
        public ?string $model = null,
        public string $label
    ) {
        $this->id ??= $this->name;
        $this->model ??= $this->name;

    }

    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
