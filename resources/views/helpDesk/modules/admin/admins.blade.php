@extends('helpDesk.layouts.index')

@section('main')
<div style="display: flex">
    <form action="/logout/admin" method="POST">
        @csrf
        <button class="Blogout" onclick="confirm('apakah kamu ingin logout?')">Logout</button>
    </form>
</div>
<section class="ticket-list" style="padding-left: 30px">
    <h2>Daftar Laporan</h2>
    <p>Laporan mahasiswa Institut Bisnis dan Informatika Kesatuan</p>
    <div style="border: 2px solid black;" >
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Pengirim</th>
                <th>Divisi</th>
                <th>Priority</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Attachment</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    {{-- <td>{{ $ticket->id }}</td> --}}
                    <td>{{ $ticket->mahasiswa->nama_lengkap }}</td>
                    <td>{{ $ticket->divisi->nama_divisi }}</td>
                    <td>{{ $ticket->priority }}</td>
                    <td>{{ $ticket->judul_tiket }}</td>
                    <td>{{ $ticket->deskripsi }}</td>
                    <td>
                        {{-- <img
                            class="w-100px rounded"
                            src="{{ asset('storage/' . $ticket->attachment) }}"
                            alt="{{ $ticket->judul }}"
                        /> --}}
                        <a href="{{ asset('storage/' . $ticket->attachment) }}" target="_blank">
                            Gambar
                        </a>
                    </td>
                    <td>{{ $ticket->tanggal}}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>
                        <div class="button">
                            <a href="/details/{{$ticket->id}}">
                                <button class="spasi">
                                    <span>Balas</span>
                                </button>
                            </a>
                            <a href="/delete/{{ $ticket->id }}">
                                <button class="spasi" onclick="return confirm('Apakah data tersebut mau dihapus?')">
                                    <span>Hapus</span>
                                </button>
                            </a>
                            <a href="/update/{{$ticket->id}}">
                                <button>
                                    <span>Edit</span>
                                </button>
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{-- {{$data->links()}} --}}
    </div>
    </div>
    <div>
        {{ $tickets->links() }}
    </div>
</section>
<style>
header h1 {
    margin: 0;
    font-size: 24px;
}

.button2 {
    background-color: white;
    border: 2px solid black;
    text-align: center;
    border-radius: 30px;
    width: 100px;
    margin-top: 50px;
    margin-left: 30px;
  }

.edit-button {
    background-color: #b083c5;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

main {
    margin: 20px;
    width: 90%;
    max-width: 1200px;
}

.report-list {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.report-list h2 {
    margin-top: 0;
    font-size: 20px;
}

.report-list p {
    margin: 0 0 20px 0;
    color: #555;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table td button {
    background-color: #5d3a7a;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    font-size: 14px;
    border-radius: 3px;
}

table td button:hover {
    background-color: #472d57;
}

.button2 {
    background-color: white;
    border: 2px solid black;
    text-align: center;
    border-radius: 30px;
    width: 100px;
    margin-top: 10px;
    margin-left: 30px;
  }

  .span1 {
    font-weight: bold;
    font-size: 18px;
  }
  .button {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    height: 100%;
  }

  .spasi{
    margin-right: 10px;
  }

  .Blogout{
    justify-content: center;
    width: 90%;
    margin-left: 25px;
    color: black;
    background-color: white;
    margin-top: 30px;
    border-radius: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px;
    border-radius: 30px;
    border: 2px solid black;
    font-size: 18px;
    font-weight: bold
  }

  .Blogout:hover{
cursor: pointer
}

</style>
@endsection
