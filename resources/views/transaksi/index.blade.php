@extends('../layout/' . $layout)

@section('subhead')
<title>Transaksi - UMKM</title>

@endsection
@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10">List Data Transaksi</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
  <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
    <a href="{{ route('transaksicreate') }}">
      <button class="btn btn-primary shadow-md mr-2">Tambah Transaksi</button> </a>
    <div class="hidden md:block mx-auto text-slate-500">Showing list data entries</div>
    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0"></div>
  </div>
  <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
      <thead>
        <tr>
          <th class="whitespace-nowrap">ID</th>
          <th class="whitespace-nowrap">Nama User</th>
          <th class="text-center whitespace-nowrap">Nama Produk</th>
          <th class="text-center whitespace-nowrap">Total Harga</th>

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
            <div class="text-slate-500">{{ $value['nama_user'] }}</div>
          </td>
          <td class="text-center">{{ $value[ 'nama_barang']}}</td>
          <td class="text-center">{{ $value[ 'total_harga']}}</td>
          <td class="table-report__action w-56">
            <form action="{{ route('transaksidestroy',$value['id']) }}" method="POST">
              @csrf
              @method("delete")
              <div class="flex justify-center items-center">
                <a class="flex items-center mr-3" href="{{ route('transaksiedit',$value['id']) }}">
                  <i data-feather="check-squere" class="w-4 h-4 mr-1"></i> Edit
                </a>
                <button class="flex items-center text-danger" data-tw-toggle="modal" type="submit " data-tw-target="#delete-confirmation-modal">
                  <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>Delete
                </button>
              </div>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


</div>
@endsection