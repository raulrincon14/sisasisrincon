<!DOCTYPE html>
<html lang="en">
  <head>
    <style>

  body {
   font: 24px Helvetica;
   background: #999999;
  }

  #main {
   min-height: 100%;
   margin: 0px;
   padding: 0px;
   display: -webkit-flex;
   display:         flex;
   -webkit-flex-flow: row;
           flex-flow: row;
   }

  #main > article {
   margin: 4px;
   padding: 5px;
   border: 1px solid #cccc33;

   background: #dddd88;
   -webkit-flex: 3 1 60%;
           flex: 3 1 60%;
   -webkit-order: 2;
           order: 2;
   }



  #main > aside {
   margin: 4px;
   padding: 5px;
   border: 1px solid #8888bb;

   background: #ccccff;
   -webkit-flex: 1 6 20%;
           flex: 1 6 20%;
   -webkit-order: 3;
           order: 3;
   }

  header, footer {
   display: block;
   margin: 4px;
   padding: 5px;
   min-height: 100px;
   border: 1px solid #eebb55;

   background: #ffeebb;
   }

  /* Too narrow to support three columns */
  @media all and (max-width: 640px) {

   #main, #page {
    -webkit-flex-flow: column;
            flex-flow: column;
   }

   #main > article, #main > nav, #main > aside {
    /* Return them to document order */
    -webkit-order: 0;
            order: 0;
   }

  }

 </style>
  </head>
  <body>
  <div id='main'>
    <article>article</article>

    <aside>aside</aside>
 </div>

  </body>
</html>
