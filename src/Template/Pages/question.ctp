<?php
$this->assign('title', $question->title);
$this->assign('description', $question->description);
$this->assign('image', $qustion->image_path);
?>

<article>
  <div class="container-fluid none-padding">
    <div class="row none-margin">
      <div id="main" class="col-md-8 none-padding">
        <section id="question">
          <div id="questionCategory">
            <p><?= $this->Html->link($question->category->name, ['controller' => 'Pages', 'action' => 'category', $question->category->id]) ?></p>
          </div>
          <div id="questionTitle">
            <h1><?= h($question->title) ?></h1>
          </div>
          <div id="questionContent">
            <p><?php echo $question->body ?></p>
            <p id="questionDate" class="text-right"><?= h($question->created) ?></p>
          </div>
        </section>

        <section id="answers">
          <h1 class="ttl-bar-bold">
            <i class="fa fa-font fa-lg" aria-hidden="true"></i>
            医師の回答
          </h1>
          <?php foreach ($question->answers as $answer): ?>
          <div class="answer">
            <div class="answerTitle">
              <h2><?= h($answer->title) ?></h2>
            </div>
            <div class="answerContent">
              <p><?php echo $answer->body ?></p>
            </div>
          </div>
          <?php endforeach; ?>
        </section>
      </div><!-- #answers -->
      </div><!-- #main -->

      <div id="sub" class="col-md-4 none-padding">
      </div><!-- #sub -->
    </div><!-- .row -->
  </div><!-- container-fluid -->
</article>
