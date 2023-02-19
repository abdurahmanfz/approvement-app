<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Approvement App - User') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <div class="flex justify-end">
            <x-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')">
              <x-primary-button class="ml-3">
                {{ __('Add New User') }}
              </x-primary-button>
            </x-nav-link>
          </div>


          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-4">
            <thead class="text-md text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th class="px-2 py-4">Username</th>
                <th class="px-2 py-4">Full name</th>
                <th class="px-2 py-4">Role</th>
                <th class="px-2 py-4" width="20%">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($users as $user)
              <tr>
                <td class="px-2">
                  {{$user->username}}
                </td>
                <td class="px-2">
                  {{$user->fullname}}
                </td>
                <td class="px-2">
                  {{$user->role}}
                </td>
                <td class="py-4 px-6">
                  <form onsubmit="return confirm('Are you sure? This action cannot be undone.');" action="{{ route('user.destroy', $user->id) }}" method="POST">
                    <a href="{{ route('user.edit', $user->id) }}">
                      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        <span class="sr-only">Edit</span>
                      </button>
                    </a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-2 text-red-700 border border-red-700 hover:bg-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:focus:ring-red-800">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                      </svg>

                      <span class="sr-only">Delete</span>
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="3">Users not found.</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>