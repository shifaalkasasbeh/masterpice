<html><head>
    <style>
   input[type="number"] {
    height: 100px;
}

.number-wrapper {
    position: relative;
}

.number-wrapper:hover:after {
    content: "\25B2";
    position: absolute;
    color: blue;
    left: 100%;
    margin-left: -17px;
    margin-top: 12%;
    font-size: 11px;
}

.number-wrapper:hover:before {
    content: "\25BC";
    position: absolute;
    color: blue;
    left: 100%;
    bottom: 0;
    margin-left: -17px;
    margin-bottom: -14%;
    font-size: 11px;
}
    </style>
  <meta name="apple-mobile-web-app-capable" content="yes"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0"/>
  </head>
  <body >
  <span class='number-wrapper'>
    <input type="number" />
</span>
  </body></html>