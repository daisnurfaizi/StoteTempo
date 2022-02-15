@extends('Templates.Master')
@section('library')
<script src="{{ URL::asset('js/Jquery.js') }}"></script>
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
          </div>
        </div>
    </div>
    @livewire('order.order-product',)
</div>
@livewireScripts    
@endsection