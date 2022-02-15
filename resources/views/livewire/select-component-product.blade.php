<div class="relative flex flex-col min-w-0 break-words w-full mb-6 -mt-10 shadow-lg rounded bg-white">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div
            class="relative w-full px-4 max-w-full flex-grow flex-1"
          >
            <h3 class="font-semibold text-lg text-blueGray-700">
              Input Invoice
            </h3>
          </div>
        </div>
    </div>
    <form class="relative m-auto mb-4 w-full max-w-lg" action="{{ route('create.product') }}" method="POST">
  @csrf
  <div class="flex flex-wrap -mx-3 mb-2">
    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
          Nomor Invoice
        </label>
        <input type="text" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="nomor invoice" name="nomor invoice" required>
      </div>
    <div class="md:w-1/2 px-3 md:mb-0">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-first-name">
        Nama Produk
      </label>
      <select class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="products"  id="product_id" required>
        <option>--Pilih--</option>
        @foreach ($products as $product)
        <option value="{{ $product->id }}" wire:click="onChange({{ $product->id }})">{{ $product->product_name }}</option>  
        @endforeach
        </select>
      {{-- <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" name="product_name" type="text" value="" placeholder="Nama Produk"> --}}
      {{-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> --}}
    </div>
    <div class="md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
        Kategori
      </label>
      <select class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="category_id" required>
      <option>--Pilih--</option>
      {{-- @foreach ($category as $category)
      <option value="{{ $category->id }}">{{ $category->Category_name }}</option>
      @endforeach --}}
      </select>
    </div>
    <div class="px-3">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-password">
        Vendor
      </label>
      {{-- <select class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="vendor"  name="vendor_id"> --}}
        {{-- @foreach ($vendor as $vendor) --}}
      {{-- <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option> --}}
      {{-- @endforeach --}}
      {{-- </select> --}}
      <input type="text" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="nomor invoice" wire:model="vendor_name" name="nomor invoice" value="" required>

      {{-- <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p> --}}
    </div>
    <div class="w-full px-3">
        <div id="items" class="mt-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-password">
                Item
              </label>
              <select class="appearance-none inlib w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="item[]">
                <option>--Pilih--</option>
              </select>
              <input type="number" name="jumlah[]" class=" appearance-none inlib w-1/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="jumlah">             
            <div class="mt-3">
                <label id="tambahitem" class=" ml-3 text-white bg-green-700 p-1 rounded font-bold">+ Tambah Item</label>
                <label id="removeitem" class="ml-3 text-white bg-red-600 p-1 rounded font-bold">- Hapus Item</label>
            </div>
        </div>
        

    </div>
    
    
    {{-- <div class="md:w-1/3 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
        Jumlah Item
      </label>
    </div> --}}
  </div>
  <div class="mt-6 px-3 mb-6 md:mb-0">
    {{-- <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" placeholder="Albuquerque"> --}}
    <button id="additem" class="appearance-none block w-full bg-pink-500 text-white font-bold text-lg rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500">+</button>
  </div>
  {{-- <div id="items" class="mt-4"> --}}
    {{-- <div class="flex flex-wrap -mx-3 mb-2">
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-state">
          Color
        </label>
        <div class="relative">
          <input class="appearance-none block w-full bg-gray-200 text-blueGray-700border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="color[]" placeholder="90210">
        </div>
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Size
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="size[]" type="text" placeholder="90210">
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Harga
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" name="harga[]" type="text" placeholder="90210">
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Margin Harga
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" name="margin[]" placeholder="90210">
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Harga Jual
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" name="hargajual[]" type="number" placeholder="90210">
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Jumlah Item
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" name="jumlahitem[]" type="number" placeholder="90210">
      </div> 
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Deskripsi
        </label>
        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" name="description[]"  placeholder="90210"></textarea>
      </div> 
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0 mt-8">
        <label  class="removeitem bg-pink-500 font-bold font-lg rounded mt-6 px-4 py-2 text-white font-lg">-<label>
      </div> 
    </div> --}}
    {{-- <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-password"> --}}
        {{-- Item --}}
      {{-- </label> --}}
      {{-- <select class=" appearance-none inlib w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="item[]"> --}}
        {{-- <option>--Pilih--</option> --}}
      {{-- </select> --}}
      {{-- <button id="tambahitem" class="ml-3 text-white bg-green-700 p-1 rounded font-bold">+ Tambah Item</button> --}}
      {{-- <button id="removeitem" class="ml-3 text-white bg-red-600 p-1 rounded font-bold">- Hapus Item</button> --}}
  {{-- </div> --}}
  <div class="md:w-1/3 px-3 mb-6 md:mb-0 mt-3">
    <button type="submit" class="bg-pink-500 rounded px-4 py-2 text-white font-lg">Simpan<button>
  </div>
</form>
</div>
