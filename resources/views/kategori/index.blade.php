@extends('../layout/' . $layout)

@section('subhead')
<title>Dashboard - Rekayasa Web</title>

@endsection
@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">List Kategori</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
    <a href="{{ route('dashboardcreate') }}">
      <button class="btn btn-primary shadow-md mr-2">Tambah Produk</button> </a>
    <div class="hidden md:block mx-auto text-slate-500">Showing list data entries</div>
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0"></div>
  </div>
  <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
      <thead>
        <tr>
          <th class="whitespace-nowrap">ID</th>
          <th class="whitespace-nowrap">Nama Produk</th>
          <th class="text-center whitespace-nowrap">Kategori Produk</th>
          <th class="text-center whitespace-nowrap">Satuan</th>
          <th class="text-center whitespace-nowrap">Harga</th>
          <th class="text-center whitespace-nowrap">Deskripsi Produk</th>
          <th class="text-center whitespace-nowrap">ACTION</th>

        </tr>
      </thead>
      <tbody>
        @foreach($data as $value)
        <tr class="intro-x">
          <td class="w-40">
            <div class="flex">
              <div class="w-10 h-10 image-fit zoom-in">
                {{ $value['id'] }}
              </div>
            </div>
          </td>
          <td>
            <div class="text-slate-500">{{ $value['nama_barang'] }}</div>
          </td>
          <td class="text-center">{{ $value[ 'kategori_barang']}}</td>
          <td class="text-center">{{ $value[ 'satuan']}}</td>
          <td class="text-center">{{ $value[ 'harga']}}</td>
          <td class="">
            <div class="flex items-center justify-center {{ $value['deskripsi_barang'] }}">
              {{ $value['deskripsi_barang'] }}
            </div>
          </td>
          <td class="table-report__action w-56">
            <div class="flex justify-center items-center">
              <a class="flex items-center mr-3" href="{{ route('dashboardedit',$value['id']) }}">
                <i data-feather="check-squere" class="w-4 h-4 mr-1"></i> Edit
              </a>
              <a href="{{ route('dashboardestroy',$value['id']) }}" class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Delete
              </a>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>
@endsection