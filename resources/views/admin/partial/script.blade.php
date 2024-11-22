<!-- Scripts below are for demo only -->
<script type="text/javascript" src="{{asset('assets')}}/js/main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/chart.sample.min.js"></script>


<script>
  !function (f, b, e, v, n, t, s) {
    if (f.fbq) return; n = f.fbq = function () {
      n.callMethod ?
        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
    n.queue = []; t = b.createElement(e); t.async = !0;
    t.src = v; s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
  }(window, document, 'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1" /></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>















<!------------------------------- Start Users   ---------------------->

<script>
  function showUserDetails(userId) {
    $.ajax({
      url: `/users/${userId}`,
      method: 'GET',
      success: function (response) {
        if (response.success) {
          let userImage = response.user.image
            ? `/storage/${response.user.image}`
            : '/assets/img/user-placeholder.png';
          Swal.fire({
            title: 'User Details',
            html: `
            <div style="text-align: left;">
              <table style="width: 100%; border-spacing: 0 10px;">
                <tr>
                  <td style="text-align: center; vertical-align: middle; width: 100px;">
                    <img src="${userImage}" 
                      alt="${response.user.name}" 
                      style="max-width: 100px; height: 100px; border-radius: 10px; object-fit: cover;">
                  </td>
                  <td>
                    <input type="file" id="userImage" accept="image/*" style="display: block; width: 100%; padding: 8px;">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="userName">User Name:</label>
                    <input type="text" id="userName" value="${response.user.name}" style="width: 100%; padding: 8px;">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="userEmail">Email:</label>
                    <input type="email" id="userEmail" value="${response.user.email}" style="width: 100%; padding: 8px;">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="userPhone">Phone:</label>
                    <input type="text" id="userPhone" value="${response.user.phone}" style="width: 100%; padding: 8px;">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label for="registrationDate">Registration Date:</label>
                    <input type="date" id="registrationDate" value="${response.user.registration_date}" style="width: 100%; padding: 8px;">
                  </td>
                </tr>
              </table>
            </div>
          `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Close',
            preConfirm: () => {
              let updatedData = new FormData();
              updatedData.append('name', document.getElementById('userName').value);
              updatedData.append('email', document.getElementById('userEmail').value);
              updatedData.append('phone', document.getElementById('userPhone').value);
              updatedData.append('registration_date', document.getElementById('registrationDate').value);

              let imageFile = document.getElementById('userImage').files[0];
              if (imageFile) {
                updatedData.append('image', imageFile);
              }

              updatedData.append('_method', 'PUT');

              return $.ajax({
                url: `/users/${userId}`,
                method: 'POST',
                data: updatedData,
                processData: false,
                contentType: false,
                success: function (updateResponse) {
                  if (updateResponse.success) {
                    Swal.fire('Success', 'User updated successfully!', 'success');
                  }
                },
                error: function (xhr) {
                  Swal.fire('Error', xhr.responseJSON.message || 'Failed to update user.', 'error');
                }
              });
            }
          });
        }
      },
      error: function () {
        Swal.fire('Error', 'User not found.', 'error');
      }
    });
  }

</script>

<script>
  function confirmDelete(userId) {

    Swal.fire({
      title: 'Are you sure?',
      text: "This action cannot be undone!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(`delete-form-${userId}`).submit();
      }
    });
  }
</script>
<!------------------------------- End Users   ---------------------->


<!------------------------------- Start services   ---------------------->
<script>
  document.getElementById('addServiceBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Add New Service',
      html: `
        <div style="display: flex; flex-direction: column; gap: 20px;">

          <!-- Service Name -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="serviceName" style="font-weight: bold; min-width: 120px;">Service Name</label>
            <input type="text" id="serviceName" class="swal2-input" placeholder="Service Name" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- Service Price -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="servicePrice" style="font-weight: bold; min-width: 120px;">Price</label>
            <input type="number" id="servicePrice" class="swal2-input" placeholder="Price" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;" min="0" step="0.01">
          </div>

          <!-- Service Description -->
          <div style="display: flex; align-items: flex-start; gap: 10px;">
            <label for="serviceDescription" style="font-weight: bold; min-width: 120px; vertical-align: top;">Description</label>
            <textarea id="serviceDescription" class="swal2-input" placeholder="Service Description" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; resize: vertical; height: 150px; width: 100%;"></textarea>
          </div>

          <!-- Service Image -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="serviceImage" style="font-weight: bold; min-width: 120px;">Service Image</label>
            <input type="file" id="serviceImage" class="swal2-input" accept="image/*" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

        </div>
      `,
      showCancelButton: true,
      confirmButtonText: 'Save',
      cancelButtonText: 'Cancel',
      preConfirm: () => {
        const name = document.getElementById('serviceName').value;
        const price = document.getElementById('servicePrice').value;
        const description = document.getElementById('serviceDescription').value;
        const image = document.getElementById('serviceImage').files[0];

        if (!name || !price || !description) {
          Swal.showValidationMessage('Please fill out all fields.');
          return false;
        }

        // Create FormData object to handle file upload
        const formData = new FormData();
        formData.append('name', name);
        formData.append('price', price);
        formData.append('description', description);
        if (image) {
          formData.append('image', image);
        }

        return fetch('{{ url("services") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to save service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Service added successfully!', 'success').then(() => {
          // Reload the page or redirect
          window.location.href = '{{ route("services.index") }}';
        });
      }
    });
  });
</script>
<script>
  function showServiceDetails(serviceId) {
    $.ajax({
      url: '{{ url('services') }}/' + serviceId,
      method: 'GET',
      success: function (response) {
        if (response.success) {
          let serviceImage = response.service.image
            ? "{{ asset('storage/services') }}/" + response.service.image
            : "{{ asset('assets/img/service.png') }}";

          Swal.fire({
            title: 'Service Details',
            html: `
              <div style="text-align: left;">
                <table style="width: 100%; border-spacing: 0 10px;">
                  <tr>
                    <td style="text-align: center; vertical-align: middle; width: 100px;">
                      <img src="${serviceImage}" 
                        alt="${response.service.name}" 
                        style="max-width: 100px; height: 100px; border-radius: 10px; object-fit: cover; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    </td>
                    <td>
                      <input type="file" id="serviceImage" 
                        accept="image/*" 
                        style="display: block; width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="serviceName" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Service Name:</label>
                      <input type="text" id="serviceName" 
                        value="${response.service.name}" 
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="servicePrice" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Price:</label>
                      <input type="number" id="servicePrice" 
                        value="${response.service.price}" 
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" min="0" step="0.01">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="serviceDescription" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Description:</label>
                      <textarea id="serviceDescription" 
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; height: 100px; resize: vertical;">
                        ${response.service.description}
                      </textarea>
                    </td>
                  </tr>
                </table>
              </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Close',
            preConfirm: () => {
              let updatedName = document.getElementById('serviceName').value;
              let updatedPrice = document.getElementById('servicePrice').value;
              let updatedDescription = document.getElementById('serviceDescription').value;
              let imageFile = document.getElementById('serviceImage').files[0];

              // Confirm update action
              return Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update this service?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel'
              }).then(result => {
                if (result.isConfirmed) {
                  let formData = new FormData();
                  formData.append('name', updatedName);
                  formData.append('price', updatedPrice);
                  formData.append('description', updatedDescription);

                  if (imageFile) {
                    formData.append('image', imageFile);
                  }

                  formData.append('_token', '{{ csrf_token() }}');
                  formData.append('_method', 'PUT');

                  // Proceed to update
                  return $.ajax({
                    url: '{{ url('services') }}/' + serviceId,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (updateResponse) {
                      if (updateResponse.success) {
                        Swal.fire({
                          title: 'Success',
                          text: 'Service updated successfully!',
                          icon: 'success',
                          confirmButtonText: 'Close'
                        }).then(() => {
                          window.location.href = '{{ route('services.index') }}';
                        });
                      }
                    },
                    error: function (xhr) {
                      Swal.fire({
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Failed to update service.',
                        icon: 'error',
                        confirmButtonText: 'Close'
                      });
                    }
                  });
                }
              });
            }
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: 'Error',
          text: 'Service not found.',
          icon: 'error',
          confirmButtonText: 'Close'
        });
      }
    });
  }
</script>
<script>
  function confirmDelete(serviceId) {

    Swal.fire({
      title: 'Are you sure?',
      text: "This action cannot be undone!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById(`delete-form-${serviceId}`).submit();
      }
    });
  }
</script>
<!------------------------------- End services   ---------------------->
<!------------------------------- start  SubscriptionBtn  ---------------------->
<script>
  document.getElementById('addSubscriptionBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Add New Subscription',
      html: `
        <div style="display: flex; flex-direction: column; gap: 20px;">

          <!-- User ID -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="userId" style="font-weight: bold; min-width: 120px;">User ID</label>
            <input type="text" id="userId" class="swal2-input" placeholder="User ID" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- Plan Type -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="planType" style="font-weight: bold; min-width: 120px;">Plan Type</label>
            <input type="text" id="planType" class="swal2-input" placeholder="Plan Type" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- Start Date -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="startDate" style="font-weight: bold; min-width: 120px;">Start Date</label>
            <input type="date" id="startDate" class="swal2-input" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- End Date -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="endDate" style="font-weight: bold; min-width: 120px;">End Date</label>
            <input type="date" id="endDate" class="swal2-input" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

        </div>
      `,
      showCancelButton: true,
      confirmButtonText: 'Save',
      cancelButtonText: 'Cancel',
      preConfirm: () => {
        const userId = document.getElementById('userId').value;
        const planType = document.getElementById('planType').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (!userId || !planType || !startDate || !endDate) {
          Swal.showValidationMessage('Please fill out all fields.');
          return false;
        }

        // Create FormData object to handle data submission
        const formData = new FormData();
        formData.append('user_id', userId);
        formData.append('plan_type', planType);
        formData.append('start_date', startDate);
        formData.append('end_date', endDate);

        return fetch('{{ url("subscriptions") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to save subscription.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Subscription added successfully!', 'success').then(() => {

        });
      }
    });
  });
</script>


<script>
  document.getElementById('addSubscriptionBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Add New Subscription',
      html: `
        <div style="display: flex; flex-direction: column; gap: 20px;">

          <!-- User ID -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="userId" style="font-weight: bold; min-width: 120px;">User ID</label>
            <input type="text" id="userId" class="swal2-input" placeholder="User ID" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- Plan Type -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="planType" style="font-weight: bold; min-width: 120px;">Plan Type</label>
            <input type="text" id="planType" class="swal2-input" placeholder="Plan Type" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- Start Date -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="startDate" style="font-weight: bold; min-width: 120px;">Start Date</label>
            <input type="date" id="startDate" class="swal2-input" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

          <!-- End Date -->
          <div style="display: flex; align-items: center; gap: 10px;">
            <label for="endDate" style="font-weight: bold; min-width: 120px;">End Date</label>
            <input type="date" id="endDate" class="swal2-input" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
          </div>

        </div>
      `,
      showCancelButton: true,
      confirmButtonText: 'Save',
      cancelButtonText: 'Cancel',
      preConfirm: () => {
        const userId = document.getElementById('userId').value;
        const planType = document.getElementById('planType').value;
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (!userId || !planType || !startDate || !endDate) {
          Swal.showValidationMessage('Please fill out all fields.');
          return false;
        }

        // Create FormData object to handle data submission
        const formData = new FormData();
        formData.append('user_id', userId);
        formData.append('plan_type', planType);
        formData.append('start_date', startDate);
        formData.append('end_date', endDate);

        return fetch('{{ url("subscriptions") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to save subscription.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Subscription added successfully!', 'success').then(() => {

        });
      }
    });
  });
</script>
<script>
  function showSubscriptionDetails(subscriptionId) {
    $.ajax({
      url: '{{ url('subscriptions') }}/' + subscriptionId,
      method: 'GET',
      success: function (response) {
        if (response.success) {
          Swal.fire({
            title: 'Subscription Details',
            html: `
              <div style="text-align: left;">
                <table style="width: 100%; border-spacing: 0 10px;">
                  <tr>
                    <td style="width: 200px;">
                      <label for="userId" style="font-weight: bold;">User ID:</label>
                      <input type="text" id="userId" value="${response.subscription.user_id}" 
                             style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                    </td>
                    <td style="width: 200px;">
                      <label for="planType" style="font-weight: bold;">Plan Type:</label>
                      <input type="text" id="planType" value="${response.subscription.plan_type}" 
                             style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="startDate" style="font-weight: bold;">Start Date:</label>
                      <input type="date" id="startDate" value="${response.subscription.start_date}" 
                             style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                    </td>
                    <td>
                      <label for="endDate" style="font-weight: bold;">End Date:</label>
                      <input type="date" id="endDate" value="${response.subscription.end_date}" 
                             style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px;">
                    </td>
                  </tr>
                </table>
              </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Close',
            preConfirm: () => {
              let updatedUserId = document.getElementById('userId').value;
              let updatedPlanType = document.getElementById('planType').value;
              let updatedStartDate = document.getElementById('startDate').value;
              let updatedEndDate = document.getElementById('endDate').value;

              // Confirm update action
              return Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update this subscription?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel'
              }).then(result => {
                if (result.isConfirmed) {
                  let formData = new FormData();
                  formData.append('user_id', updatedUserId);
                  formData.append('plan_type', updatedPlanType);
                  formData.append('start_date', updatedStartDate);
                  formData.append('end_date', updatedEndDate);

                  formData.append('_token', '{{ csrf_token() }}');
                  formData.append('_method', 'PUT');

                  // Proceed to update
                  return $.ajax({
                    url: '{{ url('subscriptions') }}/' + subscriptionId,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (updateResponse) {
                      if (updateResponse.success) {
                        Swal.fire({
                          title: 'Success',
                          text: 'Subscription updated successfully!',
                          icon: 'success',
                          confirmButtonText: 'Close'
                        }).then(() => {

                        });
                      }
                    },
                    error: function (xhr) {
                      Swal.fire({
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Failed to update subscription.',
                        icon: 'error',
                        confirmButtonText: 'Close'
                      });
                    }
                  });
                }
              });
            }
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: 'Error',
          text: 'Subscription not found.',
          icon: 'error',
          confirmButtonText: 'Close'
        });
      }
    });
  }
</script>
<!------------------------------- end  SubscriptionBtn  ---------------------->


<!------------------------------- start  Booking  ---------------------->
<script>
  function showBookingDetails(bookingId) {
    
    $.ajax({
      url: '{{ url('bookings') }}/' + bookingId,
      method: 'GET',
      success: function (response) {
        
        if (response.success) {
          Swal.fire({
            title: 'Booking Details',
            html: `
              <div style="text-align: left;">
                <table style="width: 100%; border-spacing: 0 10px;">
                 <tr>
                    <td colspan="2" style="display: flex; gap: 10px;">
                      <div style="flex: 1;">
                        <label for="userId" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Customer ID:</label>
                        <input type="number" id="userId" 
                          value="${response.booking.user_id || 'N/A'}" 
                          style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" readonly>
                      </div>
                      <div style="flex: 1;">
                        <label for="userName" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Name:</label>
                        <input type="text" id="userName" 
                          value="${response.booking.user ? response.booking.user.full_name : 'N/A'}" 
                          style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" readonly>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" style="display: flex; gap: 10px;">
                      <div style="flex: 1;">
                        <label for="userEmail" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Email:</label>
                        <input type="email" id="userEmail" 
                          value="${response.booking.user ? response.booking.user.email : 'N/A'}" 
                          style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" readonly>
                      </div>
                      <div style="flex: 1;">
                        <label for="userPhone" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Phone:</label>
                        <input type="text" id="userPhone" 
                          value="${response.booking.user ? response.booking.user.phone : 'N/A'}" 
                          style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" readonly>
                      </div>
                    </td>
                  </tr>

                  <tr>
                  <td colspan="2">
                      <label for="serviceId" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Service:</label>
                      <select id="serviceId" 
                          style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                          ${response.services && response.services.length > 0 ?
                              response.services.map(service => `
                                  <option value="${service.id}" ${response.booking.service_id === service.id ? 'selected' : ''}>${service.name}</option>
                              `).join('') :
                              '<option disabled>No services available</option>'
                            }
                      </select>
                  </td>
              </tr>
                  <tr>
                    <td colspan="2">
                      <label for="bookingDate" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Booking Date:</label>
                      <input type="date" id="bookingDate" 
                        value="${response.booking.booking_date.split(' ')[0]}" 
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="bookingTime" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Booking Time:</label>
                      <select id="bookingTime" 
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                        <option value="11-12" ${response.booking.booking_date.includes('11:00') ? 'selected' : ''}>11:00 - 12:00</option>
                        <option value="12-1" ${response.booking.booking_date.includes('12:00') ? 'selected' : ''}>12:00 - 1:00</option>
                        <option value="1-2" ${response.booking.booking_date.includes('13:00') ? 'selected' : ''}>1:00 - 2:00</option>
                        <option value="2-3" ${response.booking.booking_date.includes('14:00') ? 'selected' : ''}>2:00 - 3:00</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="bookingStatus" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Status:</label>
                      <select id="bookingStatus" 
                        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                        <option value="pending" ${response.booking.status === 'pending' ? 'selected' : ''}>Pending</option>
                        <option value="confirmed" ${response.booking.status === 'confirmed' ? 'selected' : ''}>Confirmed</option>
                        <option value="cancelled" ${response.booking.status === 'cancelled' ? 'selected' : ''}>Cancelled</option>
                      </select>
                    </td>
                  </tr>
                </table>
              </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Update',
            cancelButtonText: 'Close',
            preConfirm: () => {
              let updatedUserId = document.getElementById('userId').value;
              let updatedServiceId = document.getElementById('serviceId').value;
              let updatedBookingDate = document.getElementById('bookingDate').value;
              let updatedBookingTime = document.getElementById('bookingTime').value;
              let updatedStatus = document.getElementById('bookingStatus').value;

              // دمج التاريخ مع الوقت بصيغة "YYYY-MM-DD HH:MM:SS"
              let timeMapping = {
                '11-12': '11:00:00',
                '12-1': '12:00:00',
                '1-2': '13:00:00',
                '2-3': '14:00:00',
              };
              let bookingDatetime = `${updatedBookingDate} ${timeMapping[updatedBookingTime]}`;

              return Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update this booking?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel'
              }).then(result => {
                if (result.isConfirmed) {
                  let formData = new FormData();
                  formData.append('user_id', updatedUserId);
                  formData.append('service_id', updatedServiceId);
                  formData.append('booking_date', bookingDatetime); // إرسال التاريخ والوقت المدمج
                  formData.append('status', updatedStatus);

                  formData.append('_token', '{{ csrf_token() }}');
                  formData.append('_method', 'PUT');

                  return $.ajax({
                    url: '{{ url('bookings') }}/' + bookingId,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (updateResponse) {
                      if (updateResponse.success) {
                        Swal.fire({
                          title: 'Success',
                          text: 'Booking updated successfully!',
                          icon: 'success',
                          confirmButtonText: 'Close'
                        }).then(() => {
                          window.location.href = '{{ route('bookings.index') }}';
                        });
                      }
                    },
                    error: function (xhr) {
                      Swal.fire({
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Failed to update booking.',
                        icon: 'error',
                        confirmButtonText: 'Close'
                      });
                    }
                  });
                }
              });
            }
          });
        }
      },
      error: function (xhr, status, error) {
        Swal.fire({
          title: 'Error',
          text: 'Booking not found.',
          icon: 'error',
          confirmButtonText: 'Close'
        });
      }
    });
  }
</script>






<!------------------------------- End  Booking  ---------------------->