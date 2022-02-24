
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fontawesome-all.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<h1 style="text-align: center;"><?=$_GET['$type']?></h1>
<hr>
<table class="table table-bordered table-hover" id="example">
                       <thead>
                          <tr>
                            <th id="t" scope="col">Sr.No. <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t" scope="col">Student Id <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t"scope="col">Name <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t" scope="col">Branch <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t"scope="col">Semester <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t" scope="col">Book Name <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t"scope="col">Book No <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t"scope="col">Isuue Date <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t" scope="col">Over Day <i class="fa fa-sort" aria-hidden="true"></th>
                            <th id="t" scope="col">Penalty 20 <i class="fas fa-rupee-sign"> / Day <i class="fa fa-sort" aria-hidden="true"></th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          
                          include "db.php";
                           $type=$_GET['$type'];
                            $tb= "SELECT * FROM `$type`";
                            $result =mysqli_query($con,$tb);
                          $i=1;
                          while($row = mysqli_fetch_assoc($result))
                          { 
                           ?>
                         
                          <tr>
                            <th><?=$i?></th>
                            <td><?=$row['enrollno']?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['branch']?></td>
                            <td><?=$row['sem']?></td>
                            <td><?=$row['bookname']?></td>
                            <td><?=$row['bookno']?></td>
                            <td><?=date("d-m-Y", strtotime($row['issueedate']))?></td>
                            <td><?=$row['overday']?></td>
                            <td><?=$row['penalty']?> <i class="fas fa-rupee-sign"></i></td>
                            
                          </tr>
                          <?php $i++; } ?>
                        </tbody>
                      </table>
                      
                          <script type="text/javascript">
                            
                            window.print();
                            setTimeout(window.close, 0); 
                      </script>