			<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<?php include "marquee.php"; ?>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->
				<h3 class="cent">更多最新消息</h3>
				<hr>
				<?php
				$db = new DB('news');
				$total = $db->count(['sh' => 1]);
				$div = 5;
				$pages = ceil($total / $div);
				$now = $_GET['p'] ?? "1";
				$start = ($now - 1) * $div;
				$prev = (($now - 1) > 0) ? ($now - 1) : $now;
				$next = (($now + 1) <= $pages) ? ($now + 1) : $now;
				$news = $db->all([], " LIMIT $start, $div ");
				?>
				<ol start="<?= ($start + 1); ?>">
					<?php
					foreach ($news as $n) {
						echo "<li class='sswww'>";
						echo mb_substr($n['text'], 0, 20, "utf8");
						echo "<span class='all' style='display:none'>";
						echo $n['text'];
						echo "</span>";
						echo "</li>";
					}
					?>
				</ol>

				<?php

				echo "<a href='?do=news&p=$prev' style='text-decoration:none'> < </a>";
				for ($i = 1; $i <= $pages; $i++) {
					$fontsize = ($now == $i) ? "30px" : "20px";
					echo "<a href='?do=news&p=$i' style='text-decoration:none;font-size:$fontsize'> $i </a>";
				}
				echo "<a href='?do=news&p=$next' style='text-decoration:none'> > </a>";


				?>
			</div>
			<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
			</div>
			<script>
				$(".sswww").hover(
					function() {
						$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
							"top": $(this).offset().top - 50
						})
						$("#alt").show()
					}
				)
				$(".sswww").mouseout(
					function() {
						$("#alt").hide()
					}
				)
			</script>