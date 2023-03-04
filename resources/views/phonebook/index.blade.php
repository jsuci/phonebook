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
              <img src="https://i.imgur.com/mbFvwZf.png" alt="" class="src">
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
              <div class="alert" style="display: none;">
                  {{ session('status') }}
              </div>
            </div>


        </div>

        <div class="col-sm-8 p-5 rightSide">
          <div class="searchPrevNext pb-3">
            <div class="row">
              <div class="searchBox col-sm-4 pt-3">
                  <input type="text" id="searchPerson" class="form-control" placeholder="Search by name" name="name">
                </div>
            </div>
          </div>

          <div class="phoneBook table">
            {{-- <table class="table" id="subscriberTable">
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
            <div class="prevNext col-sm-12 text-right pt-3">
              <button class="prev btn btn-secondary" id="prevButton">Prev</button>
              <button class="nxt btn btn-secondary" id="nextButton">Next</button>
            </div> --}}
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
              <button type="button" class="btn btn-warning" id="editProviderBtn">Edit</button>
              <button type="button" class="btn btn-danger" id="deleteProviderBtn">Delete</button>
            </div>
            <div class="col-sm-6 text-right">
              {{-- <button type="button" class="btn btn-primary" id="saveProvider">Save changes</button> --}}
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
          <form id="addProviderPhoneForm" action="/add-provider" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="provider">Provider:</label>
                  <input type="text" class="form-control" id="provider" placeholder="Enter provider name" name="provider">
                </div>
                <div class="form-group">
                  <label for="phone">Phone Number:</label>
                  <input type="tel" class="form-control" id="phone" placeholder="Enter phone number" name="phoneno">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>

            <input type="hidden" id="headerid" name="headerid" value="">
          </form>
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
            // $('#subscriberTable > tbody').html(data);
            $('.phoneBook').html(data);
          }
        });

      });

      function notificationToast(className, textToDisplay) {
        var alertBox = $('.alert');
        alertBox.addClass(className);
        alertBox.text(textToDisplay);
        alertBox.fadeIn();
        setTimeout(function() {
          alertBox.fadeOut();
          alertBox.removeClass(className);
        }, 3000);
        
      }

      

    // edit button
    $( "#subEdit" ).click(function() {

      var selectedRow = $('.subscriber-row[data-id="' + selectedId + '"]');

      if (selectedId) {
        // console.log(selectedId)

        // Make the row editable
        selectedRow.find('td').attr('contenteditable', true);
        selectedRow.removeClass('table-primary');
        selectedRow.addClass('table-warning');
        

        selectedRow.find('td').on('keydown', function(e) {
          if (e.which === 13 || event.which === 27) {
              // User pressed the "Enter" key, save changes and make row uneditable
              var lastname = selectedRow.find('td:nth-child(1)').text().trim();
              var firstname = selectedRow.find('td:nth-child(2)').text().trim();
              var middlename = selectedRow.find('td:nth-child(3)').text().trim();
              var gender = selectedRow.find('td:nth-child(4)').text().trim();
              var address = selectedRow.find('td:nth-child(5)').text().trim();

              // Set the value of the hidden input field based on the selected value
              if (gender === 'MALE') {
                gender = 'M'
              } else if (gender === 'FEMALE') {
                gender = 'F'
              }

              // Call AJAX to save data
              $.ajax({
                  url: '/update-subscriber/' + selectedId,
                  type: 'POST',
                  data: {
                      lastname: lastname,
                      firstname: firstname,
                      middlename: middlename,
                      gender: gender,
                      address: address,
                      _token: '{{ csrf_token() }}'
                  },
                  success: function(response) {
                      // Show success message
                      notificationToast('alert-success', 'Subscriber updated successfully!')
                      console.log('Subscriber updated successfully!');
                  },
                  error: function(response) {
                      // Show error message
                      console.log('Error updating subsciber');
                      notificationToast('alert-danger', 'Error updating subsciber')
                  }
              });

              // Make the row non-editable
              selectedRow.find('td').attr('contenteditable', false);
              selectedRow.removeClass('table-warning');

              // Remove the "contenteditable" attribute from the row's cells
              selectedRow.find('td').removeAttr('contenteditable');

              // console.log(lastname, firstname)
          }
        });



        } else {
            notificationToast('alert-danger', 'Please select a subscriber')
        }
    });


    // pagination
    $(document).on('click', '.pagination .page-link', function(event) {
      event.preventDefault();
      
      var $link = $(this);
      var url = $link.attr('href');
    
      if ($link.attr('rel') == 'prev') {
          url = $('.pagination .page-item.active .page-link').attr('href');
      }

      console.log(url)
    
      $.ajax({
          url: url,
          dataType: 'html',
          success: function(data) {
            $('.phoneBook').html(data);
              // var $newEntries = $(data).find('.entry');
              // $('.entries').replaceWith($newEntries);
              
              // var $newPagination = $(data).find('.pagination');
              // $('.pagination').replaceWith($newPagination);
          }
      });
    });

    // Detect changes to the search input field
    $('#searchPerson').on('input', function() {
      var searchValue = $(this).val();

      console.log(searchValue);

      // Send AJAX request to fetch filtered data
      $.ajax({
        url: '/search-subscriber',
        type: 'GET',
        data: { search: searchValue },
        success: function(response) {
          // Insert search results into table body
          $('.phoneBook').html(response);
        }
      });

    });

    // new subscriber form submit
    $("#newSubscriberForm").submit(function(event) {
    // Prevent the form from being submitted via the default method
    event.preventDefault();

    // Serialize the form data into a query string
    var formData = $(this).serialize();

    // console.log(formData)

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: formData,
            success: function(response) {
                $('#addSubscribers').modal('hide');
                notificationToast('alert-success', 'Subscriber added successfully!')
            },
            error: function(xhr) {
                $('#addSubscribers').modal('hide');
                notificationToast('alert-danger', 'Error adding new subscriber')
            }
        }).then(function() {
            $.ajax({
            type: "GET",
            url: "/subscribers",
            success: function(data) {
                // $('#subscriberTable > tbody').html(data);
                $('.phoneBook').html(data);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
            });
        });
    });


    // add provider button
    $("#addProviderPhoneForm").submit(function(event) {
        // Prevent the form from being submitted via the default method
        event.preventDefault();
        
        // Serialize the form data into a query string
        var formData = $(this).serialize();
        
        console.log(formData)
        console.log(selectedId)


        $.ajax({
        url: $(this).attr('action'),
        type: $(this).attr('method'),
        data: formData,
        success: function(response) {
            $('#addProviderPhone').modal('hide');
            notificationToast('alert-success', 'Provider added successfully!')
        },
        error: function(xhr) {
            $('#addProviderPhone').modal('hide');
            notificationToast('alert-danger', 'Error adding new provider')
        }
        }).then(function() {
            $.ajax({
                type: "GET",
                url: '/providers/' + selectedId,
                success: function(data) {
                    $('#providers .modal-body').html(data);
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

    // providers button
    $( "#subProviders" ).click(function() {
        $('#headerid').val(selectedId);

        if (selectedId) {
        // Send an AJAX request to retrieve the providers for this subscriber
        $.ajax({
            url: '/providers/' + selectedId,
            success: function(data) {
            // Display the providers in a modal
            $('#providers').modal('show');
            $('#providers .modal-body').html(data);
            }
        });
        } else {
            notificationToast('alert-danger', 'Please select a subscriber')
        }
    });


    // delete subscriber button
    $( "#subDelete" ).click(function() {
        if (selectedId) {
            // Send an AJAX request to retrieve the providers for this subscriber
            $.ajax({
                url: '/delete-subscriber/' + selectedId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Add the CSRF token to the data
                },
                success: function(data) {
                    notificationToast('alert-success', 'Subscriber deleted successfully!')
                }
            }).then(function() {
                $.ajax({
                    type: "GET",
                    url: "/subscribers",
                    success: function(data) {
                      // $('#subscriberTable > tbody').html(data);
                      $('.phoneBook').html(data);
                    },
                    error: function(xhr) {
                    console.log(xhr.responseText);
                    }
                });
            });
        } else {
            notificationToast('alert-danger', 'Please select a subscriber')
        }
    });


    // delete provider button
    $('#deleteProviderBtn').click(function() {
        $('tr').removeClass('table-primary');
        $(this).toggleClass('table-primary');

        // console.log(selectedRowId, selectedId)

        if (selectedRowId) {
            // Send an AJAX request to retrieve the providers for this subscriber
            $.ajax({
                url: '/delete-provider/' + selectedRowId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}' // Add the CSRF token to the data
                },
                success: function(data) {
                    notificationToast('alert-success', 'Provider deleted successfully!')
                }
            }).then(function() {
                $.ajax({
                    type: "GET",
                    url: '/providers/' + selectedId,
                    success: function(data) {
                        $('#providers .modal-body').html(data);
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        } else {
            notificationToast('alert-danger', 'Please select a Provider')
        }
        
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


    // edit provider
    $('#editProviderBtn').click(function() {
        $('tr').removeClass('table-primary');
        $(this).toggleClass('table-primary');

        if (selectedRowId) {
            var selectedProvRow = $('.provider-row[data-id="' + selectedRowId + '"]');

            // Make the row editable
            selectedProvRow.find('td').attr('contenteditable', true);
            selectedProvRow.removeClass('table-primary');
            selectedProvRow.addClass('table-warning');

            selectedProvRow.find('td').on('keydown', function(e) {
                if (e.which === 13) {
                    // User pressed the "Enter" key, save changes and make row uneditable
                    var provider = selectedProvRow.find('td:nth-child(1)').text().trim();
                    var phoneno = selectedProvRow.find('td:nth-child(2)').text().trim();


                    // Call AJAX to save data
                    $.ajax({
                        url: '/update-provider/' + selectedRowId,
                        type: 'POST',
                        data: {
                            phoneno: phoneno,
                            provider: provider,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            // Show success message
                            notificationToast('alert-success', 'Provider updated successfully!')
                            console.log('Provider updated successfully!');
                        },
                        error: function(response) {
                            // Show error message
                            console.log('Error updating provider');
                            notificationToast('alert-danger', 'Error updating provider')
                        }
                    });

                    // Make the row non-editable
                    selectedProvRow.find('td').attr('contenteditable', false);
                    selectedProvRow.removeClass('table-warning');

                    // Remove the "contenteditable" attribute from the row's cells
                    selectedProvRow.find('td').removeAttr('contenteditable');

                }
            });
        }
    });

    </script>

  
  </body>
</html>