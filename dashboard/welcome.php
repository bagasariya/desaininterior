  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
          Welcome
      </h1>
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">
     <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-body">

    		<h2>SELAMAT DATANG 
            <?php
                echo strtok(strtoupper($res['user_real_name'])," ");
            ?>
            </h2>

            Untuk memulai portofolio anda, lakukan langkah di bawah ini
            <ol>
                <li>Buat kategori terlebih dahulu</li>
                <li>Buat postingan dan pilih kategori</li>
                <li>Upload postingan anda dengan status published</li>
                <li>Lihat hasilnya pada web portofolio anda 
                <?php
                    echo "<a href='../u/" . $res['user_name'] . "'>disini</a>";
                ?>
                
                
                </li>
            <ol>

            </div>
            </div>
          </div>
          </div>
        </div>