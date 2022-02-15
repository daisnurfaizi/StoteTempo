@extends('Templates.Master')
@section('content')
<div class="w-full mb-12 px-4">
    <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white">
      <div class="rounded-t mb-0 px-4 py-3 border-0">
        <div class="flex flex-wrap items-center">
          <div class="relative w-full px-4 max-w-full flex-grow flex-1" >
            <h3 class="font-semibold text-lg text-blueGray-700">
              LIST
            </h3>
          </div>
        </div>
      </div>
       <div class="block w-full overflow-x-auto p-4">
        <!-- Projects table -->
        </div>
    </div>
</div>
  @foreach ($products as $product)
  <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
    <div
      class="relative flex flex-col min-w-0 break-words bg-white rounded mb-6 xl:mb-8 shadow-lg"
    >
      <div class="flex-auto p-4">
        <div class="flex flex-wrap">
          <div
            class="relative w-full pr-4 max-w-full flex-grow flex-1"
          >
            <h5
              class="text-blueGray-400 uppercase font-bold text-xs"
            >
              {{ $product->product_name }}
            </h5>
            <span class="font-semibold text-xl text-blueGray-700">
              {{ $product->qty_product }}
            </span>
          </div>
          <div class="relative w-auto pl-4 flex-initial">
            <div
              class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 shadow-lg rounded-full bg-red-500"
            >
              <i class="far fa-chart-bar"></i>
            </div>
          </div>
        </div>
        <p class="text-sm text-blueGray-400 mt-4">
          {{-- <span class="text-emerald-500 mr-2">
            <i class="fas fa-arrow-up"></i> 3.48%
          </span> --}}
          <span class="whitespace-nowrap">
            <a class="text-sm text-white rounded   bg-pink-500 px-4 py-2" href="{{ url('UpdateProduk/'.$product->id) }}">Detail</a> 
          </span>
        </p>
      </div>
    </div>
  </div>    
  @endforeach
  

@endsection