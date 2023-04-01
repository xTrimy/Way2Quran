<form wire:submit.prevent="save"
              class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
            >
                @if(!$success)
            <span class="text-red-500 text-sm">* Is required</span>
            @csrf
            @if($errors->any())
                {!! implode('', $errors->all('<div class="text-red-500">:message</div>')) !!}
            @endif
             

              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Recitation(s) <span class="text-red-500">*</span> (MP3)
                </span>
                <input
                type="file" wire:model="audio" multiple
                  class="block w-full mt-1 text-sm border dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                />
              </label>
                  @if( $progress )
                      <progress class="w-full" max=100 wire:model="progress" > {{ $progress }} </progress>
                  @endif
              
              <div class=" space-y-5 mt-5">
                @foreach ($success_uploads as $aud)
                <div class="flex w-full items-center justify-between">
                    <div>
                        <audio controls>
                            <source src="{{ $aud->temporaryUrl() }}" type="audio/mpeg">
                        </audio>
                    </div>
                    <div>
                        <p class="text-green-600 dark:text-green-400">
                            {{ $aud->getClientOriginalName() }} <i class="mx-2 las la-check text-lg"></i>
                        </p>
                    </div>
                  
                </div>
              @endforeach
                @foreach ($audio as $aud)
                <div class="flex w-full items-center justify-between">
                    <div>
                        <audio controls>
                            <source src="{{ $aud->temporaryUrl() }}" type="audio/mpeg">
                        </audio>
                    </div>
                    <div>
                        <p class="text-gray-700 dark:text-gray-400">
                            {{ $aud->getClientOriginalName() }}
                        </p>
                    </div>
                    <div>
                        <button type="button" wire:click="remove({{ $loop->index }})" class="text-red-500">
                            <i class="las la-trash"></i>
                        </button>
                    </div>
                </div>
              @endforeach
              </div>
              <button type="submit" 
              @if($upload_finished == false) disabled @endif
               class="table disabled:cursor-not-allowed disabled:bg-gray-500 items-center mt-4 justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Save Recitations
              <span class="ml-2" aria-hidden="true">
                  <i class='las la-arrow-right'></i>
              </span>
            </button>
            @else
             <div class="flex items-center justify-center flex-col w-full py-32">
              <i class="las la-check text-5xl text-green-500"></i>
                <p class="text-green-500">
                  Files uploaded successfully!
                </p>
             </div>
              @endif
               <script>
                window.addEventListener('livewire-upload-progress', event => {
                    @this.set( 'progress', event.detail.progress );
                });
                </script>
        </form>

  