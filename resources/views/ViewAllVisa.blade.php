<?php
   include "includes/header.php";
?>
<div class="container">
    <div class="container">
       <div class="jumbotron login col-lg-10 col-md-11 col-sm-12 col-xs-10">
          <p class="page-header pt-3" style="text-align: center"><b>View All Visa</b></p>
          <div class="container">
           <table border=1>
            <thead>
               <th>Name</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Passport</th>
               <th>Validity</th>
               <th>Country</th>
               <th>Visa Type</th>
               <th>Profession</th>
               <th>Travel Date</th>
               <th>Date of Birth</th>
               {{-- <th>Action</th> --}}
            </thead>
            <tbody>
               @foreach($all_visa as $index=>$value)
               <tr>
                  <td>{{ $value->visa_name }}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->phone }}</td>
                  <td>{{ $value->passport }}</td>
                  <td>{{ $value->validity }}</td>
                  <td>{{ $value->country_name }}</td>
                  <td>{{ $value->visa_type }}</td>
                  <td>{{ $value->profession_name }}</td>
                  <td>{{ $value->travel_date }}</td>
                  <td>{{ $value->dob }}</td>
                  {{-- <td>Action</td> --}}
               </tr>
               @endforeach
            </tbody>
           </table>
          </div>
       </div>
    </div>
 </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 </body>
 </html>