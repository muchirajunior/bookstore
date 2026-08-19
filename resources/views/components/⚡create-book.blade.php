<?php

use Livewire\Component;

new class extends Component
{
    public $showModal = false;

    public function openModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }
};
?>

<div>
    <!-- Modal Trigger Button -->
    <button 
        wire:click="openModal" 
        class="hover:text-blue-300 transition-colors"
    >
    Create Book
    </button>

    <!-- Modal Overlay -->
    @if ($showModal)
        <div class="fixed inset-0 backdrop-blur-sm  flex items-center justify-center z-50">
            <!-- Modal Container -->
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-md mx-4 p-6 transform transition-all">
                <!-- Modal Header -->
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold text-gray-900">Create Book</h3>
                    <button 
                        wire:click="closeModal" 
                        class="text-gray-400 hover:text-gray-600 transition-colors"
                    >
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="mb-6">
                    <p class="text-gray-600">You must be the change you wish to see in the world. - Mahatma Gandhi</p>
                </div>

                <!-- Modal Footer -->
                <div class="flex justify-between gap-3 ">
                    <button 
                        wire:click="closeModal" 
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                    >
                        Cancel
                    </button>
                    <button 
                        wire:click="confirmAction" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
                    >
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>