@include('admin.top-header')

<div class="main-section">

  @include('admin.header')



  <div class="container-fluid">


    <!-- =========================================== Content body start =============================== -->
    <div class="row">
      <div class="col-12 mb-4 order-0">
        <div class="card">
          <div class="d-flex align-items-end row">
            <div class="col-sm-12">
              <div class="card-body">
                <h5 class="card-title text-primary">Congratulations {{ auth()->user()->name }}! 🎉</h5>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                  incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                  sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <!-- =========================================== Content body close =============================== -->

    @include('admin.footer')
  </div>

</div>



<script>

  $.ajaxSetup({

    headers: {

      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

  });

  $(document).ajaxStart(function () {

    $("#loader").modal('show');

  });

  $(document).ajaxComplete(function () {

    $("#loader").modal('hide');

  });

  setTimeout(function () {

    $.ajax({

      url: "{{ URL::to('get-chart-data') }}",

      type: "GET",

      dataType: "json",

      success: function (result) {

        console.log(result);

        new Chart(document.getElementById("sales-chart"), {

          type: 'pie',

          data: {

            labels: result.categoryname,

            datasets: [{

              label: "Sales By Category (this Week)",

              backgroundColor: ["#00b5b8", "#ff7588", "#16d39a"],

              data: result.categorycount

            }]

          },

          options: {

            title: {

              display: true,

              text: 'Sales By Category (this Week)'

            }

          }

        });

      }

    });

  }, 400);

  new Chart(document.getElementById("line-chart"), {

    type: 'line',

    data: {

      labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],

      datasets: [{

        data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],

        label: "Page Views",

        borderColor: "#16d39a",

        fill: false

      }, {

        data: [282, 350, 411, 502, 635, 809, 947, 1402, 3700, 5267],

        label: "Total Visits",

        borderColor: "#ffa87d",

        fill: false

      }, {

        data: [168, 170, 178, 190, 203, 276, 408, 547, 675, 734],

        label: "Unique Visitors",

        borderColor: "#ff7588",

        fill: false

      }]

    },

    options: {

      title: {

        display: true,

        text: 'Website Performance Statistics'

      }

    }

  });

</script>

<script>
  function deleteConfirmation(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: `{{ URL::to('admin/dashboard/enquiryDelete/${id}') }}`,
          type: "DELETE",
          dataType: "json",
          success: function (result) {
            if (result.success) {
              Swal.fire(
                'Deleted!',
                'success'
              );
              setTimeout(function () {
                location.reload();
              }, 400);
            } else {
              Swal.fire(result.msgText);
            }
          }
        });

      }
    })
  };
</script>