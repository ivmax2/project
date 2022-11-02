    <head>
        <meta charset = "UTF-8">
        <title>烤餅乾</title>
        <link rel="stylesheet" type="text/css" href="../new_index/style/index.css">
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <style type="text/css">  /*彈跳視窗*/
            #fade {
              display:none;
              position:absolute;
              top:0%;
              left:0%;
              width:100%;
              height:100%;
              background-color:black;
              z-index:1001;
              -moz-opacity:0.8;
              opacity:.80;
              filter:alpha(opacity=80);
            }
            #light{
              display:none;
              position:absolute;
              top:25%;
              left:25%;
              width:50%;
              height:50%;
              padding:16px;
              border:3px solid orange;
              background-color:rgb(31, 31, 31);
              z-index:1002;
              overflow:auto;
            }
        </style>
        <script type="text/javascript">   /*彈跳視窗*/
            window.onload=function(){
               var linkbt=document.getElementById("linkbt");
               var light=document.getElementById('light');
               var fade=document.getElementById('fade');
               var closebt=document.getElementById("closebt");
               linkbt.onclick=function(){
                 light.style.display='block';
                 fade.style.display='block';
                }
               closebt.onclick=function(){
                 light.style.display='none';
                 fade.style.display='none';
                }
            };
        </script>
    </head>