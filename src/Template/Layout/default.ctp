<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108451130-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-108451130-1');
  </script>

  <?= $this->Html->charset() ?>
  <meta name="robots" content="noindex" />
  <meta name="description" content="<?= $this->fetch('description') ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta property="og:title" content= "<?= $this->fetch('title') ?>" />
  <meta property="og:type" content= "website" />
  <meta property="og:url" content="<?= (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>" />
  <meta property="og:image" content="https://ishacom.biz/webroot/img/<?= $this->fetch('image') ?>" />
  <meta property="og:site_name" content="医者ドットコム" />
  <meta property="og:description" content="<?= $this->fetch('description') ?>" />
  <meta property="fb:app_id" content="541846462830148" />
  <meta property="article:publisher" content="https://www.facebook.com/%E5%8C%BB%E8%80%85%E3%83%89%E3%83%83%E3%83%88%E3%82%B3%E3%83%A0-1510617405657998/" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:site" content="isha_dot_com" />

  <?= $this->html->meta('icon');?>
  <title><?= $this->fetch('title') ?></title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css" integrity="sha256-HxaKz5E/eBbvhGMNwhWRPrAR9i/lG1JeT4mD6hCQ7s4=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <?= $this->Html->css('style.css') ?>

  <script src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <?= $this->Html->script('script.js') ?>

  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '547289898980758');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=547289898980758&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

</head>

<body>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.10&appId=541846462830148';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <div id="page" style="overflow: hidden;">
    <?= $this->element('accessories') ?>
    <?= $this->element('sns') ?>
    <?php if ($this->fetch('prefix') !== 'index') {
      echo $this->element('header');
    } ?>
    <div id="pageBody" class="col-lg-10 offset-lg-1" style="padding: 0;">
      <?= $this->fetch('content') ?>
    </div>
    <?= $this->element('footer') ?>
  </div>
</body>
</html>
