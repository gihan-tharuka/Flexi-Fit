@extends('backend.layout.app')
@section('content')

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
    Products table
</h4>

<a href="{{ route('products.create') }}"
   style="display: block; max-width: 150px; width: 100%; margin: 20px auto; border-radius: 0.375rem; background-color: #4f46e5; padding: 0.5rem 0.75rem; text-align: center; font-size: 0.875rem; font-weight: 600; color: #ffffff; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); text-decoration: none; float: right;"
   onmouseover="this.style.backgroundColor='#4338ca'"
   onfocus="this.style.outline='2px solid #4f46e5'; this.style.outlineOffset='2px'"
   onblur="this.style.outline='none'">
    Create Product
</a>


<div class="w-full overflow-hidden rounded-lg shadow-xs">

    <div class="w-full overflow-x-auto">

        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Slug</th>
                <th class="px-4 py-3">Description</th>
                <th class="px-4 py-3">Price</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($products as $recipe)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                    {{$recipe->id}}
                </td>
                <td class="px-4 py-3 text-sm">
                    {!! strip_tags(Str::substr($recipe->name,0,20)) !!} ...
                </td>
                <td class="px-4 py-3 text-sm">
                    {!! strip_tags(Str::substr($recipe->slug,0,20)) !!} ...
                </td>
                <td class="px-4 py-3 text-sm">
                    {!! strip_tags(Str::substr($recipe->description,0,20)) !!} ...
                </td>
                <td class="px-4 py-3 text-sm">
                    {{$recipe->price}}
                </td>
                <td class="px-4 py-3 text-xs">
                        <span
                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                        >
                          Approved
                        </span>
                </td>
                <td class="px-4 py-3 text-sm">
                    6/10/2020
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                       <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"  href="{{ route('products.edit', $recipe->id) }}">
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
                            action="{{ route('products.destroy', $recipe->id) }}"
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

        <span class="col-span-2"></span>

    </div>
    {{ $products->links() }}
</div>
@endsection
