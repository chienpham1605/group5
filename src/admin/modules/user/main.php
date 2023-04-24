<?php
include_once '../../db/DBConnect.php';
include_once '../../db/database.php';
#4. Excute query
    $query = "select * from customer";
    $rs       = mysqli_query($conn, $query);
    $count = mysqli_num_rows($rs);
?>

        <?php require_once '../../lib/template.php';
        get_header();?>
        
        <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
        
         <section class="section">
      <div class="row">
        <div class="col-xl-20">
        <div class="card">
            <div class="card-body ">
              <h5 class="card-title">Infomation user</h5>
             
         
        <table class="table datatable">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">address</th>
                <th scope="col">gender</th>
                <th scope="col">block</th>
                
            </tr>
            </thead>
            
           <tbody>
    <?php
    if($count ==0):
        echo 'Record not found!';
    else:
        while($fields = mysqli_fetch_array($rs)):
   
    ?>
            
            <tr>
                <td><?= $fields[0]?></td>
                <td><?= $fields[1]?></td>
                <td><?= $fields[3]?></td>
                <td><?= $fields[4]?></td>
                <td><?= $fields[5]?></td>
                <td><?= $fields[6]?></td>
                <td><?= $fields[7]?></td>
                <td>
                    <a href="edit.php?id=<?= $fields[0]  ?>">Edit</a>
                   
                    
                </td>
            </tr>
            
    <?php
                endwhile;
        endif;
    ?>
            </tbody>
        </table>

            </div>
          </div>

        </div>
      </div>
    </section>
        </main>
<?php get_footer();  ?>
   
</body>
</html>
