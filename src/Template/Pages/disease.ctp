<?php
$this->assign('title', $disease->name);
$this->assign('description', $disease->description);
$this->assign('image', $disease->image_path);
?>

<article>
  <div class="container-fluid none-padding">
    <section id="category">
      <h1 class="ttl-bar-bold hidden-sm-up text-center"><?= h($disease->name) ?></h1>
      <div class="row none-margin">
        <div class="col-md-3">
          <?= $this->Html->image($disease->image_path, ['class' => 'img-fluid']); ?>
        </div>
        <div class="col-md-9 none-padding">
          <h1 class="hidden-xs-down"><?= h($disease->name) ?></h1>
          <p><?= h($disease->description) ?></p>
        </div>
      </div><!-- .row -->
    </section><!-- #category -->

    <div class="row none-margin">
      <div id="main" class="col-md-8 none-padding">
        <section class="topics_dict">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-hand-pointer-o fa-lg" aria-hidden="true"></i>
            <?= h($disease->name) ?>の注目ニュース
          </h1>
          <?php
          define('COUNT', count($ranking_n_d));
          define('LIMIT', 2);
          for ($i = 0; $i < (COUNT < LIMIT ? COUNT : LIMIT); $i++):
          ?>
          <div class="row none-margin">
            <div class="topics_dict_img col-3 col-sm-2">
              <?= $this->Html->image($news[$ranking_n_d[$i] - 1]->image_path2, ['class' => 'img-fluid']); ?>
            </div>
            <div class="col-9 col-sm-10">
              <h2><?= $this->Html->link($news[$ranking_n_d[$i] - 1]->title, ['controller' => 'Pages', 'action' => 'news', $news[$ranking_n_d[$i] - 1]->id]) ?></h2>
              <p class="omit">
                <?php
                $text = $news[$ranking_n_d[$i] - 1]->body;
                $count = mb_strlen($text, 'UTF-8');
                $limit = 75;
                if ($count > $limit) {
                  $showText = mb_strimwidth($text, 0, $limit*2, '…', 'UTF-8');
                  echo $showText;
                } else {
                  echo $text;
                }
                ?>
              </p>
            </div>
          </div><!-- .row -->
        <?php endfor; ?>
        </section><!-- .topics_dict -->

        <section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i>
            <?= h($disease->name) ?>のニュース一覧
          </h1>
          <?php
          $reversed = array_reverse($disease->news);
          foreach ($reversed as $reversed):
          ?>
					<div class="row">
						<div class="col-sm-9">
							<p><?= $this->Html->link($reversed->title, ['controller' => 'Pages', 'action' => 'news', $reversed->id]) ?></p>
						</div>
						<div class="col-3 hidden-xs-down">
              <p class="text-right"><?= h($reversed->created) ?></p>
						</div>
					</div>
        <?php endforeach; ?>
        </section><!-- .topics_list -->

        <section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i>
            人気ニュースランキング
          </h1>
          <?php for ($i = 0; $i < 8; $i++): ?>
					<div class="row">
						<div class="col-2">
							<div class="row">
								<div class="col-sm-6 hidden-xs-down">
                  <?php
                  switch($i) {
                    case 0:
                      echo '<p class="icon1 text-center"><i class="fa fa-star fa-lg" aria-hidden="true"></i></p>';
                      break;
                    case 1:
                      echo '<p class="icon2 text-center"><i class="fa fa-star fa-lg" aria-hidden="true"></i></p>';
                      break;
                    case 2:
                      echo '<p class="icon3 text-center"><i class="fa fa-star fa-lg" aria-hidden="true"></i></p>';
                      break;
                  }
                  ?>
                </div>
								<div class="col-sm-6">
									<p class="rank"><?= $i + 1 ?><span class="hidden-xs-down">位</span></p>
								</div>
							</div>
						</div>
						<div class="col-10">
							<p><?= $this->Html->link($news[$ranking_n[$i] - 1]->title, ['controller' => 'Pages', 'action' => 'news', $ranking_n[$i]]) ?></p>
						</div>
					</div>
          <?php endfor; ?>
        </section><!-- .topics_list -->
      </div><!-- #main -->


      <div id="sub" class="col-md-4 none-padding">
        <section class="category_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
            病名から探す
          </h1>
					<div class="hidden-xs-down">
            <?php foreach ($category[$disease->category_id - 1]->diseases as $disease_each): ?>
            <?php if ($disease->id === $disease_each->id) continue; ?>
            <div class="borderbottom">
              <p>
                <i class="fa fa-caret-right fa-lg" aria-hidden="true"></i>
                <?= $this->Html->link($disease_each->name, ['controller' => 'Pages', 'action' => 'disease', $disease_each->id]) ?>
              </p>
            </div>
            <?php endforeach; ?>
          </div>

					<div class="hidden-sm-up">
            <?php foreach ($category[$disease->category_id - 1]->diseases as $disease_each): ?>
            <?php if ($disease->id === $disease_each->id) continue; ?>
            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'disease', $disease_each->id]) ?>">
      				<div class="borderbottom">
  							<p>
  								<i class="fa fa-caret-right fa-lg" aria-hidden="true"></i>
  								<?= h($disease_each->name) ?>
  							</p>
  						</div>
            </a>
            <?php endforeach; ?>
          </div>
        </section><!-- .category_list -->
      </div><!-- #sub -->
    </div><!-- .row -->
  </div><!-- .container-fluid -->
</article>
