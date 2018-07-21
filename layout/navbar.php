<div class="navbar navbar-inverse navbar-static-top">
    <div class="container">
       <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
       </button>

        <div class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav navbar-justified">
            <li class=""><a href="user.php">Daftar Kursus</a></li>
            <li><a href="logkursus.php">Progres Log</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="profil.php">
                <!--
                <button class="btn btn-primary btn-sm" type="submit">
                  -->
                  <strong>
                    <?php echo $profil['nama_lengkap']  ?>
                  </strong>
              <!--
                </button>
              -->
              </a>
            </li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div>  
    </div>
</div>