{{--<x-app-layout>--}}
{{--    <div class="container mx-auto mt-1">--}}
{{--        <div class="px-4 sm:px-6 lg:px-8 bg-white pt-4">--}}

{{--            @if (session('success'))--}}
{{--                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5"--}}
{{--                    role="alert">--}}
{{--                    <strong class="font-bold">Success!</strong>--}}
{{--                    <span class="block sm:inline">{{ session('success') }}</span>--}}
{{--                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">--}}
{{--                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"--}}
{{--                            viewBox="0 0 20 20">--}}
{{--                            <title>Close</title>--}}
{{--                            <path--}}
{{--                                d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z"--}}
{{--                                clip-rule="evenodd" fill-rule="evenodd"></path>--}}
{{--                        </svg>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="sm:flex sm:items-center">--}}
{{--                <div class="sm:flex-auto">--}}
{{--                    <h1 class="text-base font-semibold leading-6 text-gray-900">Users</h1>--}}
{{--                    <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name,--}}
{{--                        title, email and role.</p>--}}
{{--                </div>--}}
{{--                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">--}}
{{--                    <a href="{{ route('user.create') }}"--}}
{{--                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">--}}
{{--                        Create User--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="mt-8 flow-root">--}}
{{--                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">--}}
{{--                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">--}}
{{--                        <table class="min-w-full divide-y divide-gray-300">--}}
{{--                            <thead>--}}
{{--                                <tr>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">--}}
{{--                                        ID--}}
{{--                                    </th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">--}}
{{--                                        Name</th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">--}}
{{--                                        Email</th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">--}}
{{--                                        Role</th>--}}
{{--                                    <th scope="col"--}}
{{--                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">--}}
{{--                                        Actions</th>--}}
{{--                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">--}}
{{--                                        <span class="sr-only">Edit</span>--}}
{{--                                    </th>--}}
{{--                                </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="divide-y divide-gray-200">--}}
{{--                                @foreach ($users as $user)--}}
{{--                                    <tr>--}}
{{--                                        <td--}}
{{--                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">--}}
{{--                                            {{ $user->id }}</td>--}}
{{--                                        <td--}}
{{--                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">--}}
{{--                                            {{ $user->name }}</td>--}}
{{--                                        <td--}}
{{--                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">--}}
{{--                                            {{ $user->email }}</td>--}}
{{--                                        <td--}}
{{--                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">--}}
{{--                                            {{ ucwords(str_replace('_', ' ', Str::snake($user->role->name))) }}</td>--}}
{{--                                        <td--}}
{{--                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">--}}
{{--                                            <div class="flex gap-3">--}}

{{--                                                <a href="{{ route('user.edit', $user->id) }}"--}}
{{--                                                    class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Edit</a>--}}
{{--                                                <form--}}
{{--                                                    action="{{ route('user.destroy', $user->id) }}"--}}
{{--                                                    method="POST">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('DELETE')--}}
{{--                                                    <button type="submit" class="rounded bg-white px-2 py-1 text-xs font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Delete</button>--}}
{{--                                                </form>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}

{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        {{ $users->links() }}--}}
{{--    </div>--}}
{{--</x-app-layout>--}}


@extends('backend.layout.app')
@section('content')



    <div class="px-4 sm:px-6 lg:px-8 bg-white pt-4">
@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-5"
         role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 20 20">
                            <title>Close</title>
                            <path
                                d="M14.348 5.652a.5.5 0 010 .707L9.707 10l4.641 4.641a.5.5 0 11-.707.707L9 10.707l-4.641 4.641a.5.5 0 11-.707-.707L8.293 10 3.652 5.359a.5.5 0 01.707-.707L9 9.293l4.641-4.641a.5.5 0 01.707 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </span>
    </div>
@endif
<h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
>
    User table
</h4>
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Role</th>
                <th class="px-4 py-3">Email</th>

                <th class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($users as $user)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        {{$user->id}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$user->name}}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{$user->role->name}}
                    </td>

                    <td class="px-4 py-3 text-sm">
                        {{$user->email}}
                    </td>


                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"  href="{{ route('user.edit', $user->id) }}">
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    ></path>
                                </svg>
                            </a>
                            <form
                                action="{{ route('user.destroy', $user->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                    aria-label="Delete"
                                >
                                    <svg
                                        class="w-5 h-5"
                                        aria-hidden="true"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
    <div
        class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
    >
                <span class="flex items-center col-span-3">
                  Showing 21-30 of 100
                </span>
        <span class="col-span-2"></span>

    </div>
</div>
    {{ $users->links() }}
    </div>
@endsection

