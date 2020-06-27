@extends("tem/tem")

@section("title")
@section("content")
<h2>Form Upload</h2>
<form action="upload" method="POST" enctype="multipart/form-data">
<div class="form-group">
	@csrf
    <label for="file">Upload Gambar</label>
    <input type="file" name="file" class="form-control-file" id="file">
    <label for="keterangan" class="mt-2">Keterangan</label>
    <textarea name="keterangan" class="form-control"></textarea>
    <input type="submit" name="simpan" class="btn btn-primary mt-2 float-right" value="Simpan">
  </div>
</form>

<br><br>
<h2>Daftar Gambar</h2>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th width="40px">No</th>
			<th>Gambar</th>
			<th>Keterangan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($upload as $u)
			<tr>
				<td align="center">{{ $loop->iteration }}</td>
				<td><img src="{{url('/file/'.$u->file)}}" width="100px"></td>
				<td>{{$u->keterangan}}</td>
				<td><form action="upload/{{$u->id}}" method="post"> @method("delete") @csrf<button type="submit" class="btn btn-danger btn-sm float-left mr-2 mb-1">Hapus</button></form></td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection