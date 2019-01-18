<?php require("head.php"); ?>


<script type="text/javascript">
  $(document).ready(function(){
    $('.calls').css({"background-color": "lightblue", "font-size": "120%"});
  });
  </script>

    <!-- top menu -->
    <nav class="navbar navbar-default navbar-fixed-top  pagesetup">
      <?php require("dashboard_menu.php"); ?>
    </nav>

    <!-- bottom menu -->
    <nav class="navbar navbar-default navbar-fixed-bottom  pagesetup">
      <?php require("dashboard_menu.php"); ?>
    </nav>

    <div style="margin-top:50px; padding-top:10px;"></div>
    
    <!-- Ajax Menu   -->
<div class="container-fluid">
  <div class="row">
<div class="col-sm-12">
  <ul class="list-inline">
   <li><button class="btn btn-success" id="long_term_day">Long Day</button></li>
   <li><button class="btn btn-success" id="long_term_week">Long Week</button></li>
   <li><button class="btn btn-success" id="short_term_60min">Short 60min</button></li>
   <li><button class="btn btn-success" id="short_term_day">Short Day</button></li>
   <li><button class="btn btn-success" id="swing_trade_15min">Swing 15min</button></li>
   <li><button class="btn btn-success" id="swing_trade_60min">Swing 60min</button></li>
   <li><button class="btn btn-success" id="btst_5min">BTST 5min</button></li>
   <li><button class="btn btn-success" id="btst_15min">BTST 15min</button></li>
   <li><button class="btn btn-success" id="intraday_1min">Intra 1min</button></li>
   <li><button class="btn btn-success" id="intraday_5min">Intra 5min</button></li>
   <li><button class="btn btn-warning"><span id="clicked">None</span> </button></li>

  </ul>
</div>
</div>
</div>

<div class="container-fluid">

<?php

$string = file_get_contents('./data/calls/btst_5min.json');
$arr = json_decode($string,true);?>



<!-- BTST BUY  Confirmed Calls -->
<table class="table table-bordered table-hover table-responsive table-striped">
<caption class="bg-primary text-center">BTST BUY <strong> Confirmed  </strong>Calls</caption>
<tr >
<th>Exchange</th>
<th>Symbol</th>
<th>token</th>
<th>Zerodha</th>
<th>Chart</th>
</tr>
<?php   
$nse_conf_buy = $arr['NSE']['confirmed']['BUY'];
foreach($nse_conf_buy as $data){
    $symbol= $data['symbol'];
    $token = $data['token'];      ?>
        <tr>
            <td><?php echo "NSE";?></td>
            <td class="bg-success"><?php echo $symbol;?></td>
            <td><?php echo $token;  ?></td>
            <!-- zerodha button -->
            <td><form action="#"> <kite-button href="#" data-kite="z8lgeb6fk65uargj"
            data-exchange="NSE"
            data-product="MIS"
            data-tradingsymbol="<?php echo $symbol;  ?>"
            data-transaction_type="BUY"
            data-quantity="10"
            class="kite-buy"
            title="BUY <?php echo $symbol; ?>"
            data-order_type="MARKET">Buy <strong> <?php echo $symbol; ?></strong> stock</kite-button></form></td>
            <!-- chart link -->
            <td><?php echo "chartlink";  ?></td>
        </tr>
<?php } ?>
</table>


<!-- BTST SELL  Confirmed Calls -->
<table class="table table-bordered table-hover table-responsive table-striped">
<caption class="bg-danger text-center">BTST SELL <strong> Confirmed  </strong> Calls</caption>
<tr >
<th>Exchange</th>
<th>Symbol</th>
<th>token</th>
<th>Chart</th>
</tr>
<?php   
$nse_conf_buy = $arr['NSE']['confirmed']['SELL'];
foreach($nse_conf_buy as $data){
    $symbol= $data['symbol'];
    $token = $data['token'];     ?>
        <tr>
            <td><?php echo "NSE";?></td>
            <td class="bg-danger"><?php echo $symbol;?></td>
            <td><?php echo $token;  ?></td>
            <td><?php echo "chartlink";  ?></td>
        </tr>
<?php } ?>
</table>



<!-- BTST BUY Unonfirmed Calls -->
<table class="table table-bordered table-hover table-responsive table-striped">
<caption class="bg-primary text-center">BTST BUY <strong> Unonfirmed  </strong> Calls</caption>
<tr >
<th>Exchange</th>
<th>Symbol</th>
<th>token</th>
<th>Chart</th>
</tr>
<?php   
$nse_conf_buy = $arr['NSE']['unconfirmed']['BUY'];
foreach($nse_conf_buy as $data){
    $symbol= $data['symbol'];
    $token = $data['token'];      ?>
        <tr>
            <td><?php echo "NSE";?></td>
            <td class="bg-danger"><?php echo $symbol;?></td>
            <td><?php echo $token;  ?></td>
            <td><?php echo "chartlink";  ?></td>
        </tr>
<?php } ?>
</table>







<!-- BTST SELL Unonfirmed Calls -->
<table class="table table-bordered table-hover table-responsive table-striped">
<caption class="bg-info text-center">BTST SELL <strong> Unonfirmed  </strong> Calls</caption>
<tr >
<th>Exchange</th>
<th>Symbol</th>
<th>token</th>
<th>Chart</th>
</tr>
<?php   
$nse_conf_buy = $arr['NSE']['unconfirmed']['SELL'];
foreach($nse_conf_buy as $data){
    $symbol= $data['symbol'];
    $token = $data['token'];      ?>
        <tr>
            <td><?php echo "NSE";?></td>
            <td class="bg-danger"><?php echo $symbol;?></td>
            <td><?php echo $token;  ?></td>
            <td><?php echo "chartlink";  ?></td>
        </tr>
<?php } ?>
</table>

<script src="https://kite.trade/publisher.js?v=3"></script>


<!-- 
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script> -->

  
</div>


<!--ohlc data -->
<!-- <script src='jquery-3.3.1.js'></script> -->
<script src='./calls.js'></script>

<!-- space setup -->
<div style="margin-bottom:50px; padding-bottom:10px;"></div>
<link rel="stylesheet" href="https://kite.zerodha.com/static/build/css/publisher.min.css">
<script src="https://kite.trade/publisher.js?v=3"></script>
</body>
</html>