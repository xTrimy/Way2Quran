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
                {{ $reciter->name }} - {{ $reciter->name_en }} Recitations
                </h2>
                <a href="{{ route('admin.reciters.upload',$reciter->id) }}">
                    <button class="bg-purple-600 text-white py-2 px-8 rounded-md">
                        Upload Recitations
                    </button>
                </a>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
              Surahs
            </h3>
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap" id="images">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Surah Order</th>
                      <th class="px-4 py-3">Surah</th>
                      <th class="px-4 py-3">Availability</th>
                      <th class="px-4 py-3">Actions</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                    @foreach ($surahs as $surah)
                    @php
                      $available = $reciter->surah_audio()->where('surah_id',$surah->id)->exists();
                    @endphp
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-2 py-3">
                            <p class="font-semibold">
                                {{ $surah->surah_order }}
                            </p>
                      </td>
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold">{{ $surah->name }}</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                              {{ $surah->name_en }}
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-2 py-3">
                        <div class="flex items-center text-sm">
                          <div>
                            <p class="font-semibold">
                              @if($available)
                                <div class="bg-green-600 borderinline-block text-white py-1 px-2 rounded-full text-xs">
                                  Available
                                </div>
                              @else
                                Not Available
                              @endif
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3">
                        @if($available)
                          <a href="">
                              <div class="bg-transparent inline-block hover:bg-slate-200 dark:hover:bg-slate-700 text-red-500 py-2 px-2 rounded-md">
                                  <i class="las la-trash-alt text-xl"></i>
                              </div>
                          </a>
                        @endif
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            {{-- <div class="mt-4">
             {{$reciters->links('pagination::tailwind')}}
            </div> --}}
          </div>
        </main>

@endsection