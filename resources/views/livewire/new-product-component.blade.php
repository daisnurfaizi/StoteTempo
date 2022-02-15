
<div
      class="relative flex flex-col min-w-0 break-words w-full mb-6 -mt-10 shadow-lg rounded bg-white"
    >
<div class="rounded-t mb-0 px-4 py-3 border-0">
  <div class="flex flex-wrap items-center">
    <div
      class="relative w-full px-4 max-w-full flex-grow flex-1"
    >
      <h3 class="font-semibold text-lg text-blueGray-700">
        Input Produk
        @if (session()->has('message'))
        <div class="flex items-center bg-teal-500 text-white text-sm font-bold px-4 py-3" role="alert">
          <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
          <p>{{ session('message') }}.</p>
        </div>    
        @endif 
        
      </h3>
    </div>
  </div>
</div>

<form class="relative m-auto mb-4 w-full max-w-lg" action="{{ route('create.product') }}" method="POST">
  @csrf
  <div class="flex flex-wrap -mx-3 mb-2">
    <div class="md:w-1/2 px-3 md:mb-0">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nama Produk
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
      border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" wire:model="product_name" name="product_name" type="text" value="{{ old('product_name') }}" placeholder="Nama Produk">
      @error('product_name')
      <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
      @enderror
      {{-- <p class="text-red-500 mb-4 text-xs italic">Please fill out this field.</p> --}}
    </div>
    <div class="md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
        Kategori
      </label>
      <select class="appearance-none inlib w-full  @error('category_id')
      border-red-500 @enderror bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="category_id" name="category_id">
      <option value="">--Pilih--</option>
      @foreach ($category as $category)
      <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->Category_name }}</option>
      @endforeach
      </select>
      @error('category_id')
      <p class="text-red-500 mb-4 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <div class="px-3">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-password">
        Vendor
      </label>
      <select class="appearance-none inlib w-full bg-gray-200 text-gray-700 border  @error('vendor_id')
      border-red-500 @enderror border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="vendor_id" name="vendor_id">
        <option value="">--Pilih--</option>
        @foreach ($vendor as $vendor)
      <option value="{{ $vendor->id }}"{{ old('vendor_id') == $vendor->id ? 'selected' : '' }}>{{ $vendor->vendor_name }}</option>
      @endforeach
      </select>
      @error('vendor_id')
      <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
      @enderror
      <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
    </div>
    <div class="md:w-1/3 mt-6 px-3 mb-6 md:mb-0">
      {{-- <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="Albuquerque"> --}}
      <button type="button" class="appearance-none block w-full bg-pink-500 text-white font-bold text-lg rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500" wire:click.prevent="add({{ $i }})">+</button>
    </div>
  </div>
  <div id="items" class="mt-4">
    <div class="flex flex-wrap -mx-3 mb-2">
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-state">
          Warna
        </label>
        <div class="relative">
          <input class="appearance-none block w-full bg-gray-200 text-blueGray-700border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" wire:model="color.0" name="color[]" placeholder="90210">
        </div>
        @error('color.0')
        <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
        @enderror
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Ukuran
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="size.0" name="size[]" type="text" placeholder="90210">
        @error('size.0')
        <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
        @enderror  
    </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0 mt-8">
        <label  class="removeitem bg-pink-500 font-bold font-lg rounded mt-6 px-4 py-2 text-white font-lg" >-<label>
      </div> 
    </div>
  </div>
  @foreach ($inputs as $key=>$value)
  <div id="items" class="mt-4">
    <div class="flex flex-wrap -mx-3 mb-2">
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-state">
          Warna
        </label>
        <div class="relative">
          <input class="appearance-none block w-full bg-gray-200 text-blueGray-700border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" wire:model="color.{{ $value }}" name="color[]" placeholder="90210">
        </div>
        @error('color.*')
        <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
        @enderror
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Ukuran
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="size.{{ $value }}" type="text" name="size[]" placeholder="90210">
        @error('size.*')
        <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
        @enderror
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0 mt-0">
        <button  class="removeitem bg-pink-500 font-bold font-lg rounded mt-6 px-4 py-2 text-white font-lg" wire:click.prevent="remove({{ $key }})">-<button>
      </div> 
    </div>
  </div>
  @endforeach
  <div class="md:w-1/3 px-3 mb-6 md:mb-0 mt-3">
    <button type="submit" class="bg-pink-500 rounded px-4 py-2 text-white font-lg" wire:click.prevent="store()">Simpan<button>
  </div>
</form>
</div>

