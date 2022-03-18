<x-app-layout>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Edit {{$company->name}}
        </h2>
        <a class="btn btn-info" href="{{url('companies')}}">Back</a>
      
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <form method="POST" action="{{url('companies-update/'.$company->id)}}" autocomplete="off" enctype= multipart/form-data>
                   @csrf
                       <div class="form-group">
                            <label ><b>Name <span style="color: #d93025;">*</span></b></label>
                        <input type="text" name="name" class="form-control"  value="{{$company->name}}" required >
                        
                    </div>
                    <div class="form-group">
                        <label ><b>Email </b></label>
                        <input type="email" name="email" class="form-control"  value="{{$company->email}}" >
                        
                    </div>
                            <div class="form-group">
                                <label for="phone"><b>Telephone </b></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" value="{{$company->phone}}" >
                                  
                                </div>
 
                                
                            </div>
                            
                         
                            <div class="form-group">
                                <label ><b>Logo</b></label>
                                <input type="file" id="logo" class="form-control-file" name="logo">
                                  <input type="hidden" value="{{$company->log}}" name="current_logo">
                          
                                <small class="form-text text-muted" >Minimum (100x100)</small>
                            </div>
                             @if($company->log != null)
                            <div class="mt-4">
                                  <img src= "{{url('storage/logo/'.$company->log) }}" style="width:50px;height:50px;">
                                   <a class="btn btn-danger btn-sm" href="{{url('companies-remove-logo/'.$company->id)}}">Remove</a>
                            </div>
                          @endif
                            
                        <div class="form-group">
                                <label ><b>Cover Image</b></label>
                                <input type="file" class="form-control-file" name="cover_image">
                                <input type="hidden" value="{{$company->cover_image}}" name="current_cover_image">
                 
                               
                        
                            </div>
                            @if($company->cover_image != null)
                              <div class="mt-4">
                                <img src= "{{url('storage/cover_image/'.$company->cover_image) }}" style="width:50px;height:50px;">
                                
                                <a class="btn btn-danger btn-sm" href="{{url('companies-remove-cover/'.$company->id)}}">Remove</a>
                                </div>
                            @endif
                                <div class="form-group">
                                <label for="web"><b>Website </b></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="web" name="web" autocomplete="off" value="{{$company->email}}" >
                                  
                                </div>
 
                                
                            </div>
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Update
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you want to update company?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                        </div>
                    </div>
                    </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<script>
var _URL = window.URL || window.webkitURL;

$("#logo").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function () {
            if(this.width <100 || this.height<100)
            {
            alert("Image size should at least (100x100). your image is " +this.width + "x " + this.height);
            _URL.revokeObjectURL(objectUrl);
              document.getElementById('logo').value = "";
            }
          
        };
        img.src = objectUrl;
    }
});
</script>

