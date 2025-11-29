<?php
include("conn.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
        <script src="ajax.js"></script>
        <title>Login</title>
    </head>
    <body>
        <div class="main-login">
            <div class="left-login">
               <img src="k.png" class="left-login-image" alt="Imagem animada">
            </div>
                    <form method="post">
            <div class="right-login">
                <div class="card-login">
                    <h1>LOGIN</h1>

                    <div class="textfield">
                      
                        <label for="usuario">Email Id</label>
                        <input type="text" name="email" placeholder="">
                    </div>
                    <div class="textfield">
                        <label for="senha">Password</label>
                        <input type="password" name="pass" placeholder="">
                    </div>
                    <button class="btn-login" name="sub">Login</button>
                </form>
                 <div class="check-message" id="checkmessage" style="    font-size: 28px;
    font-weight: 1000; color: #fff;"></div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST["sub"])) 
{

  $ema = $_POST["email"];
  $pas =$_POST["pass"];

  $q=mysqli_query($con,"select * from  p_a");
                $r=mysqli_fetch_array($q);
                $count = mysqli_num_rows($q);
                if($count==1)
                {

                     if($r)
                      {

                            $e=$r[1];
                             $p=$r[2];
                              $i=$r[0];
                           if($e==$ema && $p==$pas)
                            {
                                  session_start();
                                  $_SESSION ['pm']=$e;
                                   $_SESSION ['iii']=$i;
                                  if(isset($_SESSION["pm"]))
                                   {
                                      //print_r($_SESSION);
                                         //echo"sesoncreated";
                                         echo"<script type='text/javascript'>
                                               
                                                window.location.replace('wel.php');
                                              </script>";

                                            //header("location:wel.php");
                                    }
                                    else
                                    {
                                           echo"<script type='text/javascript'>
                                                  alert('session not started');
                                                </script>";
                                     }

                            }
                            elseif($e!=$ema && $p==$pas)
                            { ?>
                              <script type="text/javascript">
                                
                                 $("#checkmessage").text(' ');
                                $("#checkmessage").text('Email Id is Invalid');
                                      //alert('Email Id is Invalid');
                                      </script>
                          <?php  }
                            elseif($e==$ema && $p!=$pas)
                            { ?>
                           

                             <script type="text/javascript">
                                
                                $("#checkmessage").text(' ');
                               $("#checkmessage").text('Password is Invalid');
                                     //alert('Email Id is Invalid');
                                     </script>
                         <?php   }
                             else
                            { ?>
                              

<script type="text/javascript">
                                
                                $("#checkmessage").text(' ');
                               $("#checkmessage").text('Email id and Password is Invalid');
                                     //alert('Email Id is Invalid');
                                     </script>
                          <?php  }
                    
                    
                   
                      }
                      else
                      {
                          echo"<br>";
                      }
              }
      
  }
   else
  {
      echo"<br>";
  }
?>