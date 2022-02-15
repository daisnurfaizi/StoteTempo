
    <form class="relative m-auto mb-4 w-full max-w-lg" wire:submit.prevent="orderProduct" >
  @csrf
  <div class="flex flex-wrap -mx-3 mb-2">
    <div class="md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
          Nama Produk
        </label>
        <select id="namaproduk" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="product"  name="products">
            <option value="">Pilih Produk</option>
            @foreach ($products as $product)
            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
            @endforeach
        </select>
      </div>
    <div class="md:w-1/2 px-3 md:mb-4">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-first-name">
        Vendor
      </label>
      <select id="vendor" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="products" wire:model='vendor'  id="product_id" required >
        @empty($vendors)    
        <option>--Pilih--</option>
        @endempty)
        @foreach ($vendors as $vendor)
        <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
        @endforeach
      </select>
    </div>

    <div class="md:w-1/2 px-3 md:mb-4">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
        Jenis Produk
      </label>
      <select  class="item-produk appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  name="category_id"  required>
        @empty($items)    
        <option>--Pilih--</option>
        @endempty)
        @foreach ($items as $item)
            <option wire:model="productitems.{{ $item->id }}" :key="{{ $item }}" value="{{ $item->id }}">{{ $item->size ."-".$item->color }} </option>
        @endforeach
      </select>  
    </div>
    <div class="md:w-1/4 px-3 md:mb-4">
      <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
        Jumlah pcs
      </label>
      <input class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" name="harga" required>
    </div>
    <div class="md:w-1/4 px-3 md:mb-4 mt-6">
        <button id="tambahitem" class="appearance-none inlib w-full bg-pink-500 text-white rounded font-bold  px-2" wire:click.prevent="add({{ $i }})">Tambah Item Produk</button>
    </div>
    @foreach ($Inputs as $key => $value)
    <div class="md:w-1/2 px-3 md:mb-4">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
          Jenis Produk
        </label>
        {{-- <select class="item-produk appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="category_id" required> --}}
            {{-- @empty($items)    
            <option>--Pilih--</option>
            @endempty)
            @foreach ($items as $item)
          <option value="{{ $item->id }}">{{ $item->size ."-".$item->color }}</option>
          @endforeach--}}
          {{-- </select>  --}}
      </div>
      <div class="md:w-1/4 px-3 md:mb-4">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
          Jumlah pcs
        </label>
        <input class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  type="number" name="qty" required>
      </div>
      <div class="md:w-1/4 px-3 md:mb-4 mt-6">
          <button class="appearance-none inlib w-full bg-pink-500 text-white rounded font-bold  px-2" wire:click="remove({{ $key }})" >-</button>
      </div>
    @endforeach
      <div class="w-full px-3">
        <div id="items" class="mt-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-password">
                Total pcs
              </label>
              <input type="number" name="jumlah" class=" appearance-none inlib w-1/4 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" wire:model="toltalitem" placeholder="jumlah">             
            <div class="mt-3">
                <label id="tambahitem" class=" ml-3 text-white bg-green-700 p-1 rounded font-bold">+ Tambah Item</label>
                <label id="removeitem" class="ml-3 text-white bg-red-600 p-1 rounded font-bold">- Hapus Item</label>
            </div>
        </div>
    
    </div>
  </div>
  <div class="mt-6 px-3 mb-6 md:mb-0">
    <button id="additem" class="appearance-none block w-full bg-pink-500 text-white font-bold text-lg rounded py-3 px-4 leading-tight focus:outline-none focus:border-gray-500">+</button>
  </div>

  <div class="md:w-1/3 px-3 mb-6 md:mb-0 mt-3">
    <button type="submit" class="bg-pink-500 rounded px-4 py-2 text-white font-lg">Simpan<button>
  </div>
</form>
</div>

{{-- <script>
  window.addEventListener('namaproduk', event => {
    // $('#namaproduk').on('change', function(){
      let id = $(this).val();
      console.log(id);
      $.ajax({
        url: "{{ url('/ItemProductJson/') }}/"+id,
        type: "GET",
        dataType: "json",
        success: function(data){
         console.log(data);
         $.each(data, function(key, value){
          // console.log(value.id);
           $(".item-produk").append(`
           <option value="">--pilih--</option>
           <option value="${value.id}">${value.category_name}-${ value.color}-${value.size}</option>`);
         });
         
        }
      });     
    // });
        });
  $(document).ready(function(){
    $('#namaproduk').on('change', function(){
      var id = $(this).val();
      $.ajax({
        url: "{{ url('/ItemProductJson/') }}/"+id,
        type: "GET",
        dataType: "json",
        success: function(data){
         console.log(data);
         $.each(data, function(key, value){
          // console.log(value.id);
           $(".item-produk").append(`
           <option value="">--pilih--</option>
           <option value="${value.id}">${value.category_name}-${ value.color}-${value.size}</option>`);
         });
         
        }
      });     
    });
  });
</script> --}}


