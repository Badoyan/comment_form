<?php

global $configs;
$conn = connection();

$conn->exec('USE '.$configs["db_name"].';');
$stmt = $conn->prepare("SELECT * FROM comments"); 
$stmt->execute();

// set the resulting array to associative
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
$conn = null;
?>
<?php if( !empty($comments) ): ?>
<div class="col-sm-12">
	<?php foreach ($comments as $key => $comment): ?>
		<div class="col-sm-4 show items <?php if($key % 2 == 0){echo 'odd'; }else { echo 'even'; } ?>">
			<div class="item_head">
				<span><?= $comment['name']; ?></span>
			</div>
			<div class="item_body">
				<span class="email"><?= $comment['email']; ?></span>
				<span class="comment"><?= $comment['comment']; ?></span>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<?php else: ?>
	<div>
		<h2 style="text-align: center;">Комментарий нет</h2>
	</div>
<?php endif; ?>