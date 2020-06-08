<html>
  <head>
    <title>My Example</title>
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
  </head>
  <body>
    <div class="container-fluid">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#flipFlop">
        Click Me
      </button>
      <!-- The modal -->
      <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="modalLabel">Flip-flop</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              A type of open-toed sandal.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

    <!-- Initialize Bootstrap functionality -->
    <script type="text/javascript">
       // Initialize tooltip component
       $(function () {
          $('[data-toggle="tooltip"]').tooltip()
       })

      // Initialize popover component
      $(function () {
         $('[data-toggle="popover"]').popover()
      })
    </script>
  </body>
</html>