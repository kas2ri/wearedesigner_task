<x-app-layout>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" >
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Companies
        </h2>
        <a class="btn btn-info" href="{{url('companies-create')}}">Add new</a>



    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
             <table class="table" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Cover Image</th>
                    <th scope="col">Website</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i=1
                @endphp
                @foreach($companies as $key => $value)
                    
          
                    <tr>
                    <th scope="row">{{$i}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                    <td>  <img src= "{{url('storage/logo/'.$value->log) }}" style="width:50px;height:50px;"></td>
                   <td>  <img src= "{{url('storage/cover_image/'.$value->cover_image) }}" style="width:50px;height:50px;"></td>
                    <td>{{$value->web}}</td>
                      <td><a class="btn btn-success btn-sm" href="{{url('companies-edit/'.$value->id)}}">Edit</a><a class="btn btn-danger btn-sm" href="{{url('companies-delete/'.$value->id)}}">Delete</a><td>
                    </tr>
                        @php
                    $i++;
                @endphp
                @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
