<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Approvement App - Update User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('forms.user-form', ['type' => 'update'])
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>