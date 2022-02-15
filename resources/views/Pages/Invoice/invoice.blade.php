
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
              Buat Invoice
            </h3>
            @if ($message = Session::get('success'))
            <div class="flex items-center bg-teal-500 text-white text-sm font-bold px-4 py-3" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>{{ $message}}.</p>
            </div>    
            @endif 
          </div>
        </div>
    
    <form class="relative m-auto mb-4 w-full " action="{{ route('create.invoice') }}" method="POST" >
        @csrf
        <div class="flex flex-wrap -mx-3 mb-2">
          <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
                Nomor Order
              </label>
              <select id="nomororder" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"   name="product">
                  <option value="">Pilih Produk</option>
                  @foreach ($ordernumbers as $ordernumber)
                  <option value="{{ $ordernumber->order_id }}">{{ $ordernumber->order_id }}</option>
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
          
          {{-- <div class="md:w-1/4 px-3 md:mb-4">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
              Jumlah pcs
            </label>
            <div class="jumlah-pcs">
                <input class="pcs appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="number" name="jumlahpcs[]" required>
            </div>
          </div>
          
            <div class="w-full px-3">
             
          
          </div> --}}
          <div class="w-full overflow-x-auto p-4">
            <!-- Projects table -->
            <table
              class=" items-center w-full bg-transparent border-collapse" style="width:100%"
              id="tableorder"
            >
              <thead class="">
                <tr>
                  <th
                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                  >
                    Nama Produk
                  </th>
                  <th
                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                  >
                    Ukuran
                  </th>
                  <th
                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                  >
                    Warna
                  </th>
                  <th
                  class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                >
                  qty
                </th>
                <th
                  class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                >
                  Harga Satuan
                </th>
                <th
                  class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                >
                  Total Harga Satuan
                </th>
                </tr>
              </thead>
              <tbody class="fieldGroup" id="itemorder">
              </tbody>
            </table>
          </div>
          <div class="md:w-1/4 px-3 mb-6 md:mb-0 mt-3">
            <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
                Total Item
              </label>
            <input id="totalitem" type="number" name="keseluruhanitem" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
        </div>
        <div class="md:w-1/4 px-3 mb-6 md:mb-0 mt-3">
          <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
              Grand Total
            </label>
          <input id="totalitem" type="number" name="grandtotal" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
      </div>
      <div class="md:w-1/4 px-3 mb-6 md:mb-0 mt-3">
        <label class="block uppercase tracking-wide text-blueGray-700 text-xs font-bold mb-2" for="grid-last-name">
            Ongkos Kirim
          </label>
        <input id="totalitem" type="number" name="ongkoskirim" class="appearance-none inlib w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
    </div>
        </div>
       
       
        <div class="md:w-1/3 px-3 mb-6 md:mb-0 mt-3">
          <button type="submit" class="bg-pink-500 rounded px-4 py-2 text-white font-lg">Simpan<button>
        </div>
        
      </form>

      
      </div>
      
    <script>
        var data2
        var totalitempcs = 0
        // var totalpcs = document.getElementById('totalpcs')
        // var tambahitem = document.getElementById('tambahitem')
        $(document).ready(function(){
          $('#nomororder').on('change', function(){
            var id = $(this).val();
          
            // ajax untuk vendor
            $.ajax({
              url: "{{ url('/InvoiceJson/vendor/') }}/"+id,
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
            // ajax untuk item produk
            $.ajax({
              url: "{{ url('/ItemInvoice/') }}/"+id,
              type: "GET",
              dataType: "json",
              success: function(data){
               console.log(data);
              
                $('#itemorder').empty();
               
                $.each(data, function(key, value){
                    console.log("ini key"+key);
                    $("#itemorder").append(`
                    <tr>
                    
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    >
                    <input type="text" value="${value.product_name}">
                    <input type="hidden" name="produkid[]" value="${value.id}">
                    <input type="hidden" name="produk_detail_id[]" value="${value.product_details_id}">
                         
                    </td>
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    >
                    <input type="text" name="size[]" value="${value.size}">
                      
                    </td>
                    <td
                      class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                    >
                    <input type="text" name="color[]" value="${value.color}">
                      
                    </td>
                    <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
      
                        <input class="rate_unit" onkeyup="rateUnit(this)" type="text" name=qty[] value="${value.quantity}">
                  </td>
                  <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
      
                <input class="quantity" onkeyup="quantity(this)"  type="text" name=Hargasatuan[] value="0">
                </td>
                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">

                <input class="sumUnit" type="text" name=totalhargasatuan[] value="0">
                </td>
                  </tr>
                    `);
                   
                    });
              }
            });
              
          });
        });
       
       
        function rateUnit(rateUnit){
    var regex=/^[0-9]+$/;
    if(!rateUnit.value.match(regex)){
        rateUnit.value = rateUnit.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(rateUnit).parents(".fieldGroup");
        var rate_unit   = fieldGroup.find(".rate_unit").val();
        var quantity    = fieldGroup.find(".quantity").val();
        quantity = parseInt(quantity);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(rate_unit*quantity);
    }
}
function quantity(quantity){
    var regex=/^[0-9]+$/;
    if(!quantity.value.match(regex)){
        quantity.value = quantity.value.replace(/[^0-9\.]/g,'');
        return false;
    }else{
        var fieldGroup  = $(quantity).parents(".fieldGroup");
        var rate_unit   = fieldGroup.find(".rate_unit").val();
        var quantity    = fieldGroup.find(".quantity").val();
        quantity = parseInt(quantity);
        var sumUnit     = fieldGroup.find(".sumUnit");
        sumUnit.val(rate_unit*quantity);
    }
}
// onkeyup class 
      </script>
      
      
</div>    

@endsection