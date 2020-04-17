<?php error_reporting(0);
$PageTitle ="Dashboard";
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $PageTitle;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
			<!--Toastr Dependencies -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
  
  </head>
  
  <body>
    <div class="d-flex align-items-stretch">
      
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
		 
            <h2 class="h5 no-margin-bottom"><i class="fa fa-server"></i> SERVER CONTROL PANEL</h2>
			
          </div>
        </div>
        <!-- Statistical Data  ( Virtual Host, Open Ports, Maximum Execution Time & Database) -->
<section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-user-1"></i></div><strong>Virtual Host</strong>
                    </div>
                    <div class="number dashtext-2" id="vhcount">
					
					</div>
                  </div>
		
                  <div class="progress progress-template" id="1pro">
				 
                    <div role="progressbar"  id="progress1" style="width: 5%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  
				  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
					
                      <div class="icon"><i class="icon-contract"></i></div><strong>open Ports</strong>
                    </div>
                    <div class="number dashtext-2" id="portcount"></div>
                  </div>
                  <div class="progress progress-template" id="2pro">

                    <div role="progressbar" id="progress1" style="width: 20%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>Max Exe Time</strong>
                    </div>
                    <div class="number dashtext-2" id="execount"></div>
                  </div>
                  <div class="progress progress-template" id="3pro">
				  
                    <div role="progressbar" id="progress3" style="width: 10%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="statistic-block block">
                  <div class="progress-details d-flex align-items-end justify-content-between">
                    <div class="title">
                      <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>Database</strong>
                    </div>
                    <div class="number dashtext-2" id="dbcount">  </div>
                  </div>
                  <div class="progress progress-template" id="4pro">
				  
                    <div role="progressbar" id="progress4" style="width: 55%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
		
		<!-- Add/Create Section ( Port & Database) -->
		<section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Add Port</strong></div>
                  <div class="block-body">
                    
                      <div class="form-group">
                        <label class="form-control-label">Port Number</label>
                        <input type="number" id="portno" placeholder="Ex : 4321, 8080, 9023" class="form-control">
                      </div>
                      <div class="form-group">       
                        <label class="form-control-label">Directory of Server</label>
                        <input type="text" id="dir" placeholder="Ex : D:/ServerFile/htdocs/" class="form-control">
						
                      </div>
                      <div class="form-group">       
                        <button type="submit" onclick="addport()" class="btn btn-primary">&nbsp;&nbsp;<i  class="fa fa-plus-square"></i>&nbsp;&nbsp;</button>
                      </div>
                    
                  </div>
                </div>
              </div>
			  
			  <div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Create Database</strong></div>
                  <div class="block-body">
                   <div class="form-group">       
                        <label class="form-control-label">SQL Server Version</label>
                        <input type="text" id="sqlversion"  value="" class="form-control">
						
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Database Name</label>
                        <input type="text" id="dbname" placeholder="Ex : db_name, mydatabase, newdb" class="form-control">
                      </div>
                      
                      <div class="form-group">       
                        <button type="submit" onclick="createdb()" class="btn btn-primary">&nbsp;&nbsp;<i class="fa fa-plus-square"></i>&nbsp;&nbsp;</button>
                      </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
		
		
		<!-- Delete Section ( Port & Database) -->
 <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              
			  <div class="col-lg-6">
			  <div class="block">
                  <div class="title"><strong>Delete Port</strong></div>
                  <div class="table-responsive"> 
                    <table  class="table table-striped table-hover" id="fetchtable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th style="text-align:center">Port Number</th>
                          <th style="text-align:center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <tr id="tabdata1">
                          <th scope="row">#</th>
                          <td align="center">No Port Found</td>
                          <td align="center">X</td>
						</tr>
						 <tr id="tabdata2">
                          <th scope="row">#</th>
                          <td align="center">No Port Found</td>
                          <td align="center">X</td>
						</tr>
						 <tr id="tabdata3">
                          <th scope="row">#</th>
                          <td align="center">No Port Found</td>
                          <td align="center">X</td>
						</tr>
			  </tbody>
                    </table>
                  </div>
                </div>
			  </div>
			  <div id="hiddenvalue" style="display: none">
			 
			  </div>
			  
			  
			  
			  
              <div class="col-lg-6">
			  <div class="block">
                  <div class="title"><strong>Delete Database</strong></div>
                  <div class="table-responsive"> 
                    <table  class="table table-striped table-hover" id="fetchdbtable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th style="text-align:center">Database Name</th>
                          <th style="text-align:center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
					  <tr id="tabdb1">
                          <th scope="row">#</th>
                          <td align="center">No Database Found</td>
                          <td align="center">X</td>
            </tr>
             <tr id="tabdb2">
                          <th scope="row">#</th>
                          <td align="center">No Database Found</td>
                          <td align="center">X</td>
            </tr>
             <tr id="tabdb3">
                          <th scope="row">#</th>
                          <td align="center">No Database Found</td>
                          <td align="center">X</td>
            </tr>
			  </tbody>
                    </table>
                  </div>
                </div>
			  </div>
			  
			  
			  
            </div>
          </div>
        </section>

 
 
 
        <!--Footer-->
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
                <p class="no-margin-bottom">Coded With ❤️ By <a target="_blank" href="https://facebook.com/HritikRit">Hritik R</a></p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">  </script> 
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
	
	<!-- Custom JavaScript files-->
	<script src="js/fetch.js"></script>
	<script src="js/query.js"></script>
	
  </body>
</html>