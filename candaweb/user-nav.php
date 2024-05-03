<style>
  nav {
    background-color: #7287C0;
    box-shadow: none;
  }
  .navbar-nav .nav-item {
		border-bottom: 2px solid transparent;
		transition: border-bottom 0.3s ease;
	}

	.navbar-nav .nav-item:hover {
		border-bottom: 4px solid white;
		/* Border bottom color on hover */
	}
	.navbar-nav .nav-item .nav-link:hover{
		color: white;
	}
  .logout{
    background-color: #202A5B;
    color: white;
    font-weight: bold;
  }
  .logout:hover{
    background-color: red;
    color: black;
    font-weight: bold;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brands" href="#">Canda<span style="color: #202A5B;">Web</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white ml-4 mr-4" href="user-interface.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-4 mr-4" href="user-profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-4 mr-4" href="user-request.php">Request</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-4 mr-4" href="user-officials.php">Officials</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white ml-4 mr-4" href="contact.php">Contact</a>
      </li>
    </ul>
    <a class="btn logout" href="#" style="border-radius: 20px;" data-toggle="modal" data-target="#logoutModal">Logout</a>
  </div>
</nav>
<!-- Add this modal at the end of your HTML body -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
        <a href="logout.php" class="btn btn-danger">Yes, Logout</a>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
