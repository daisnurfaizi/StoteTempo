@extends('Templates.Master')
@section('content')
@livewire('new-product-component', [
  'category' => $category,
  'vendor' => $vendor,])
   @livewireScripts
@endsection