@extends('Templates.Master')
@section('library')
<script src="{{ URL::asset('js/Jquery.js') }}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection
@section('content')

<div class="relative flex flex-col min-w-0 break-words w-full mb-6 -mt-10 shadow-lg rounded bg-white">
    <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div
            class="relative w-full px-4 max-w-full flex-grow flex-1"
          >
            <h3 class="font-semibold text-lg text-blueGray-700">
              Order Produk
            </h3>
            @if ($message = Session::get('success'))
            <div class="flex items-center bg-teal-500 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>{{ $message}}.</p>
            </div>    
            @endif 
          </div>
        </div>
    
    <form class="relative m-auto mb-4 w-full " action="{{ route('hpp.create') }}" method="POST" >
        @csrf
        <div class="flex flex-wrap -mx-3 mb-2">
          <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
                Nama Produk
              </label>
              <select id="namaproduk" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"   name="product">
                  <option value="">Pilih Produk</option>
                  @foreach ($products as $product)
                  <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                  @endforeach
              </select>
              @error('product')
      <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
      @enderror
            </div>
          <div class="md:w-1/2 px-3 md:mb-4">
                <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-first-name">
                   Vendor
                </label>
                <select  class="vendor appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="products" wire:model='vendor'  id="product_id" required >
                    <option>--Pilih--</option>
                </select>
          </div>
          
          <div class="md:w-1/4 px-3 md:mb-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
              Jenis Produk
            </label>
            <div class="item-produk">
                <select  class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  name="produkdetailid[]"  required>
                    <option>--Pilih--</option>
                  </select> 
            </div>
          </div>
          <div class="md:w-1/4 px-3 md:mb-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
              Hpp
            </label>
            <div class="hpp">
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
                    border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" name="product_name" type="text" value="{{ old('product_name') }}" placeholder="Nama Produk">
                        @error('product_name')
                    <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
                     @enderror
            </div>
          </div>
          <div class="md:w-1/4 px-3 md:mb-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
              Margin Internal
            </label>
            <div class="margin">
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
      border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" name="margininternal[]" type="text" value="{{ old('margininternal.*') }}" placeholder="Nama Produk">
      @error('product_name')
      <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
      @enderror
            </div>
          </div>
          <div class="md:w-1/4 px-3 md:mb-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
              Margin external
            </label>
            <div class="marginexternal">
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
      border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" name="marginexternal[]" type="number" value="{{ old('marginexternal.*') }}" placeholder="Nama Produk">
      @error('product_name')
      <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
      @enderror
            </div>
          </div>
          
            <div class="w-full px-3">
          </div>
        </div>
       
      
        <div class="md:w-1/3 px-3 mb-6 md:mb-0 mt-3">
          <button type="submit" class="bg-pink-500 rounded px-4 py-2 text-white font-lg">Simpan<button>
        </div>
      </form>

      <div class="block w-full overflow-x-auto p-4">
        <!-- Projects table -->
      </div>
      </div>
      
    <script>
        var data2
        var totalitempcs = 0
        var totalpcs = document.getElementById('totalpcs')
        var tambahitem = document.getElementById('tambahitem')
        $(document).ready(function(){
          $('#namaproduk').on('change', function(){
            var id = $(this).val();
            $.ajax({
              url: "{{ url('/ItemProductJson/') }}/"+id,
              type: "GET",
              dataType: "json",
              success: function(data){
               console.log(data);
               data2 = data;
               $('.item-produk').empty();
                $(".jumlah-pcs").empty();
               $.each(data, function(key, value){
                // console.log(value.id);
                $('.jumlah-pcs').append('<input class="pcs appearance-none inlib mb-3 w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" name="jumlahpcs[]" required>');
                 $(".item-produk").append(`
                 <select  class="appearance-none inlib w-full bg-gray-200 mb-3 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"  name="produk[]"  required>
                 <option value="${value.id}">${value.category_name}-${ value.color}-${value.size}</option>
                  </select> 
                 `);
               });
               
              }
            });   
            // ajax untuk vendor
            $.ajax({
              url: "{{ url('/VendorJson/') }}/"+id,
              type: "GET",
              dataType: "json",
              success: function(data){
               console.log(data);
              
                $('.vendor').empty();
                
                $.each(data, function(key, value){
                    $(".vendor").append(`
                    <option value="${value.id}">${value.vendor_name}</option>`);
                    });
              }
            });
            // ajax untuk hpp
            $.ajax({
              url: "{{ url('/HppJson/') }}/"+id,
              type: "GET",
              dataType: "json",
              success: function(data){
               console.log(data);
              
                $('.hpp').empty();
                $('.margin').empty();
                $('.marginexternal').empty();
                
                $.each(data, function(key, value){
                    $(".hpp").append(`
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
                    border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" name="hpp[]" type="text" value="${value.Nilai_hpp}" placeholder="Nama Produk">
                        @error('product_name')
                    <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
                     @enderror
                     <input class="" name="product_detailid[]" type="hidden" value="${value.product_detail_id}" placeholder="Nama Produk">
                       
                     `);
                    

                    $(".margin").append(`
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
                    border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" name="margin_internal[]" type="text" value="0" placeholder="Nama Produk">
                        @error('product_name')
                    <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
                     @enderror`);
                  

                    $(".marginexternal").append(`
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('product_name')
                    border-red-500 @enderror  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" name="margin_eksternal[]" type="text" value="0" placeholder="Nama Produk">
                        @error('product_name')
                    <p class="text-red-500 text-xs mb-4 italic">{{ $message }}</p>
                     @enderror`);
                    });
                    
              }
            });
              
          });
        });
        // 
        $('.pcs').each(function(){
          var val = $.trim($(this).val());
          if(val){
              val = parseInt(val);
              totalitempcs += val;
              totalpcs.value = totalitempcs;
          }
            })
        $('#tableorder').DataTable();
      </script>
      
      
</div>    
@endsection