<x-app-layout>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Create Employee
        </h2>
        <a class="btn btn-info" href="{{url('companies')}}">Back</a>
      
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <form method="POST" action="{{url('employee-store/')}}" autocomplete="off" enctype= multipart/form-data>
                   @csrf
                       <div class="form-group">
                            <label ><b>First Name <span style="color: #d93025;">*</span></b></label>
                        <input type="text" name="first_name" class="form-control"  value="" required >
                        
                    </div>
                     <div class="form-group">
                            <label ><b>Last Name <span style="color: #d93025;">*</span></b></label>
                        <input type="text" name="last_name" class="form-control"  value="" required >
                        
                    </div>
                     <div class="form-group">
                     <label ><b>Company <span style="color: #d93025;">*</span></b></label>
                      <select class="form-control" name="company" required>
                        <option>Select company</option>
                        @foreach($companies as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                        
                    </div>
                    <div class="form-group">
                        <label ><b>Email </b></label>
                        <input type="email" name="email" class="form-control"  value="" >
                        
                    </div>
                            <div class="form-group">
                                <label for="phone"><b>Phone </b></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" >
                                  
                                </div>
 
                                
                            </div>
                            
                         
                            <div class="form-group">
                                <label ><b>Profile Image</b></label>
                                <input type="file" id="profile_image" class="form-control-file" name="profile_image">
                           
                            </div>
                            
                      
            
                   <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  Save
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you want to save employee?
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

