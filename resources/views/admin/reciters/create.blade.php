@extends('layouts.admin')
@section('page')
reciters
@endsection
@section('title')
Add Reciter
@endsection
@section('content')

<main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Add Reciter
            </h2>
            @if(Session::has('success'))
            <div
              class="flex items-center justify-between px-4 p-2 mb-8 text-sm font-semibold text-green-600 bg-green-100 rounded-lg focus:outline-none focus:shadow-outline-purple"
            >
              <div class="flex items-center">
                <i class="fas fa-check mr-2"></i>
                <span>{{ Session::get('success') }}</span>
              </div>
            </div>
            @endif
            @if(Session::has('error'))
            <div
              class="flex items-center justify-between px-4 p-2 mb-8 text-sm font-semibold text-red-600 bg-red-100 rounded-lg focus:outline-none focus:shadow-outline-purple"
            >
              <div class="flex items-center">
                <i class="fas fa-check mr-2"></i>
                <span>{{ Session::get('error') }}</span>
              </div>
            </div>
            @endif
            <!-- General elements -->
            <form method="POST" enctype="multipart/form-data"
              @if (isset($reciter))
                action="{{ route('admin.reciters.update', $reciter->id) }}"
              @else
                action="{{ route('admin.reciters.store') }}"
              @endif
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
            <span class="text-red-500 text-sm">* Is required</span>
            @if (isset($reciter))
              @method('PUT')
            @endif
            @csrf
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-red-500">:message</div>')) !!}
            @endif
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Name Arabic <span class="text-red-500">*</span>
                </span>
                <input
                value="{{ old('name')??@$reciter->name }}"
                type="text"
                name="name"
                    required
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="ناصر القطامي"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Name English <span class="text-red-500">*</span>
                </span>
                <input
                value="{{ old('name_en')??@$reciter->name_en }}"
                type="text"
                name="name_en"
                id="name_en"
                    required
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Nasser Al Qatami"
                />
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Slug <span class="text-red-500">*</span> (Only letters and numbers) 
                <p class="text-sm">
                  This will be used in the URL for the reciter page. For example: https://way2quran.com/reciter/naser-al-qatami
                </p>
                </span>
                <input
                value="{{ old('slug')??@$reciter->slug }}"
                type="text"
                name="slug"
                id="slug"
                    required
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="naser-al-qatami"
                />
              </label>

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Bio Arabic 
                </span>
                <textarea
                type="text"
                name="bio"
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                >{{ old('bio')??@$reciter->bio }}</textarea>
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Bio English 
                </span>
                <textarea
                type="text"
                name="bio_en"
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                >{{ old('bio_en')??@$reciter->bio_en }}</textarea>
              </label>
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Image/Icon <span class="text-red-500">*</span> (PNG/JPG)
                </span>
                <input
                type="file"
                accept="image/png, image/jpeg"
                name="image"
                    required
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>
              @isset($reciter)
                <img src="{{ asset($reciter->image) }}" alt="" class="w-32 h-32 object-cover mt-2">
                <input type="hidden" name="old_image" value="{{ $reciter->image }}">
              @endisset
              <button type="submit" class="table items-center mt-4 justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                @isset($reciter)
                  Update Reciter
                @else
                  Add Reciter
                @endisset
              <span class="ml-2" aria-hidden="true">
                  <i class='las la-arrow-right'></i>
              </span>
            </button>
        </form>

          </div>
        </main>
        {{-- script to generate slug from name_en --}}
        <script>
          var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
          }
          var name_en = document.getElementById('name_en');
          var slug_input = document.getElementById('slug');
          name_en.addEventListener('keyup', function() {
            slug_input.value = slug(name_en.value);
          });
        </script>
@endsection
