<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Builds an Input element with Label and Error Handling
     * @param string $name
     * @param string $label
     * @param string $type DEFAULT 'text'
     * @param ?string $id will default to $name if null
     * @param ?string $model will default to $name if null
     */
    public function __construct(
        public string $name,
        public string $label,
        public string $type = 'text',
        public ?string $id = null,
        public ?string $model = null,
    ) {
        $this->id ??= $this->name;
        $this->model ??= $this->name;
    }

    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
