<?php
include "partials/header.php";
?>

  <div class="container index-container">
    <div class="row align-items-center h-100">
      <div class="col-sm-11 col-md-9 mx-auto">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h3 class="card-title text-center">WPoets Test</h3>
            <p>Please click on Setup to install DB and tables
              <br/>
              <a href="/setup.php" class="btn text-white border-light" >Setup</a> * Configure databse and site_url using config.php
            </p>
            <p>Please click on CRUD for crud functionality Or click on Result to view the Resuting page
              <br/>
              <a href="/crud.php" target="_blank" class="btn text-white border-light" >CRUD App</a>
              <a href="/view.php" target="_blank" class="btn text-white border-light float-right" > View Result Page </a>
            </p>
          </div>
        </div> <!-- card -->
      </div> <!-- col-11 -->
    </div> <!-- row -->
  </div> <!-- container -->

<?php
include "partials/footer.php";
?>