@extends('../layout/' . $layout)

@section('subhead')
<title>Create Data With API</title>
@endsection
@section('subcontent')
<div class="intro-y flex items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">Form Tambah Data Transaksi</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
  <div class="intro-y col-span-12 lg:col-span-6">
    @if(count($errors) > 0)
    @foreach($errors->all() as $error )
    <div class="alert alert-warning">{{ $error }}</div>
    @endforeach
    @endif
    <!-- BEGIN: Form Layout -->
    <form action="{{ route('transaksistore')}}" method='POST'>
      @csrf

      <div class="intro-y box p-5">
        <div>
          <label for="crud-form-1" class="form-label">Nama User</label>
          <input id="nama-user" type="text" class="form-control w-full" name="nama-user">
        </div>
        <div class="mt-3">
          <div>
            <label for="crud-form-1" class="form-label">Nama Produk</label>
            <input id="nama-barang" type="text" class="form-control w-full" name="nama-barang">
          </div>
          <div class="mt-3">
            <div>
              <label for="crud-form-1" class="form-label">Total Harga</label>
              <input id="total-harga" type="text" class="form-control w-full" name="total-harga">
            </div>
            <div class="mt-3">
              <div class="text-right mt-5">
                <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                <button type="submit" class="btn btn-primary w-24">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

</form>
<!--End Form Layout-->
</div>
</div>
@endsection

@section('script')
<script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>
@endsection