<?php
$this->assign('title', $news->title);
$this->assign('description', $news->description);
$this->assign('image', $news->image_path1);
?>

<script>
  fbq('track', 'ViewContent');
</script>

<article>
  <div class="container-fluid none-padding">
    <div class="row none-margin">
      <div id="main" class="col-md-8 none-padding">
        <section id="news">
          <div id="newsDate">
            <p><?= h($news->created->format ("Y年m月d日 H時i分")) ?></p>
          </div>
          <div>
            <?= $this->Html->image($news->image_path1, ['class' => 'img-fluid']); ?>
          </div>
          <div id="newsTitle">
            <h1><?= h($news->title) ?></h1>
          </div>
          <div id="newsContent">
            <?= $news->body ?>
            <div id="newsdoctorcom">
              <p><?= $this->Html->link('医者ドットコム', ['controller' => 'Pages', 'action' => 'index']) ?></p>
            </div>
            </p>
          </div>
        </section><!-- #news -->

        <section class="topics_table">
          <h1 class="ttl-bar-bold">
            この記事を見た人はこんな記事も見ています
          </h1>
          <div class="row none-margin hidden-xs-down">
            <?php for ($i = 0; $i < 4; $i++): ?>
            <?php if ($newsRand[$i]->id === $news->id) continue; ?>
            <div class="sub_news col-6 col-sm-3 none-padding">
              <section class="each_table">
                <div class="topics_table_img">
                  <div class="inner_img">
                    <?= $this->Html->image($newsRand[$i]->image_path1, ['class' => 'img-fluid']); ?>
                  </div>
                </div>
                <div class="topics_table_title">
                  <div class="inner_title">
                    <h2><?= $this->Html->link($newsRand[$i]->title, ['controller' => 'Pages', 'action' => 'news', $newsRand[$i]->id]) ?></h2>
                  </div>
                </div>
              </section>
            </div>
            <?php endfor; ?>
          </div>


          <?php for ($i = 0; $i < 5; $i++): ?>
          <?php if ($newsRand[$i]->id === $news->id) continue; ?>
          <div class="row none-margin hidden-sm-up">
            <div class="topics_dict_img col-3 col-sm-2">
              <?= $this->Html->image($newsRand[$i]->image_path2, ['class' => 'img-fluid']); ?>
            </div>
            <div class="col-9 col-sm-10">
              <h2><?= $this->Html->link($newsRand[$i]->title, ['controller' => 'Pages', 'action' => 'news', $newsRand[$i]->id]) ?></h2>
              <p class="omit">
                <?php
                $text = $newsRand[$i]->body;
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
      </div><!-- #main -->

      <div id="sub" class="col-md-4 none-padding">
        <section class="topics_list" style="margin-top: 40px;">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i>
            <?= h($news->category->name) ?>のニュースランキング
          </h1>
          <?php
          define('COUNT', count($ranking_n_c));
          define('LIMIT', 8);
          for ($i = 0; $i < (COUNT < LIMIT ? COUNT : LIMIT); $i++):
          ?>
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
							<p><?= $this->Html->link($newsArray[$ranking_n_c[$i] - 1]->title, ['controller' => 'Pages', 'action' => 'news', $ranking_n_c[$i]]) ?></p>
						</div>
					</div>
          <?php endfor; ?>
        </section><!-- .topics_list -->

        <div class="col-12 none-padding">
          <div class="fb-page" data-href="https://www.facebook.com/unipoke" data-tabs="timeline" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
            <blockquote cite="https://www.facebook.com/unipoke" class="fb-xfbml-parse-ignore">
              <a href="https://www.facebook.com/unipoke">株式会社unipoke ユニポケ</a>
            </blockquote>
          </div>
        </div>

      </div><!-- #sub -->
    </div><!-- .row -->
  </div><!-- .container-fluid -->
</article>
