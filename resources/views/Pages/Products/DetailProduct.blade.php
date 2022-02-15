@extends('Templates.Master')
@section('content')
<div class="w-full mb-12 px-4">
    <div
      class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
    >
      <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div
            class="relative w-full px-4 max-w-full flex-grow flex-1"
          >
            <h3 class="font-semibold text-lg text-blueGray-700">
              {{ $products[0]->product_name }} 
              <button id="tambahitem" class="bg-pink-500 rounded text-white px-2 py-2 ml-3 font-bold">+ Tambah Item</button>
            </h3>
          </div>
        </div>
      </div>
      <div class="block w-full overflow-x-auto p-4">
        <!-- Projects table -->
        <div id="itemproduct">

        </div>
        <table
          class="items-center w-full bg-transparent border-collapse" style="width:100%"
          id="table"
        >
          <thead>
            <tr>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Color
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Size
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Harga Perunit
              </th>
              <th
              class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
            >
              Hpp
            </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Margin internal
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Harga Jual
              </th>
             
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Margin external
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Harga Jual external
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Qty
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Deskripsi
              </th>

            </tr>
          </thead>
          <tbody>
              @foreach ($products as $product)
            <tr>
                    
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{ $product->color }}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{ $product->size }}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{ $product->harga_perunit }}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{ $product->Nilai_hpp }}
              </td>
              <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
            >
              {{ $product->margin }}
            </td>
            <td
            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
          >
            {{ $product->harga_jual }}
          </td>
          <td
          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
        >
          {{ $product->margin_eksternal }}
        </td>
        <td
          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
        >
          {{ $product->harga_jual_eksternal }}
        </td>
        <td
          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
        >
          {{ $product->qty_item  }}
        </td>
        <td
          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
        >
          {{ $product->description   }}
        </td>
      
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{-- @livewire('product-table', ['params' => 3]) --}}
  {{-- <livewire:product-table :paramid="$id"/> --}}
  
<script>
  const Tambahitem = document.getElementById('tambahitem');
  const Itemproduct = document.getElementById('itemproduct');
  
  
  Tambahitem.addEventListener('click', function(){
    Itemproduct.innerHTML = `
    <form action="{{ route('add.item.product') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $products[0]->id }}">
    <input type="hidden" name="category_id" value="{{ $products[0]->vendor_id }}">
    <input type="hidden" name="vendor_id" value="{{ $products[0]->category_id }}">
    <div class="flex flex-wrap -mx-3 mb-2">
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-state">
          Color
        </label>
        <div class="relative">
          <input class="appearance-none block w-full bg-gray-200 text-blueGray-700border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" name="color" placeholder="90210">
        </div>
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Size
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="size" type="text" placeholder="90210">
      </div>
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Jumlah Item
        </label>
        <input class="appearance-none block w-full bg-gray-200 text-blueGray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" name="jumlahitem" type="number" placeholder="90210">
      </div> 
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-zip">
          Deskripsi
        </label>
        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" name="description"  placeholder="90210"></textarea>
      </div> 
      <div class=" md:w-1/3 px-3 mb-6 md:mb-0 mt-8">
        <label id="removeitem" class="removeitem bg-pink-500 font-bold font-lg rounded mt-6 px-4 py-2 text-white font-lg">- Remove<label>
      </div> 
    </div>
    <di>
    <button id="Tambah" class="bg-pink-500 font-bold font-lg rounded mt-6 mb-8 px-4 py-2 text-white font-lg"> Simpan</button>
    </div>
    </form>
    `;
    removeitem();
  });
  function removeitem(){
    
    const removeitem = document.getElementById('removeitem');
    removeitem.addEventListener('click', function(e){
      e.preventDefault();
      while (Itemproduct.firstChild) Itemproduct.removeChild(Itemproduct.firstChild)
    });
  }


</script>
@livewireScripts
@endsection