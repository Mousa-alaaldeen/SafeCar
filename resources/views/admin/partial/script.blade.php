<!-- Scripts below are for demo only -->
<script type="text/javascript" src="{{asset('assets')}}/js/main.min.js?v=1628755089081"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/chart.sample.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
<script src="https://cdn.jsdelivr.
net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>




<!------------------------------- Start services   ---------------------->
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




<!----------------------------------  Booking Service   --------------------------- -->

<script>
  document.getElementById('addBookingServiceBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Add New Booking Service',
      html: `
      <div style="display: flex; flex-direction: column; gap: 20px;">
        <!-- Booking ID -->
        <div style="display: flex; align-items: center; gap: 10px;">
          <label for="bookingId" style="font-weight: bold; min-width: 120px;">Booking ID</label>
          <input type="number" id="bookingId" class="swal2-input" placeholder="Booking ID" style="padding: 10px; font-size: 16px; border: 1px solid #ccc; width: 100%;">
        </div>
        <!-- Service ID -->
        <div style="display: flex; align-items: center; gap: 10px;">
          <label for="serviceId" style="font-weight: bold; min-width: 120px;">Service</label>
          <select id="serviceId" class="swal2-input">
            ${response.services.map(service => `
              <option value="${service.id}">${service.name}</option>
            `).join('')}
          </select>
        </div>
      </div>
    `,
      showCancelButton: true,
      confirmButtonText: 'Save',
      cancelButtonText: 'Cancel',
      preConfirm: () => {
        const bookingId = document.getElementById('bookingId').value;
        const serviceId = document.getElementById('serviceId').value;

        if (!bookingId || !serviceId) {
          Swal.showValidationMessage('Please fill out all fields.');
          return false;
        }

        const formData = new FormData();
        formData.append('booking_id', bookingId);
        formData.append('service_id', serviceId);

        return fetch('{{ url("booking-services") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to add booking service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Booking service added successfully!', 'success').then(() => {
          window.location.href = '{{ route("bookings-services.index") }}';
           fetch('{{ url("booking-services") }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to add booking service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Booking service added successfully!', 'success').then(() => {
          window.location.href = '{{route ("booking-services.index") }}';
 }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to add booking service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Booking service added successfully!', 'success').then(() => {
          window.location.href = '{{ route("booking-services.index") }}';
 }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to add booking service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Booking service added successfully!', 'success').then(() => {
          window.location.href = '{{ route("booking-services.index") }}';
) }}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to add booking service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Booking service added successfully!', 'success').then(() => {
          window.location.href = '{{route("booking-services.index")}}';
}}', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => response.json())
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to add booking service.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Booking service added successfully!', 'success').then(() => {
          window.location.href = '{{ route("booking-services.index") }}';
        });
      }
    });
  });
</script>


<script>
  function showBookingServiceDetails(bookingId, serviceId) {
    $.ajax({
      url: `/booking-services/${bookingId}/${serviceId}`,
      method: 'GET',
      success: function (response) {
        if (response.success) {
          let bookingService = response.bookingService;

          Swal.fire({
            title: 'Booking Service Details',
            html: `
          <form id="updateForm">
            <table style="width: 100%; text-align: left;">
            <tr>
            <td><strong>Service:</strong></td>
            <td>
              <select id="serviceId">
                ${response.services.map(service => `
                  <option value="${service.id}" ${service.id === bookingService.service_id ? 'selected' : ''}>${service.name}</option>
                `).join('')}
              </select>
            </td>
          </tr>

          <tr>
            <td><strong>Booking ID:</strong></td>
            <td>
              <select id="bookingId">
                ${response.bookings.map(booking => `
                  <option value="${booking.id}" ${booking.id === bookingId ? 'selected' : ''}>${booking.id}</option>
                `).join('')}
              </select>
            </td>
          </tr>

              
              <tr>
                <td><strong>Price:</strong></td>
                <td><input type="text" id="servicePrice" value="${bookingService.price}"></td>
              </tr>
              <tr>
                <td><strong>Description:</strong></td>
                <td><input type="text" id="serviceDescription" value="${bookingService.description}"></td>
              </tr>
              <tr>
                <td><strong>Booking Date:</strong></td>
                <td><input type="text" id="serviceBookingDate" value="${bookingService.booking_date}" disabled></td>
              </tr>
            </table>
          </form>
        `,
            showCancelButton: true,
            cancelButtonText: 'Cancel',
            confirmButtonText: 'Update',
            preConfirm: function () {
              const updatedService = {
                booking_id: document.getElementById('bookingId').value,
                service_id: document.getElementById('serviceId').value,
                price: document.getElementById('servicePrice').value,
                description: document.getElementById('serviceDescription').value
              };


              console.log('Updated Service:', updatedService);

              return updatedService;
            }
          }).then((result) => {
            if (result.isConfirmed) {
              const updatedService = result.value;

              $.ajax({
                url: `/booking-services/${bookingId}/${serviceId}`,
                method: 'PUT',
                data: JSON.stringify(updatedService),
                contentType: 'application/json',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (updateResponse) {
                  if (updateResponse.success) {
                    Swal.fire({
                      title: 'Success',
                      text: 'Booking service details updated successfully.',
                      icon: 'success',
                      confirmButtonText: 'Close'
                    });
                  } else {
                    Swal.fire({
                      title: 'Error',
                      text: updateResponse.message || 'Failed to update booking service details.',
                      icon: 'error',
                      confirmButtonText: 'Close'
                    });
                  }
                },
                error: function (xhr) {
                  console.error('Error response:', xhr.responseText);

                  Swal.fire({
                    title: 'Error',
                    text: xhr.responseText || 'Failed to update booking service details. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Close'
                  });
                }
              });
            }
          });
        } else {
          Swal.fire({
            title: 'Error',
            text: response.message || 'Failed to load booking service details.',
            icon: 'error',
            confirmButtonText: 'Close'
          });
        }
      },
      error: function (xhr) {
        console.error('Error response:', xhr.responseText);

        Swal.fire({
          title: 'Error',
          text: xhr.responseText || 'Failed to load booking service details.',
          icon: 'error',
          confirmButtonText: 'Close'
        });
      }
    });
  }

</script>
<script>
  function deleteBookingService(bookingId, serviceId) {

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
        document.getElementById(`delete-form-${bookingId}-${serviceId}`).submit();
      }
    });
  }
</script>


<!---------------------------------- END Booking Service--------------------------- -->
   










<!------------------------------- Start package   ---------------------->
<script>
  document.getElementById('addPackageBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Add New Package',
      html: `
        <div style="text-align: left;">
          <table style="width: 100%; border-spacing: 0 10px;">
            <tr>
              <td colspan="2">
                <label for="packageName" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Package Name:</label>
                <input type="text" id="packageName" 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label for="packagePrice" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Price:</label>
                <input type="number" id="packagePrice" 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" 
                       min="0" step="0.01">
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label for="packageDescription" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Description:</label>
                <textarea id="packageDescription" 
                          style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; height: 100px; resize: vertical;">
                </textarea>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label for="packageSize" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Size:</label>
                <select id="packageSize" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc;">
                  <option value="Small">Small</option>
                  <option value="Medium">Medium</option>
                  <option value="Large">Large</option>
                </select>
              </td>
            </tr>
            <tr>
              <td colspan="2">
                <label for="packageDuration" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Duration:</label>
                <select id="packageDuration" class="swal2-input" style="width: 100%; padding: 10px; font-size: 14px; border: 1px solid #ccc;">
                  <option value="Monthly">Monthly</option>
                  <option value="Yearly">Yearly</option>
                </select>
              </td>
            </tr>
          </table>
        </div>
      `,
      showCancelButton: true,
      confirmButtonText: 'Save',
      cancelButtonText: 'Cancel',
      preConfirm: () => {
        const name = document.getElementById('packageName').value.trim();
        const price = document.getElementById('packagePrice').value.trim();
        const size = document.getElementById('packageSize').value.trim();
        const duration = document.getElementById('packageDuration').value.trim();
        const description = document.getElementById('packageDescription').value.trim();

        if (!name || !price || !size || !duration || !description) {
          Swal.showValidationMessage('Please fill out all fields.');
          return false;
        }

        // Create FormData object to send data
        const formData = new FormData();
        formData.append('name', name);
        formData.append('price', price);
        formData.append('size', size);
        formData.append('duration', duration);
        formData.append('description', description);

        return fetch('{{ url("package") }}', {
          method: 'POST',
          headers: {
             'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          body: formData
        })
          .then(response => {
            if (!response.ok) {
              return response.text().then(text => {
                throw new Error(`Server Error: ${text}`);
              });
            }
            return response.json();
          })
          .then(data => {
            if (!data.success) {
              throw new Error(data.message || 'Failed to save package.');
            }
            return data;
          })
          .catch(error => {
            Swal.showValidationMessage(error.message);
            console.error('Error:', error); // Log for debugging
          });
      }
    }).then(result => {
      if (result.isConfirmed) {
        Swal.fire('Success', 'Package added successfully!', 'success').then(() => {
          window.location.href = '{{ route("package.index") }}'; // Reload or redirect
        });
      }
    });
  });
</script>



<script>
  function showPackageDetails(packageId) {
    $.ajax({
      url: '{{ url('package') }}/' + packageId,
      method: 'GET',
      success: function(response) {
        if (response.success) {
          // Show SweetAlert with package details
          Swal.fire({
            title: 'Package Details',
            html: `
              <div style="text-align: left;">
                <table style="width: 100%; border-spacing: 0 10px;">
                  <tr>
                    <td colspan="2">
                      <label for="packageName" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Package Name:</label>
                      <input type="text" id="packageName" value="${response.package.name}" 
                             style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="packagePrice" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Price:</label>
                      <input type="number" id="packagePrice" value="${response.package.price}" 
                             style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px;" 
                             min="0" step="0.01">
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="packageDescription" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Description:</label>
                      <textarea id="packageDescription" 
                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; font-size: 14px; height: 100px; resize: vertical;">
                        ${response.package.description}
                      </textarea>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="packageSize" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Size:</label>
                      <select id="packageSize" class="swal2-input" style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc;">
                        <option value="Small" ${response.package.size === 'Small' ? 'selected' : ''}>Small</option>
                        <option value="Medium" ${response.package.size === 'Medium' ? 'selected' : ''}>Medium</option>
                        <option value="Large" ${response.package.size === 'Large' ? 'selected' : ''}>Large</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <label for="packageDuration" style="font-weight: bold; font-size: 14px; margin-bottom: 5px; display: block;">Duration:</label>
                      <select id="packageDuration" class="swal2-input" style="width: 100%; padding: 10px; font-size: 16px; border: 1px solid #ccc;">
                        <option value="Monthly" ${response.package.duration === 'Monthly' ? 'selected' : ''}>Monthly</option>
                        <option value="Yearly" ${response.package.duration === 'Yearly' ? 'selected' : ''}>Yearly</option>
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
              let updatedName = document.getElementById('packageName').value;
              let updatedPrice = document.getElementById('packagePrice').value;
              let updatedDescription = document.getElementById('packageDescription').value;
              let updatedSize = document.getElementById('packageSize').value;
              let updatedDuration = document.getElementById('packageDuration').value;

              // Confirm update action
              return Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to update this package?",
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
                  formData.append('size', updatedSize);
                  formData.append('duration', updatedDuration);
                  formData.append('_token', '{{ csrf_token() }}');
                  formData.append('_method', 'PUT');

                  // Proceed to update
                  return $.ajax({
                    url: '{{ url('package') }}/' + packageId,
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(updateResponse) {
                      if (updateResponse.success) {
                        Swal.fire({
                          title: 'Success',
                          text: 'Package updated successfully!',
                          icon: 'success',
                          confirmButtonText: 'Close'
                        }).then(() => {
                          window.location.href = '{{ route('package.index') }}';
                        });
                      }
                    },
                    error: function(xhr) {
                      Swal.fire({
                        title: 'Error',
                        text: xhr.responseJSON?.message || 'Failed to update package.',
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
      error: function(xhr, status, error) {
        Swal.fire({
          title: 'Error',
          text: 'Package not found.',
          icon: 'error',
          confirmButtonText: 'Close'
        });
      }
    });
  }
</script>

<script>
  function packageDelete(packageId) {

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
        document.getElementById(`delete-form-${packageId}`).submit();
      }
    });
  }
</script>
<!------------------------------- End package   ---------------------->

















<!-- ================================ -->

<!-- Employee -->
<script>
  // Trigger SweetAlert for confirmation before updating
  document.querySelectorAll('.updateEmployeeBtn').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault(); // Prevent default form submission

      const employeeId = this.dataset.employeeId; // Get employee id from the button

      Swal.fire({
        title: 'Are you sure you want to update?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, update it!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // If confirmed, submit the form
          document.getElementById(`updateForm-${employeeId}`).submit();
        }
      });
    });
  });

  // Display SweetAlert success message after updating
  @if (session('success'))
    Swal.fire({
    title: 'Updated!',
    text: '{{ session('success') }}',
    icon: 'success',
    confirmButtonText: 'OK'
    });
  @endif
</script>
