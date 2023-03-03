<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
      .rd {
        border: 1px solid red;
      }
      .bl {
        border: 1px solid blue;
      }
      .blk {
        border: 1px solid black;
      }
      .phoneBook {
        overflow: auto;
        max-height: 600px;
      }
      .modal-xx {
        max-width: 600px;
      }
    </style>

    <title>HOME / ADMINISTRATOR</title>
  </head>
  <body>

    <div class="container-fluid bg-info">
      <div class="row">
        <div class="col-sm-4 bg-white leftSide p-5">

            <div class="text-center">
              <img src="https://via.placeholder.com/150" alt="" class="src">
            </div>

            <div class="subHead pt-5">
              Subscribers
            </div>
            <div class="subButtons">
              <button type="button" class="btn btn-block btn-outline-secondary" data-toggle="modal" data-target="#addSubscribers">Add</button>
              <button type="button" class="btn btn-block btn-outline-secondary" id="subEdit">Edit</button>
              <button type="button" class="btn btn-block btn-outline-secondary" id="subDelete">Delete</button>
              <button type="button" class="btn btn-block btn-outline-secondary" id="subProviders">Providers</button>
            </div>

            <div class="pt-5">
              @if(session('status'))
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif
            </div>


        </div>

        <div class="col-sm-8 p-5 rightSide">
          <div class="searchPrevNext pb-3">
            <div class="row">
              <div class="searchBox col-sm-4">
                  <input type="text" id="searchPerson" class="form-control" placeholder="Search by name">
                </div>

                <div class="prevNext col-sm-8 text-right">
                  <button class="prev btn btn-secondary" id="prevButton">Prev</button>
                  <button class="nxt btn btn-secondary" id="nextButton">Next</button>
                </div>
            </div>
          </div>

          <div class="phoneBook table">
            <table class="table" id="subscriberTable">
              <thead class="thead-light">
                <tr>
                  <th scope="col">LASTNAME</th>
                  <th scope="col">FIRSTNAME</th>
                  <th scope="col">MIDDLENAME</th>
                  <th scope="col">GENDER</th>
                  <th scope="col">ADDRESS</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>


        </div>
      </div>
    </div>

    <!-- Toast -->

    <!-- Modals -->

    <!-- New Subscriber Info -->
    <div class="modal fade" id="addSubscribers" tabindex="-1" role="dialog" aria-labelledby="addSubscribers" aria-hidden="true">
      <div class="modal-dialog modal-xx modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">New Subscriber Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="newSubscriberForm" action="/add-subscriber" method="POST">
            @csrf
          <div class="modal-body">
            
              <div class="form-group row">
                <label for="inputFirstName" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputFirstName" name="firstname">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputMiddleName" class="col-sm-3 col-form-label">Middle Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputMiddleName" name="middlename">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputLastName" class="col-sm-3 col-form-label">Last Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputLastName" name="lastname">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputGender" class="col-sm-3 col-form-label">Gender</label>
                <div class="col-sm-9">
                  <select id="inputGender" class="form-control">
                    <option selected>Choose...</option>
                    <option>MALE</option>
                    <option>FEMALE</option>
                  </select>
                  <input type="hidden" id="gender-input" name="gender" value="">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <textarea class="form-control" id="inputAddress" rows="6" name="address"></textarea>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

          <input type="hidden" id="createddatetime" name="createddatetime" value="">
          <input type="hidden" id="updateddatetime" name="updateddatetime" value="">

        </form>
        </div>
      </div>
    </div>

    <!-- Providers -->
    <div class="modal fade" id="providers" tabindex="-1" role="dialog" aria-labelledby="providers" aria-hidden="true">
      <div class="modal-dialog modal-xx modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Providers</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
          </div>

          <div class="modal-footer">
            <div class="col-sm-6 text-left">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProviderPhone">Add</button>
              <button type="button" class="btn btn-secondary" id="deleteProviderBtn">Delete</button>
            </div>
            <div class="col-sm-6 text-right">
              <button type="button" class="btn btn-primary" id="saveProvider">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Add Provider and Phone No. -->
    <div class="modal fade" id="addProviderPhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Provider and Phone Number</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="provider">Provider:</label>
                <input type="text" class="form-control" id="provider" placeholder="Enter provider name">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" placeholder="Enter phone number">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="saveAddProviderPhone">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Warning</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <p>Please select a user first.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
    <!-- Custom JS Script -->
    <script>

      $(document).ready(function() {
        $.ajax({
          url: '/subscribers',
          success: function(data) {
            $('#subscriberTable > tbody').html(data);
          }
        });

        
        var now = new Date();
        var formattedDateTime = now.toISOString().slice(0, 19).replace('T', ' ');

        $('#createddatetime').val(formattedDateTime);
        $('#updateddatetime').val(formattedDateTime);

      });

      function getSelectedRows() {
        // Get selected row IDs
        var selectedRows = [];
        $('.table-primary').each(function(index) {
          var rowId = $(this).data('id');
          selectedRows.push(rowId);
        });

        // console.log(selectedRows);
        return selectedRows
      }

      function editSelectedRow() {

        var selectedRows = getSelectedRows();

        if (selectedRows.length == 0) {
          $( "#warningModal" ).modal('show');
        } else {
          // only edit if selectedRows is 1 else
          // give warning to user
          if (selectedRows.length == 1) {
            selectedRows.forEach(function(selectedRow) {
              console.log('You are editing', selectedRow);
            });
          } else {
            alert('You can only edit one row at a time');
          }
        }
      }

      function deleteSelectedRow() {

        var selectedRows = getSelectedRows();

        if (selectedRows.length == 0) {
          $( "#warningModal" ).modal('show');
        } else {
          selectedRows.forEach(function(selectedRow) {
            console.log('You are deleting', selectedRow);
          });
        }
      }

      function viewSelectedRowProviders(selectedRows) {

        if (selectedRows.length == 0) {
          $( "#warningModal" ).modal('show');
        } else {

        // as soon as the client clicks on a selected row
        // change also the content of the providers modal via AJAX
        // after changing the 


          if (selectedRows.length == 1) {
            selectedRows.forEach(function(selectedRow) {
              console.log('You are viewing providers for', selectedRow);
              $( "#providers" ).modal('show');
            });
          } else {
            alert('You can only view providers one row at a time');
          }
        }
      }

      // edit button
      $( "#subEdit" ).click(function() {
        // alert( "Edit button clicked." );
        editSelectedRow();
      });

      // delete button
      $( "#subDelete" ).click(function() {
        // alert( "Delete button clicked." );
        deleteSelectedRow();
      });

      // providers button
      $( "#subProviders" ).click(function() {
        // if (selectedId) {
        //   // Send an AJAX request to retrieve the providers for this subscriber
        //   $.ajax({
        //     url: '/providers/' + selectedId,
        //     success: function(data) {
        //       // Display the providers in a modal
        //       $('#providers').modal('show');
        //       $('#providers .modal-body').html(data);
        //     }
        //   });
        // } else {
        //   $( "#warningModal" ).modal('show');
        // }
      });

      // prevButton
      $( "#prevButton" ).click(function() {
        // alert( "Previous button clicked." );
        alert( "Previous button clicked." );
      });

      // nextButton
      $( "#nextButton" ).click(function() {
        // alert( "Next button clicked." );
        alert( "Next button clicked." );
      });


      // save new provider
      $( "#saveProvider" ).click(function() {
        $( "#providers" ).modal('hide');
        console.log( "Provider save button clicked. Reload page via AJAX" );
      });

      // add provider button
      $( "#saveAddProviderPhone" ).click(function() {
        alert("Save provider phone number clicked.")
        // as soon as this button is clicked
        // make two request to database, one is for storing the new entry
        // the other is retrieving and displaying the new entry to the database

      });

      $( "#deleteProviderBtn" ).click(function() {
        console.log('Delete provider button clicked');
      });

      // Detect changes to the search input field
      $('#searchPerson').on('input', function() {
        var searchValue = $(this).val();

        console.log(searchValue);

        {{-- 
          Send AJAX request to fetch filtered data
          $.ajax({
            url: '{{ route("search") }}',
            type: 'GET',
            data: { search: searchValue },
            success: function(response) {
              // Insert search results into table body
              $('#searchPerson').html(response);
            }
          });
        --}}
      });

      // new subscriber form submit
      $("#newSubscriberForm").submit(function(event){
        // Prevent the form from being submitted via the default method
        event.preventDefault();

        // Serialize the form data into a query string
        var formData = $(this).serialize();

        console.log(formData)

        $.ajax({
          url: $(this).attr('action'),
          type: $(this).attr('method'),
          data: formData,
          success: function(response) {
            $('#addSubscribers').modal('hide');
          },
          error: function(xhr) {
            $('#addSubscribers').modal('hide');
            console.log('error adding subscriber');
          }
        }).then(function() {
          $.ajax({
            type: "GET",
            url: "/subscribers",
            success: function(data) {
              $('#subscriberTable > tbody').html(data);
            },
            error: function(xhr) {
              console.log(xhr.responseText);
            }
          });
        });

      });


      $('#inputGender').change(function() {
        // Get the selected value
        var selectedValue = $(this).val();
        
        // Set the value of the hidden input field based on the selected value
        if (selectedValue === 'MALE') {
          $('#gender-input').val('M');
        } else if (selectedValue === 'FEMALE') {
          $('#gender-input').val('F');
        }
      });

    </script>

  
  </body>
</html>