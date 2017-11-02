<!-- <div class="sns container col-lg-10 none-padding"> -->
<div class="sns">
  <ul id="sns-button">
      <li>
        <div class="facebook_back sns-facebook sns-link">
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?= $this->Url->build(null, true) ?>" onclick="window.open(this.href, 'FBwindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank" title="Facebookでシェア" class="square_btn">
            <i class="fa fa-facebook-official sns_icon" aria-hidden="true"></i>
            <span class="facebook-count share-text sns-txt ">Facebook</span>
          </a>
        </div>
      </li>

      <li>
        <div class="twitter_back sns-twitter sns-link">
          <a href="https://twitter.com/intent/tweet?url=<?= $this->Url->build(null, true) ?>&amp;text=<?= $this->fetch('title') ?>" target="_blank" title="Twitterでシェア" class="square_btn">
            <i class="fa fa-twitter lg sns_icon" aria-hidden="true"></i>
            <span class="sns-txt">Twitter</span>
          </a>
        </div>
      </li>

      <li>
        <div class="google_back sns-googleplus sns-link">
          <a href="https://plus.google.com/share?url=<?= $this->Url->build(null, true) ?>" onclick="window.open(this.href, 'GooglePlusWindow', 'width=650, height=450, menubar=no, toolbar=no, scrollbars=yes'); return false;" target="_blank" title="Google+で共有" class="square_btn">
            <i class="fa fa-google-plus sns_icon" aria-hidden="true"></i>
            <span class="sns-txt">Google+</span>
          </a>
        </div>
      </li>

      <li>
        <div class="hatena_back hatena-bookmark-button sns-bookmark sns-link">
          <a href="http://b.hatena.ne.jp/entry/<?= $this->Url->build(null, true) ?>" data-hatena-bookmark-title="<?= $this->fetch('title') ?>" data-hatena-bookmark-layout="simple" target="_blank" title="はてなブックマークに登録" class="square_btn">
            <?php echo $this->Html->image('hatena.png', array('class' => 'sns_icon', 'alt' => 'hatena')); ?>
            <span class="hatena-bookmark-count share-text sns-txt ">Hatena</i></span>
          </a>
        </div>
      </li>

      <li>
        <div class="line_back sns-line sns-link">
          <a href="http://line.me/R/msg/text/?<?= $this->Url->build(null, true) ?>" target="_blank" title="LINEで送る" class="square_btn">
            <?php echo $this->Html->image('share-d.png', array('class' => 'sns_icon', 'alt' => 'LINE')); ?>
            <span class="sns-txt">LINE</span>
          </a>
        </div>
      </li>

      <li>
        <div class="pocket_back sns-pocket sns-link">
          <a href="https://getpocket.com/edit?url=<?= $this->Url->build(null, true) ?>&amp;title=<?= $this->fetch('title') ?>" onclick="window.open(this.href, 'pocket_window', 'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes'); return false;" class="square_btn">
            <i class="fa fa-get-pocket sns_icon" aria-hidden="true"></i>
            <span class="sns-txt">Pocket</span>
          </a>
        </div>
      </li>

      <li>
        <div class="pocket_back sns-pocket sns-link">
          <button type="submit" value="sns" onclick='location.href="https://getpocket.com/edit?url=<?= $this->Url->build(null, true) ?>&amp;title=<?= $this->fetch('title') ?>"' class="square_btn">
            <i class="fa fa-get-pocket sns_icon" aria-hidden="true"></i>
            <span class="sns-txt">Pocket</span>
          </button>
        </div>
      </li>
  </ul>

  <!-- "window.open(this.fref, 'pocket_window', width=900, height=300; menubar=no, toolbar=no, scrollbars=yes'); return false;"
  -->
  <style type="text/css">
  .sns {
  	width:960px;
  	/*margin:10px auto;*/
  }
  .sns-txt {
    color: #ffffff;
    font-size: 14px;
  }
  .sns_icon {
    color: #ffffff;
    wight: 18px;
    height: 18px;

  }
  .facebook_back {
    wigth: 100px;
    height: 35px;
    background:#3B5998;
    padding: 2px;
    margin: 2px;
    text-shadow: 1px 1px 2px #000;
  }
  .twitter_back {
    wigth: 100px;
    height: 35px;
    background:#55acee;
    padding: 2px;
    margin: 2px;
    text-shadow: 1px 1px 2px #000;
  }
  .google_back {
    wigth: 100px;
    height: 35px;
    background:#dd4b39;
    padding: 2px;
    margin: 2px;
    text-shadow: 1px 1px 2px #000;
  }
  .hatena_back {
    wigth: 100px;
    height: 35px;
    background:#008fde;
    padding: 2px;
    margin: 2px;
    text-shadow: 1px 1px 2px #000;
  }
  .line_back {
    wigth: 100px;
    height: 35px;
    background:#00c300;
    padding: 2px;
    margin: 2px;
    text-shadow: 1px 1px 2px #000;
  }
  .pocket_back {
    wigth: 100px;
    height: 35px;
    background:#ff2a57;
    padding: 2px;
    margin: 2px;
    text-shadow: 1px 1px 2px #000;

    }
    .pocket_back:hover {
    filter: alpha(opacity=60);        /* ie lt 8 */
    -ms-filter: "alpha(opacity=60)";  /* ie 8 */
    -moz-opacity:0.6;                 /* FF lt 1.5, Netscape */
    -khtml-opacity: 0.6;              /* Safari 1.x */
    opacity:0.6;
    zoom:1;
    text-decoration: none;
      }

  .square_btn{
    display: inline-block;
    text-decoration: none;
    wigth: 100px;
    height: 35px;
    text-shadow: 1px 1px 2px #000;
}
  .square_btn:active {/*ボタンを押したとき*/
    -ms-transform: translateY(2px);
    -webkit-transform: translateY(2px);
    transform: translateY(2px);/*下に動く*/
    border-bottom: none;/*線を消す*/
}



  #sns-button {
  	background:#d6d6d6;
    top: 130px;
  	width:150px;
  	padding:10px;
  	margin-left:-180px;
  	text-align:center;
  	position:fixed;
  	bottom:300px;
  	list-style-type:none;
  }




  </style>


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>
/*  $(document).ready(function(){
    if ( $(window).width() > 641) {
    $(function(){
      var sns = $("#sns-button") , offset = sns.offset();

      // スクロールで始まる
      $(window).scroll(function () {
        var snsBottom = sns.height() + $(this).scrollTop();

        // 『変数 parentBottom』にスクロール範囲の上位置と高さを足した数値を入れる
        // 今回の場合だと「スクロール範囲 = #sns-button の親要素」なので parent() を使用
        var parentBottom = sns.parent().offset().top +  page.height();

        // もしウィンドウ内のスクロール上位置が『変数 offset』の上位置より大きかったら
        // （『変数 offset』より下にスクロールしたら）
        if($(window).scrollTop() > offset.top) {

          // もし『変数 parentBottom』の数値が『変数 snsBottom』の数値より小さかったら
          if(parentBottom < snsBottom){
            sns.css({
              "position": "absolute",
              "top": "auto",
              "bottom": "0",
              "left": "0",
              "margin-left": "0"
            });
          } else {
            sns.css({
              "position": "fixed",
            "top": "0",
            "left": "auto",
            "margin-left": "-90px"
          });
        }
      } else {
        sns.css({
          "position": "absolute",
          "top": "230px",
          "left": "0",
          "margin-left": "0"
        });
      }
    });
  });
}
});
*/
function setSnsShare(shareUrl, description) {
    setTwitterLink(".twitter_back a",shareUrl,description);
    setFacebookLink(".facebook_back a",shareUrl, description);
    setGooglePlusLink(".google_back a",shareUrl, description);
    setHatebuLink(".hatena_back a", shareUrl, description);
    setLineLink(".line_back a", shareUrl, description);
}


function setTwitterLink(shareSelector, shareUrl, description) {
    $(shareSelector).attr("href", "https://twitter.com/share?shareUrl=" + shareUrl + "&text=" + encodeURIComponent(description));
    setShareEvent(shareSelector, 'Twitter', shareUrl);
}

function setFacebookLink(shareSelector, shareUrl, description) {
    $(shareSelector).attr("href", "https://www.facebook.com/sharer/sharer.php?u=" + shareUrl + "&t=" + encodeURIComponent(description));
    setShareEvent(shareSelector, 'Facebook', shareUrl);
}

function setGooglePlusLink(shareSelector, shareUrl, description) {
    $(shareSelector).attr("href", "https://plus.google.com/share?shareUrl=" + shareUrl);
    setShareEvent(shareSelector, 'Google+', shareUrl);
}

function setHatebuLink(shareSelector, shareUrl, description) {
    $(shareSelector).attr("href", "https://b.hatena.ne.jp/add?mode=confirm&shareUrl=" + shareUrl + "&description=" + encodeURIComponent(description));
    setShareEvent(shareSelector, 'Hatena Bookmark', shareUrl);
}

function setLineLink(shareSelector, shareUrl, description) {
    $(shareSelector).attr("href", "http://line.me/R/msg/text/?" + encodeURIComponent(description + " " + shareUrl));
    setShareEvent(shareSelector, 'LINE', shareUrl);
}

/**
 *  シェアボタン押下時にGoogleアナリティクスへイベントを送信する
 *  @param selector イベントを付与するセレクタ
 *  @param snsName SNSの名前（Googleアナリティクス上の表示に使われる）
 *  @param shareUrl シェア対象のURL（Googleアナリティクス上の表示に使われる）
 */
function setShareEvent(selector, snsName, shareUrl) {
    $(selector).on('click', function(e){
        var current = this;
        //　*** Googleアナリティクスにイベント送らないなら、以下のコードは不要 ***
        // 'share'の文字列は任意に変えてもよい（Googleアナリティクス上の表示文字列として使われる）
        // 'nonInteraction' : 1にしないと、直帰率がおかしくなる（イベント発行したユーザーは直帰扱いでなくなる）ので注意
        ga('send', 'social', snsName, 'share', shareUrl, {
            'nonInteraction': 1
        });
        // *** Googleアナリティクス送信ここまで ****

        // このあたりは適当に書き換えて下さい
        window.open(current.href, '_blank', 'width=600, height=600, menubar=no, toolbar=no, scrollbars=yes');
        e.preventDefault();
    });
}
</script>
</div>
<!-- </div> -->
