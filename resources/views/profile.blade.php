<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         Profile
        </h2>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <form method="POST" action="{{url('profile-update/'.$user->id)}}" autocomplete="off">
                   @csrf
                       <div class="form-group">
                            <label ><b>Name <span style="color: #d93025;">*</span></b></label>
                        <input type="text" name="name" class="form-control"  value="{{$user->name}}" required>
                        
                    </div>
                    <div class="form-group">
                        <label ><b>Email <span style="color: #d93025;">*</span></b></label>
                        <input type="email" name="email" class="form-control"  value="{{$user->email}}" required>
                        
                    </div>
                            <div class="form-group">
                                <label for="password"><b>Password <span style="color: #d93025;">*</span></b></label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" onkeyup="passwordLength()" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="showPassword()"><i class="fas fa-eye" id="togglePassword" style=" cursor: pointer;"></i><i style="display: none;" id="hidepassword" class="fas fa-eye-slash"></i></span>
                                    </div>
                                </div>
                                <small id="length" class="form-text text-muted" >Use 8 or more characters</small>
                                <small id="invalidlength"  style="color:#d93025; display:none">Use 8 characters or more for your password</small>
                                
                            </div>
            <div class="form-group">
                                <label for="password"><b>Confirm Password <span style="color: #d93025;">*</span></b></label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" onkeyup="checkPassword()" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="showConfirmPassword()"><i class="fas fa-eye" id="toggleConfirmPassword" style=" cursor: pointer;"></i><i style="display: none;" id="hideConfirmPassword" class="fas fa-eye-slash"></i></span>
                                    </div>
                                    
                                </div>
                                <small id="errorpwd"  style="color:#d93025; display:none">Those passwords didn’t match. Try again.</small>
                                <small id="successfulpwd"  style="color:#05c054; display:none">Passwords match.</small>

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
                            Do you want to update profile details?
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


//Set timeout for hide status
const msgTimeout = setTimeout(hideMessage, 10000);


//Hide status
function hideMessage() {
    var elm1=document.getElementById("successMessage");
    if(elm1 !=null){
    document.getElementById("successMessage").style.display="none";
    }
    var elm2=document.getElementById("errorMessage");
    if(elm2){

        document.getElementById("errorMessage").style.display="none";
    }
    

}



//Display and hide password value
function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
      document.getElementById("togglePassword").style.display="none";
      document.getElementById("hidepassword").style.display="block";
    x.type = "text";
  } else {
    x.type = "password";
    document.getElementById("hidepassword").style.display="none";
      document.getElementById("togglePassword").style.display="block";
  }
}

//Display and hide confirm password value
function showConfirmPassword() {
  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
      document.getElementById("toggleConfirmPassword").style.display="none";
      document.getElementById("hideConfirmPassword").style.display="block";
    x.type = "text";
  } else {
    x.type = "password";
    document.getElementById("hideConfirmPassword").style.display="none";
      document.getElementById("toggleConfirmPassword").style.display="block";
  }
}

//Set max date
function setDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();

    if (dd < 10) {
    dd = '0' + dd;
    }

    if (mm < 10) {
    mm = '0' + mm;
    } 
        
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("dob").setAttribute("max", today);
}

//Check those password and confirm password are same
function checkPassword(){
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;
    if(password == confirmPassword){
        document.getElementById("successfulpwd").style.display="block";
        document.getElementById("errorpwd").style.display="none";
        if(password.length >= 8){
        document.getElementById("submit").disabled = false; 
        }
    }else{
        document.getElementById("successfulpwd").style.display="none";
        document.getElementById("errorpwd").style.display="block";
        document.getElementById("submit").disabled = true; 
    }
 
}

//Validate password length
function passwordLength(){
    var password = document.getElementById("password").value;
    document.getElementById("length").style.display="none";
    if(password.length < 8){
        document.getElementById("invalidlength").style.display="block";
        document.getElementById("submit").disabled = true; 
        
    }else{
        document.getElementById("invalidlength").style.display="none";
         
    }
}


</script>
