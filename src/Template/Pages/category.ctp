<?php
$this->assign('title', $category->name);
$this->assign('description', $category->description);
$this->assign('image', $category->image_path . ".jpg");
?>

<article>
  <section id="ttl_menu">
    <h1><?= h($category->name) ?></h1>
  </section><!-- #ttl_menu -->

	<div class="container-fluid none-padding">
    <section id="leadText">
      <div class="row none-margin">
        <div id="leadSentence" class="col-sm-8">
  				<p><?= h($category->lead) ?></p>
        </div>
      </div>
    </section>

    <?php
    define('COUNT', count($diseaseRanking));
    define('LIMIT', 4);
    if (COUNT !== 0):
    ?>
    <section class="topics_table hidden-xs-down">
      <div class="row none-margin">
        <?php for ($i = 0; $i < (COUNT < LIMIT ? COUNT : LIMIT); $i++): ?>
        <div class="sub_news col-6 col-sm-3 none-padding">
          <section class="each_table">
            <div class="topics_table_img">
              <div class="inner_img">
                <?= $this->Html->image($diseaseRanking[$i]->image_path . ".jpg", ['class' => 'img-fluid']); ?>
              </div>
            </div>
            <div class="topics_table_title">
              <div class="inner_title">
                <h1><?= $this->Html->link($diseaseRanking[$i]->name, ['action' => 'disease', $diseaseRanking[$i]->id]) ?></h1>
                <p class="omit">
                  <?php
                  $text = $diseaseRanking[$i]->description;
                  $count = mb_strlen($text, 'UTF-8');
                  $limit = 50;
                  if ($count > $limit) {
                    $showText = mb_strimwidth($text, 0, $limit * 2, '…', 'UTF-8');
                    echo $showText;
                  } else {
                    echo $text;
                  }
                  ?>
                </p>
              </div>
            </div>
          </section>
        </div>
        <?php endfor; ?>
      </div>
    </section><!-- .topics_table -->
    <?php endif; ?>

		<div class="row none-margin">
			<div id="sub" class="col-sm-4 push-sm-8 none-padding">
				<section class="category_list">
					<h1 class="ttl-bar-bold">
			      <i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>
		        病名別に探す
		      </h1>

					<div class="hidden-xs-down">
            <?php foreach ($category->diseases as $diseases): ?>
    				<div class="borderbottom">
							<p>
								<i class="fa fa-caret-right fa-lg" aria-hidden="true"></i>
								<?= $this->Html->link($diseases->name, ['action' => 'disease', $diseases->id]) ?>
							</p>
						</div>
            <?php endforeach; ?>
					</div>

					<div class="hidden-sm-up">
            <?php foreach ($category->diseases as $diseases): ?>
            <a href="<?= $this->Url->build(['action' => 'disease', $diseases->id]) ?>">
      				<div class="borderbottom">
  							<p>
  								<i class="fa fa-caret-right fa-lg" aria-hidden="true"></i>
  								<?= h($diseases->name) ?>
  							</p>
  						</div>
            </a>
            <?php endforeach; ?>
          </div>
				</section><!-- .category_list -->
			</div><!-- #sub -->

			<div id="main" class="col-sm-8 pull-sm-4 none-padding">
        <section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i>
            <?= h($category->name) ?>のニュースランキング
          </h1>
          <?php
          define('COUNT_2', count($newsRanking));
          define('LIMIT_2', 8);
          for ($i = 0; $i < (COUNT_2 < LIMIT_2 ? COUNT_2 : LIMIT_2); $i++):
          ?>
					<div class="row">
						<div class="col-2">
							<div class="row">
								<div class="col-6 hidden-xs-down">
                  <?php
									switch($i) {
                    case 0: echo '<p class="icon1 text-center"><i class="fa fa-star fa-lg" aria-hidden="true"></i></p>'; break;
                    case 1: echo '<p class="icon2 text-center"><i class="fa fa-star fa-lg" aria-hidden="true"></i></p>'; break;
                    case 2: echo '<p class="icon3 text-center"><i class="fa fa-star fa-lg" aria-hidden="true"></i></p>'; break;
                  }
                  ?>
								</div>
								<div class="col-6">
									<p class="rank"><?= $i + 1 ?><span class="hidden-sm-down">位</span></p>
								</div>
							</div>
						</div>
						<div class="col-10">
							<p><?= $this->Html->link($newsRanking[$i]->title, ['action' => 'news', $newsRanking[$i]->id]) ?></p>
						</div>
					</div>
          <?php endfor; ?>
        </section><!-- .topics_list -->

				<section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
            <?= h($category->name) ?>の新着ニュース
          </h1>
          <?php
          $reversed = array_reverse($category->news);
          for ($i = 0; $i < 10; $i++):
          ?>
					<div class="row">
						<div class="col-sm-9">
							<p><?= $this->Html->link($reversed[$i]->title, ['action' => 'news', $reversed[$i]->id]) ?></p>
						</div>
						<div class="col-3 hidden-xs-down">
              <p class="text-right"><?= h($reversed[$i]->created->format("Y/m/d H:i")) ?></p>
						</div>
					</div>
          <?php endfor; ?>
        </section><!-- .topics_list -->
      </div><!-- #main -->
		</div><!-- .row -->
	</div><!-- .container -->
</article>
