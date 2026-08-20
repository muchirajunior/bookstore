<?php

use Livewire\Component;

new class extends Component
{
    
    public $name = 'Junior';
};
?>

<div>
    <header class="w-full flex justify-between">
        <span>
            <h2 class="text-xl font-bold">Hello, {{ $this->name }}</h2>
            <p class="text-gray-300">Here is a list of all books</p>
        </span>

        <form wire:submit='$refresh'>
            <span class="mr-2">Name</span>
            <input class="border border-gray-200 rounded-lg px-2 py-1" wire:model.live.debounce.500ms='name' type="text">
        </form>
    </header>
</div>