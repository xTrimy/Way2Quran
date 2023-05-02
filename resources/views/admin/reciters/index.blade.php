@extends('layouts.admin')
@section('page')
reciters
@endsection
@section('title')
Reciters
@endsection
@section('content')
        <main class="h-full pb-16 overflow-y-auto">
          <div class="container grid px-6 mx-auto">
            <div class="flex justify-between items-center">
                <h2
                class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
                >
                Reciters
                </h2>
                <a href="{{ route('admin.reciters.create') }}">
                    <button class="bg-purple-600 text-white py-2 px-8 rounded-md">
                        Add Reciter
                    </button>
                </a>
            </div>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap" id="images">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Reciter</th>
                      <th class="px-4 py-3">Slug</th>
                      <th class="px-4 py-3">Bio</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    @foreach ($reciters as $reciter)
                        
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="{{ asset($reciter->image) }}"
                              alt="{{ $reciter->name }}"
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">{{ $reciter->name }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                              {{ $reciter->name_en }}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-2 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold">{{ $reciter->slug }}</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-2 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold" title="{{ $reciter->bio }}">{{ Str::limit($reciter->bio, 25, '...') }}</p>
                            <p class="font-semibold" title="{{ $reciter->bio_en }}">{{ Str::limit($reciter->bio_en, 25, '...') }}</p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        <a href="{{ route('admin.reciters.edit',$reciter->id) }}">
                            <div class="bg-transparent inline-block hover:bg-slate-200 dark:hover:bg-slate-700 dark:text-green-500 text-green-600 py-2 px-2 rounded-md">
                                <i class="las la-pen text-xl"></i>
                            </div>
                        </a>
                        <a href="">
                            <div class="bg-transparent inline-block hover:bg-slate-200 dark:hover:bg-slate-700 text-red-500 py-2 px-2 rounded-md">
                                <i class="las la-trash-alt text-xl"></i>
                            </div>
                        </a>
                        <a href="{{ route('admin.reciters.show', $reciter->id) }}">
                            <div class="bg-transparent inline-block hover:bg-slate-200 dark:hover:bg-slate-700 text-purple-500 py-2 px-2 rounded-md">
                                <i class="las la-eye text-xl"></i>
                            </div>
                        </a>
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            <div class="mt-4">
             {{$reciters->links('pagination::tailwind')}}
            </div>
          </div>
        </main>

@endsection