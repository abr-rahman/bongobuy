  <!-- /.content-wrapper -->
  <footer class="main-footer d-flex justify-content-between px-3">
      <div>
          &copy; {{ date('Y') }} Salamat Innovation | All Rights Reserved.
      </div>
          <div>
            <a href="#" onclick="document.getElementById('logoutForm').submit();">
                <i class="fas fa-power-off" style="color: red;"></i> <!-- Red power icon -->
                &nbsp;<strong>Logout</strong>
            </a>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
  </footer>
