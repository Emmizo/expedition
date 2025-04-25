<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Users') }}
            </h2>
            <div>
                <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'add-user')"
                >{{ __('Add User') }}</x-primary-button>
                <x-primary-button
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'import-user')"
                >{{ __('Import User') }}</x-primary-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Roles
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $user->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- Display roles assigned to the user --}}
                                            {{ $user->getRoleNames()->implode(', ') }}
                                        </td>
                                        <td class="px-6 py-4 flex space-x-2">
                                            {{-- Edit Link/Button --}}
                                            <a href="" class="font-medium text-blue-600 hover:underline">Edit</a>

                                            {{-- Delete Button/Form --}}
                                            <form method="POST" action="" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b">
                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                            No users found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- Pagination Links --}}
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add User Modal --}}
    <x-modal name="add-user" focusable>
        <form method="post" action="" class="p-6">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Add New User') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Enter the details for the new user.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="name" value="{{ __('Name') }}" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->userCreation->get('name')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="email" value="{{ __('Email') }}" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required />
                <x-input-error :messages="$errors->userCreation->get('email')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->userCreation->get('password')" class="mt-2" />
            </div>

            <div class="mt-6">
                <x-input-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->userCreation->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Add Role Selection --}}
            <div class="mt-6">
                <x-input-label for="roles" value="{{ __('Roles') }}" />
                {{-- Assuming $roles is passed to the view --}}
                @if(isset($roles) && $roles->count() > 0)
                    @foreach ($roles as $role)
                        <div class="flex items-center mt-2">
                            <input type="checkbox" name="roles[]" id="role_{{ $role->id }}" value="{{ $role->name }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="role_{{ $role->id }}" class="ml-2 block text-sm text-gray-900">{{ $role->name }}</label>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-500">No roles available.</p>
                @endif
                 <x-input-error :messages="$errors->userCreation->get('roles')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Add User') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

    {{-- Import User Modal --}}
    <x-modal name="import-user" focusable>
        <form method="post" action="" class="p-6" enctype="multipart/form-data">
            @csrf

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Import Users') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Upload a CSV file containing user data (Name, Email, Role). The password will be automatically generated and an email will be sent.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="user_import_file" value="{{ __('CSV File') }}" />
                <input id="user_import_file" name="user_import_file" type="file" class="mt-1 block w-full" required accept=".csv">
                <x-input-error :messages="$errors->userImport->get('user_import_file')" class="mt-2" />
            </div>

             {{-- Add Role Selection for Imported Users --}}
            <div class="mt-6">
                <x-input-label for="import_roles" value="{{ __('Assign Roles to Imported Users') }}" />
                {{-- Assuming $roles is passed to the view --}}
                @if(isset($roles) && $roles->count() > 0)
                    @foreach ($roles as $role)
                        <div class="flex items-center mt-2">
                            <input type="checkbox" name="import_roles[]" id="import_role_{{ $role->id }}" value="{{ $role->name }}" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="import_role_{{ $role->id }}" class="ml-2 block text-sm text-gray-900">{{ $role->name }}</label>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-500">No roles available.</p>
                @endif
                 <x-input-error :messages="$errors->userImport->get('import_roles')" class="mt-2" />
            </div>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('Import Users') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
