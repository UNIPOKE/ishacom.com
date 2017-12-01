<?php
$this->assign('title', '医者ドットコム');
$this->assign('description', null);
$this->assign('image', null);
$this->assign('action', 'index');
?>

<article>
	<div class="container-fluid none-padding">
    <section class="topics_table">
      <h1 class="ttl-bar-bold hidden-sm-up">
        <i class="fa fa-hand-pointer-o fa-lg" aria-hidden="true"></i>
        今日のイチオシ記事
      </h1>

      <div class="row none-margin">
        <div class="main_news col-sm-6 none-padding">
          <section class="each_table">
            <div class="topics_table_img">
              <div class="inner_img">
                <?= $this->Html->image($newsRanking[0]->image_path1, ['class' => 'img-fluid']); ?>
              </div>
            </div>
            <div class="topics_table_title">
              <div class="inner_title">
                <h1><?= $this->Html->link($newsRanking[0]->title, ['action' => 'news', $newsRanking[0]->id]) ?></h1>
                <p class="omit">
                  <?php
                  $text = $newsRanking[0]->body;
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
            </div>
          </section>
        </div>

        <div class="col-6 hidden-xs-down
         none-padding">
          <div class="row none-margin">
            <?php
            define('COUNT', count($newsRanking));
            define('LIMIT', 5);
            for ($i = 1; $i < (COUNT < LIMIT ? COUNT : LIMIT); $i++):
            ?>
            <div class="sub_news col-6 none-padding">
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
        </div>
      </div><!-- .row -->
    </section><!-- .topics_table -->

    <div class="row none-margin">
      <div id="main" class="col-sm-8 none-padding">
				<section id="onayami">
					<h1 class="ttl-bar-bold">
						<i class="fa fa-list-ul fa-lg" aria-hidden="true"></i></i>
	           カテゴリから探す
	        </h1>

          <div class="row">
            <?php foreach ($categories as $category): ?>
            <div class="col-sm-4 hidden-xs-down">
							<div id="onayamiElement">
	              <h2><?= $this->Html->link($category->name, ['action' => 'category', $category->id]) ?></h2>
								<div class="row">
									<div class="col-4">
										<img>
									</div>
									<div class="col-8">
										<ul>
                      <?php for ($i = 0; $i < 5; $i++): ?>
											<li class="list-inline-item"><?= $this->Html->link($category->diseases[$i]->name, [ 'action' => 'disease', $category->diseases[$i]->id]) ?></li>
                      <?php endfor; ?>
                      <li><?= $this->Html->link('…もっと見る', ['action' => 'category', $category->id]) ?><li>
                    </ul>
									</div>
								</div>
							</div>
						</div>
            <?php endforeach; ?>
					</div><!-- .row -->

          <?php
          define('COUNT_2', count($categories));
          for ($i = 0; $i < COUNT_2; $i += 2):
          ?>
          <div class="row">
						<div class="onayami_xs-l col-6 hidden-sm-up">
							<div id="onayamiElement">
	              <h2 class="text-center"><?= $this->Html->link($categories[$i]->name, ['action' => 'category', $categories[$i]->id]) ?></h2>
							</div>
						</div>
            <?php if ($i >= COUNT_2 - 1) break; ?>
						<div class="onayami_xs-r col-6 hidden-sm-up">
							<div id="onayamiElement">
		          	<h2 class="text-center"><?= $this->Html->link($categories[$i + 1]->name, ['action' => 'category', $categories[$i + 1]->id]) ?></h2>
							</div>
						</div>
					</div><!-- .row -->
          <?php endfor; ?>
        </section><!-- #onayami -->

        <section class="topics_dict">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-hand-pointer-o fa-lg" aria-hidden="true"></i>
            注目のニュース
          </h1>
          <?php for ($i = 0; $i < 5; $i++): ?>
          <div class="row none-margin">
            <div class="topics_dict_img col-3 col-sm-2">
              <?= $this->Html->image($news[$i]->image_path2, ['class' => 'img-fluid']); ?>
            </div>
            <div class="col-9 col-sm-10">
              <h2><?= $this->Html->link($news[$i]->title, ['action' => 'news', $news[$i]->id]) ?></h2>
              <p class="omit">
                <?php
                $text = $news[$i]->body;
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

        <section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-plus fa-lg" aria-hidden="true"></i>
            新着ニュース
          </h1>
          <?php
          $reversed = array_reverse($news);
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
          <?php
          endfor;
          ?>
        </section><!-- .topics_list -->
      </div><!-- #main -->

      <div id="sub" class="col-sm-4 none-padding">
        <section class="topics_list">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-newspaper-o fa-lg" aria-hidden="true"></i>
            人気ニュースランキング
          </h1>
          <?php for ($i = 0; $i < 8; $i++): ?>
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

        <div class="col-12 none-padding">
          <div class="fb-page" data-href="https://www.facebook.com/ishacom.unipoke" data-tabs="timeline" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ishacom.unipoke" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ishacom.unipoke">医者ドットコム</a></blockquote></div>
        </div>
      </div><!-- #sub -->
    </div><!-- .row -->
	</div><!-- .container-fluid -->
</article>
