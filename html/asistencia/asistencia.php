<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Startmin - Bootstrap Admin Theme</title>

        <!-- Bootstrap Core CSS -->
        <link href="views/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="views/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="views/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="views/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <style>
    body {
     font: 24px Helvetica;
     background: #7c2323;
    }

    #main {

     margin: 0px;
     padding: 0px;
     display: -webkit-flex;
     display:         flex;
     -webkit-flex-flow: row;
             flex-flow: row;
     }

     #main > article {
        font: 12px Helvetica;
      margin: 4px;
      padding: 5px;
      border-radius: 7pt;
      -webkit-flex: 3 1 15%;
              flex: 3 1 15%;
      -webkit-order: 2;
              order: 2;
    background: #dddd88;
      }

     #main > nav {
      margin: 4px;
      padding: 5px;
      border: 1px solid #8888bb;
      border-radius: 7pt;
      background: #ccccff;
      -webkit-flex: 1 6 60%;
              flex: 1 6 60%;
      -webkit-order: 1;
              order: 1;

      }
     #main > movil {
      border: 1px solid #8888bb;
      border-radius: 7pt;
        -webkit-flex: 1 6 60%;
              flex: 1 6 60%;
      -webkit-order: 1;
              order: 1;


      }
      #canvas {
        width: 90%;
      }


    /* Too narrow to support three columns */
    @media all and (max-width: 600px) {

     #main, #page {
      -webkit-flex-flow: column;
              flex-flow: column;
     }

     #main > nav, #main > article {
      /* Return them to document order */
      -webkit-order: 0;
              order: 0;
     }

     article {
        font: 10px Helvetica;
        margin: auto;
        border-radius: 7pt;
        width: 98%;



      }
      .movil{
        width: 60%;

        margin: auto;
        text-align: center;
        border-radius: 7pt;
        background: #dddd88;
      }
    }
 </style>
 <script src="views/app/js/generales.js"></script>
<script src="views/jsqr/docs/jsQR.js"></script>
    <body>

       <div id='main'>

         <nav>
           <h5 align=center>ACERQUE LA IMAGEN QR A LA CAMARA </h5>
           <div id="loadingMessage">🎥 Unable to access video stream (please make sure you have a webcam enabled)</div>
           <center>
             <canvas id="canvas" hidden></canvas>
           </center>
         </nav>


          <article>
            <div class="movil">


            <div id="datos"></div>

            <div id="output" hidden>
              <div id="outputMessage">Codigo QR no detectado.</div>
              <div hidden><b>Data:</b> <span id="outputData"></span></div>
            </form>
            </div>    </div>
          </article>




       </div>



    <script type="text/javascript" src="views/tabla-dinamica/js/jquery.min.js"></script>
    <script type="text/javascript" src="views/tabla-dinamica/js/mio.js"></script>
        <!-- jQuery -->

        <!-- Bootstrap Core JavaScript -->
        <script src="views/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="views/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="views/js/startmin.js"></script>

    </body>
</html>
