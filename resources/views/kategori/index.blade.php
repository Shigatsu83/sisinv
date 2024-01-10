@extends('../layout')
@section('content')
        <div class="d-flex justify-content-center mt-4"> <!-- Add mt-4 class for 1rem margin top -->
            <div class="table-responsive">
                <table class="table table-bordered text-center table-full-width">
                    <thead>
                        <tr>
                            <th class="col" style="width: 300px;">Kategori</th>
                            <th class="col" style="width: 300px;">Deskripsi</th>
                            <th class="col" style="width: 80px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi konten tabel di sini -->
                        @foreach($rsetKategori as $category)
                            <tr>
                                <td>{{ $category->kategori }}</td>
                                <td>{{ $category->deskripsi }}</td>
                                <td>Aksi</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
                        

