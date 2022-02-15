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
              Card Tables
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
                Nik
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Username
              </th>
              <th
                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
              >
                Email
              </th>
            </tr>
          </thead>
          <tbody>
              @foreach ($userbarters as $user)
            <tr>
                    
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                {{ $user->nik }}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                <i class="fas fa-circle text-orange-500 mr-2"></i>
                {{ $user->login }}
              </td>
              <td
                class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
              >
                <i class="fas fa-circle text-orange-500 mr-2"></i>
                {{ $user->email }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
@section('footerscript')
<script>
    $(document).ready(function () {
        $('#table').DataTable({
          responsive: true
        });
        $('#table2').DataTable();
  
    });
  </script>
@endsection
@section('library')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
@endsection