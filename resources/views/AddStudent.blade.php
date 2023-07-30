<?php
   include "includes/header.php";
?>
<div class="container">
    <div class="container  col-lg-9 col-md-11 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-1 col-sm-offset-0 col-xs-offset-0  ">
       <div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-10">
          <p class="page-header pt-3" style="text-align: center"><b>Apply for a quick visa</b></p>
          <div class="container">
            @if(Session::has('success'))
            <div class="alert alert-success">
               {{ Session::get('success') }}
            </div>
            @endif

            @if(Session::has('fail'))
            <div class="alert alert-danger">
               {{ Session::get('fail') }}
            </div>
            @endif
            <a href="{{ url('/view_all_visa') }}">View All Visa</a>
             <form class="form-horizontal" role="form" action="{{url('/AddStudent')}}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="mb-0">
                           <label for="exampleInputEmail1" class="form-label">Name:</label>
                           <input type="text" name="name" required class="form-control @error('name', 'post') is-invalid @enderror" value="{{ old('name') }}" >
                           @error('name')
                              <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                     </div>
                     <div class="mb-0">
                        <label for="exampleInputEmail1" class="form-label">Email:</label>
                        <input type="email" name="email" required class="form-control @error('email', 'post') is-invalid @enderror" value="{{ old('email') }}" >
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                     </div>
                     <div class="mb-0">
                        <label for="exampleInputEmail1" class="form-label">Phone:</label>
                        <input type="text" name="phone" required class="form-control @error('phone', 'post') is-invalid @enderror" value="{{ old('phone') }}" >
                        @error('phone')
                           <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                  </div>
                  <div class="mb-0">
                     <label for="exampleInputEmail1" class="form-label">Passport:</label>
                     <input type="text" name="passport" required class="form-control @error('passport', 'post') is-invalid @enderror" value="{{ old('passport') }}" >
                     @error('passport')
                        <strong class="text-danger">{{ $message }}</strong>
                     @enderror
               </div>
               <div class="mb-0">
                  <label for="exampleInputEmail1" class="form-label">Validity:</label>
                  <input type="date" name="validity" class="form-control @error('validity', 'post') is-invalid @enderror" value="{{ old('validity') }}" >
                  @error('validity')
                     <strong class="text-danger">{{ $message }}</strong>
                  @enderror
            </div>
            
                  </div>
                  <div class="col-sm-6">
                     <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Country:</label>
                        {{-- <input type="password" name="password" class="form-control" > --}}
                           <select name="country" id="dropdown" class="form-control country">
                              <option value="NULL">--Select Country--</option>
                              @foreach($data as $key => $value)
                                 <option value="{{ $key }}">{{ $value }}</option>
                              @endforeach
                           </select>
                        
                        </div>
                        <div class="mb-3">
                           <label for="exampleInputPassword1" class="form-label">Visa Type:</label>
                           <select name="visa_type" id="dropdown" class="form-control visa_type">
                              <option value="NULL">--Select Visa Type--</option>
                           </select>
                           </div>
                           <div class="mb-0">
                              <label for="exampleInputEmail1" class="form-label">Profession:</label>
                              <select name="profession" id="dropdown" class="form-control profession">
                                 <option value="">--Select Profession--</option>
                                 @foreach($profession as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                 @endforeach
                              </select>
                        </div>
                        <div class="mb-0">
                           <label for="exampleInputEmail1" class="form-label">Travel Date:</label>
                           <input type="date" name="travel_date" class="form-control @error('travel_date', 'post') is-invalid @enderror" value="{{ old('travel_date') }}" >
                           @error('name')
                              <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                        <div class="mb-0">
                           <label for="exampleInputEmail1" class="form-label">DOB:</label>
                           <input type="date" name="dob" class="form-control @error('dob', 'post') is-invalid @enderror" value="{{ old('dob') }}" >
                           @error('dob')
                              <strong class="text-danger">{{ $message }}</strong>
                           @enderror
                        </div>
                    
                  </div>
                     
               </div></
               <div class="form-group">
                  <div class="col-sm-offset-9 col-sm-3" style="margin-top:10px">
                     <button  class="btn btn-info col-lg-12 " data-toggle="modal" data-target="#info" name="submit">
                     Apply
                     </button>                            
                  </div>
               </div>
               
             </form>
             
          </div>
       </div>
    </div>
 </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>

<script>
   $('.country').change(function(){
      let id = $(this).val();
      $.ajax({
         type: "GET",
         url: "/get_country_wise_visa_type/"+id,
         success:function(data){
            let visa_types = JSON.parse(data);
            if(visa_types.found == true){
               // console.log('found');
               let visa = visa_types.visa_types;
               // console.log(visa);
               let visa_list = '';
               visa_list += '<option value="NULL">--Select Visa Type--</option>';
               $.each(visa, function(key, value){              
                  visa_list += '<option value="'+key+'">'+value+'</option>';
               });
               $('.visa_type').html(visa_list);
            }else{
               // console.log('not found');
            }
            // console.log(visa_types.visa_types);
         }
      })
   })
</script>
 </body>
 </html>