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
              {{ $title }}
            </h3>
          </div>
        </div>
      </div>
      <div class="block w-full overflow-x-auto p-4">
        <!-- Projects table -->
        <table
          class="items-center w-full bg-transparent border-collapse" style="width:100%"
          id="table"
        >
          <thead>
            <tr>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Nama Kategori
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Status
              </th>
            </tr>
          </thead>
          <tbody>
              @foreach ($listCategory as $category)
            <tr>
                    
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{ $category->Category_name }}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
              <!-- {{ $category->active }} -->
              <div class=" inline flex justify-right">
                    <i class="fas fa-circle text-orange-500 mr-2 ml-2"></i>
                    <input type="checkbox" name="" id=""   {{ $category->active==1 ? 'checked' : '' }} >
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection