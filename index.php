<?php
// lazy config check/load
if (file_exists('LookingGlass/Config.php')) {
  require 'LookingGlass/Config.php';
  if (!isset($ipv4, $ipv6, $siteName, $siteUrl, $serverLocation, $testFiles, $theme)) {
    exit('Configuration variable/s missing. Please run configure.sh');
  }
} else {
  exit('Config.php does not exist. Please run configure.sh');
}
?>
<!DOCTYPE html>
<html lang="en">
<!--
                 __ _
               .: .' '.
              /: /     \_
             ;: ;  ,-'/`:\
             |: | |  |() :|
             ;: ;  '-.\_:/
              \: \     /`
               ':_'._.'
                  ||
                 /__\
      .---.     {====}
    .'   _,"-,__|::  |
   /    ((O)=;--.::  |
  ;      `|: |  |::  |
  |       |: |  |::  |            *****************************
  |       |: |  |::  |            * LookingGlass by Telephone *
  |       |: |  |::  |            *  http://iamtelephone.com  *
  |       |: |  |::  |            *****************************
  |       |: |  |::  |
  |      /:'__\ |::  |
  |     [______]|::  |
  |      `----` |::  |__
  |         _.--|::  |  ''--._
  ;       .'  __{====}__      '.
   \    .'_.-'._ `""` _.'-._    '.
    '--'/`      `''''`      `\    '.__
        '._                _.'
           `""--......--""`
-->

<head>
  <meta charset="utf-8">
  <title><?php echo $siteName; ?> - Looking Glass</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="LookingGlass - Open source PHP looking glass">
  <meta name="author" content="Telephone">

  <!-- IE6-8 support of HTML elements -->
  <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <!-- Styles -->
  <link href="assets/css/<?php echo $theme; ?>.min.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="https://hostodo.com/img/favicon.png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400%7CPoppins:400,400i,500,700">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
  <link rel="stylesheet" href="https://hostodo.com/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="https://hostodo.com/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://hostodo.com/plugins/swiper/swiper.min.css">
  <link rel="stylesheet" href="https://hostodo.com/plugins/magnific-popup/magnific-popup.min.css">
  <link rel="stylesheet" href="https://hostodo.com/css/animate.min.css">
  <link rel="stylesheet" href="https://hostodo.com/css/style.css">
  <link rel="stylesheet" href="https://hostodo.com/css/responsive.css">
  <link rel="stylesheet" href="https://hostodo.com/css/custom.css">

</head>

<body>
  <!-- Container -->

  <!-- Header -->

  <!-- <header class="header nohighlight" id="overview">
        <div class="row">
          <div class="span12">
            <h1><a id="title" href="<?php echo $siteUrl; ?>"><?php echo $siteName; ?></a></h1>
          </div>
        </div>
      </header> -->
  <div class="container bg-blue-700">

    <header class="header">
      <div class="header-absoulate">
        <div class="main-header">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-xl-3 col-lg-2 col-md-3 col-sm-5 col-7">
                <div class="logo"> <a href="/"> <img data-rjs="2" src="https://hostodo.com/img/logo-white.png" alt="Hostodo"> <img data-rjs="2" src="https://hostodo.com/img/logo-blue.png" alt="Hostodo"> </a> </div>
              </div>
              <div class="col-xl-7 col-lg-8 col-md-6 col-sm-3 col-2">
                <nav>
                  <div class='header-menu'>
                    <ul>
                      <li><a href='/'>Home</a></li>
                      <li><a href="/nvme-kvm">NVMe KVM</a></li>
                      <li><a href="/ssd-kvm">Standard KVM</a></li>
                      <li><a class="font-bold" href="/sale">SALE</a></li>
                      <li> <a href='#'>Links <i class="fas fa-caret-down"></i></a>
                        <ul>
                          <li>
                            <p><a href="https://status.hostodo.com">Network Status</a></p>
                          </li>
                          <li>
                            <p><a href="/discord">Community Discord</a></p>
                          </li>
                          <li>
                            <p><a target="_blank" href="/affiliate-program">Affiliate Program</a></p>
                          </li>
                          <li>
                            <p><a target="_blank" href="https://vpscp.hostodo.com">VPS Control Panel</a></p>
                          </li>
                          <li>
                            <p><a target="_blank" href="https://hostodo.com/portal">Billing Portal</a></p>
                          </li>
                          <li>
                            <p><a target="_blank" href="https://hostodo.com/portal/knowledgebase.php?action=displayarticle&id=1">Terms of Service</a></p>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
              <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-3">
                <div class="register-button"> <a class="btn no-pad btn-transparent btn-block" href="https://hostodo.com/portal/login.php">
                    <span>Login</span> </a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- Network Information -->
    <section id="information">
      <div class="row">
        <div class="span12">
          <div class="well">
            <span id="legend">Network information</span><!-- IE/Safari dislike <legend> out of context -->
            <p>Server Location: <b><?php echo $serverLocation; ?></b></p>
            <div style="margin-left: 10px;">
              <p>Test IPv4: <?php echo $ipv4; ?></p>
              <p><?php if (!empty($ipv6)) {
                    echo 'Test IPv6: ', $ipv6;
                  } ?></p>
              <p>Test files: <?php
                              foreach ($testFiles as $val) {
                                echo "<a href=\"{$val}.test\" id=\"testfile\">{$val}</a> ";
                              }
                              ?></p>
            </div>
            <p>Your IP Address: <b><a href="#tests" id="userip"><?php echo $_SERVER['REMOTE_ADDR']; ?></a></b></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Network Tests -->
    <section id="tests">
      <div class="row">
        <div class="span12">
          <form class="well form-inline" id="networktest" action="#results" method="post">
            <fieldset>
              <span id="legend">Network tests</span>
              <div id="hosterror" class="control-group">
                <div class="controls">
                  <input id="host" name="host" type="text" class="input-large" placeholder="Host or IP address">
                </div>
              </div>
              <select name="cmd" class="input-medium" style="margin-left: 5px;">
                <option value="host">host</option>
                <option value="mtr">mtr</option>
                <?php if (!empty($ipv6)) {
                  echo '<option value="mtr6">mtr6</option>';
                } ?>
                <option value="ping" selected="selected">ping</option>
                <?php if (!empty($ipv6)) {
                  echo '<option value="ping6">ping6</option>';
                } ?>
                <option value="traceroute">traceroute</option>
                <?php if (!empty($ipv6)) {
                  echo '<option value="traceroute6">traceroute6</option>';
                } ?>
              </select>
              <button type="submit" id="submit" name="submit" class="btn btn-primary" style="margin-left: 10px;">Run Test</button>
            </fieldset>
          </form>
        </div>
      </div>
    </section>

    <!-- Results -->
    <section id="results" style="display:none">
      <div class="row">
        <div class="span12">
          <div class="well">
            <span id="legend">Results</span>
            <pre id="response" style="display:none"></pre>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer nohighlight">
      <p class="pull-right">
        <a href="#">Back to top</a>
      </p>
      <p>Powered by <a href="http://github.com/telephone/LookingGlass">LookingGlass</a></p>
    </footer>

  </div><!-- /container -->

  <!-- Javascript -->
  <script src="assets/js/jquery-1.11.2.min.js"></script>
  <script src="assets/js/LookingGlass.min.js"></script>
  <script src="assets/js/XMLHttpRequest.min.js"></script>
  <script src="https://hostodo.com/js/jquery-3.2.1.min.js"></script>
  <script src="https://hostodo.com/js/bootstrap.bundle.min.js"></script>
  <script src="https://hostodo.com/plugins/swiper/swiper.min.js"></script>
  <script src="https://hostodo.com/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="https://hostodo.com/plugins/parsley/parsley.min.js"></script>
  <script src="https://hostodo.com/plugins/retinajs/retina.min.js"></script>
  <script src="https://hostodo.com/plugins/waypoints/jquery.waypoints.min.js"></script>
  <script src="https://hostodo.com/plugins/waypoints/sticky.min.js"></script>
  <script src="https://hostodo.com/js/menu.js"></script>
  <script src="https://hostodo.com/js/scripts.js"></script>
</body>

</html>