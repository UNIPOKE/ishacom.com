<?php
$this->assign('title', $category->name);
$this->assign('description', $category->description);
$this->assign('image', $category->image_path);
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

    <section class="topics_table hidden-xs-down">
      <div class="row none-margin">
        <?php
        define('COUNT', count($ranking_d_c));
        define('LIMIT', 4);
        for ($i = 0; $i < (COUNT < LIMIT ? COUNT : LIMIT); $i++):
        ?>
        <div class="sub_news col-6 col-sm-3 none-padding">
          <section class="each_table">
            <div class="topics_table_img">
              <div class="inner_img">
                <?= $this->Html->image($disease[$ranking_d_c[$i] - 1]->image_path, ['class' => 'img-fluid']); ?>
              </div>
            </div>
            <div class="topics_table_title">
              <div class="inner_title">
                <h1><?= $this->Html->link($disease[$ranking_d_c[$i] - 1]->name, ['controller' => 'Pages', 'action' => 'news', $disease[$ranking_d_c[$i] - 1]->id]) ?></h1>
                <p class="omit">
                  <?php
                  $text = $disease[$ranking_d_c[$i] - 1]->description;
                  $count = mb_strlen($text, 'UTF-8');
                  $limit = 50;
                  if ($count > $limit) {
                    $showText = mb_strimwidth($text, 0, $limit*2, '…', 'UTF-8');
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
								<?= $this->Html->link($diseases->name, ['controller' => 'Pages', 'action' => 'disease', $diseases->id]) ?>
							</p>
						</div>
            <?php endforeach; ?>
					</div>

					<div class="hidden-sm-up">
            <?php foreach ($category->diseases as $diseases): ?>
            <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'disease', $diseases->id]) ?>">
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
            <?= h($category->name) ?>のニュース一覧
          </h1>
          <?php
          $reversed = array_reverse($category->news);
          foreach ($reversed as $reversed):
          ?>
					<div class="row">
						<div class="col-sm-9">
							<p><?= $this->Html->link($reversed->title, ['controller' => 'Pages', 'action' => 'news', $reversed->id]) ?></p>
						</div>
						<div class="col-3 hidden-xs-down">
              <p class="text-right"><?= h($reversed->created->format ("Y/m/d H:i")) ?></p>
						</div>
					</div>
        <?php endforeach; ?>
      </section><!-- .topics_list -->
    </div><!-- #main -->
		</div><!-- .row -->
	</div><!-- .container -->
</article>
