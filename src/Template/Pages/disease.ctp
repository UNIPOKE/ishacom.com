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
        <?php
        define('COUNT', count($newsRanking_D));
        define('LIMIT', 2);
        if (COUNT !== 0):
        ?>
        <section class="topics_dict">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-hand-pointer-o fa-lg" aria-hidden="true"></i>
            <?= h($disease->name) ?>の注目ニュース
          </h1>
          <?php for ($i = 0; $i < (COUNT < LIMIT ? COUNT : LIMIT); $i++): ?>
          <div class="row none-margin">
            <div class="topics_dict_img col-3 col-sm-2">
              <?= $this->Html->image($newsRanking_D[$i]->image_path2, ['class' => 'img-fluid']); ?>
            </div>
            <div class="col-9 col-sm-10">
              <h2><?= $this->Html->link($newsRanking_D[$i]->title, ['action' => 'news', $newsRanking_D[$i]->id]) ?></h2>
              <p class="omit">
                <?php
                $text = $newsRanking_D[$i]->body;
                $count = mb_strlen($text, 'UTF-8');
                $limit = 75;
                if ($count > $limit) {
                  $showText = mb_strimwidth($text, 0, $limit * 2, '…', 'UTF-8');
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
        <?php endif; ?>

        <section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-list-ul fa-lg" aria-hidden="true"></i></i>
            <?= h($disease->name) ?>のニュース一覧
          </h1>
          <?php
          $reversed = array_reverse($disease->news);
          foreach ($reversed as $reversed):
          ?>
					<div class="row">
						<div class="col-sm-9">
							<p><?= $this->Html->link($reversed->title, ['action' => 'news', $reversed->id]) ?></p>
						</div>
						<div class="col-3 hidden-xs-down">
              <p class="text-right"><?= h($reversed->created->format("Y/m/d H:i")) ?></p>
						</div>
					</div>
        <?php endforeach; ?>
        </section><!-- .topics_list -->

        <section class="topics_table">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-hand-pointer-o fa-lg" aria-hidden="true"></i>
            注目のニュース
          </h1>

          <div class="row none-margin hidden-xs-down">
            <?php for ($i = 0; $i < 6; $i++): ?>
            <div class="sub_news col-4 none-padding">
              <section class="each_table">
                <div class="topics_table_img">
                  <div class="inner_img">
                    <?= $this->Html->image($newsRanking[$i]->image_path1, ['class' => 'img-fluid']); ?>
                  </div>
                </div>
                <div class="topics_table_title">
                  <div class="inner_title">
                    <h2><?= $this->Html->link($newsRanking[$i]->title, ['action' => 'news', $newsRanking[$i]->id]) ?></h2>
                  </div>
                </div>
              </section>
            </div>
            <?php endfor; ?>
          </div>

          <?php for ($i = 0; $i < 4; $i++): ?>
          <div class="row none-margin hidden-sm-up">
            <div class="topics_dict_img col-3 col-sm-2">
              <?= $this->Html->image($newsRanking[$i]->image_path2, ['class' => 'img-fluid']); ?>
            </div>
            <div class="col-9 col-sm-10">
              <h2><?= $this->Html->link($newsRanking[$i]->title, ['action' => 'news', $newsRanking[$i]->id]) ?></h2>
              <p class="omit">
                <?php
                $text = $newsRanking[$i]->body;
                $count = mb_strlen($text, 'UTF-8');
                $limit = 75;
                if ($count > $limit) {
                  $showText = mb_strimwidth($text, 0, $limit * 2, '…', 'UTF-8');
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
        <section class="category_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
            病名から探す
          </h1>

					<div class="hidden-xs-down">
            <?php foreach ($category[$disease->category_id - 1]->diseases as $disease_each): ?>
            <?php if ($disease_each->id === $disease->id) continue; ?>
            <div class="borderbottom">
              <p>
                <i class="fa fa-caret-right fa-lg" aria-hidden="true"></i>
                <?= $this->Html->link($disease_each->name, ['action' => 'disease', $disease_each->id]) ?>
              </p>
            </div>
            <?php endforeach; ?>
          </div>

					<div class="hidden-sm-up">
            <?php foreach ($category[$disease->category_id - 1]->diseases as $disease_each): ?>
            <?php if ($disease->id === $disease_each->id) continue; ?>
            <a href="<?= $this->Url->build(['action' => 'disease', $disease_each->id]) ?>">
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
