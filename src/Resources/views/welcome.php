<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/Resources/css/style.css">
    <title>Santa</title>
</head>
<body>
    <div class="wrapper">
        <h1>Тайный санта</h1>
        <div class="question_block">
            <form method="post">
                <input type="text" name="members" class="member" placeholder="Отделяйте слова пробелом"><br>
                <button type="submit" class="go">Распределить</button>
            </form>
        </div>
        <div class="answer_block">
            <?php if (!array_key_exists('errors', $response->data)): ?>
                <?php foreach($response->data as $from => $to): ?>
                    <div>
                    <?php echo $from . ' выбраны тайным сантой для ' . $to; ?><button onclick="alert('Отправлено <?php echo $from; ?>');"class="send">Отправить</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <?php echo $response->data['message']; ?>
            <?php endif; ?>
        </div>
    </div>
    <script>
        const input = document.querySelector('.member');
        input.addEventListener('keydown', function(e) {
            if (e.keyCode === 0 || e.keyCode === 32) {
                e.preventDefault()
                input.value += ',';
            }
        });
    </script>
</body>
</html>