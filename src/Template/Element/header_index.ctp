<header id="pageHead">
  <div id="indexHeadS" class="container-fluid col-lg-10 offset-lg-1 none-padding">
    <div id="siteTitle" class="row none-margin">
      <div class="col-4 col-sm-2 offset-4 offset-sm-5">
        <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'index']) ?>">
          <?= $this->Html->image('logo.png', ['class' => 'img-fluid']); ?>
        </a>
      </div>
    </div><!-- .row -->
  </div><!-- .container-fluid -->
  <div id="indexHeadL" class="container-fluid col-lg-10 offset-lg-1 none-padding">
    <?= $this->Html->image('keyv.png', ['class' => 'img-fluid']); ?>
  </div>
</header>
