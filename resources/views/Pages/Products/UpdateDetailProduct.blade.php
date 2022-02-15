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
                Margin
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Harga Jual
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
                {{-- <i class="fas fa-circle text-orange-500 mr-2"></i> --}}
                {{ $product->size}}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{-- <i class="fas fa-circle text-orange-500 mr-2"></i> --}}
                {{ $product->harga_perunit }}
              </td>
              <td
              class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
            >
              {{-- <i class="fas fa-circle text-orange-500 mr-2"></i> --}}
              {{ $product->margin }}
            </td>
            <td
            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
          >
            {{-- <i class="fas fa-circle text-orange-500 mr-2"></i> --}}
            {{ $product->harga_jual }}
          </td>
          <td
          class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
        >
          {{-- <i class="fas fa-circle text-orange-500 mr-2"></i> --}}
          {{ $product->qty_item }}
        </td>
        <td
        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
      >
        {{-- <i class="fas fa-circle text-orange-500 mr-2"></i> --}}
        {{ $product->description }}
      </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
<script>
</script>
@endsection
@section('footerscript')
<script>
    $(document).ready(function () {
        $('#table').DataTable({
          responsive: true
        });
    });
  </script>
@endsection
@section('library')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

@endsection 