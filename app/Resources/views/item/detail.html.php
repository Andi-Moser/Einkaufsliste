<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Einkaufsliste</title>

    <style type="text/css">
        .star-five {
             margin: 25px 0;
             position: relative;
             display: inline-block;
             color: #ffd61a;
             width: 0px;
             height: 0px;
             border-right: 50px solid transparent;
             border-bottom: 35px solid #ffd61a;
             border-left: 50px solid transparent;
             transform: rotate(35deg);
         }
        .star-five:before {
            border-bottom: 40px solid #ffd61a;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            position: absolute;
            height: 0;
            width: 0;
            top: -22.5px;
            left: -32.5px;
            display: block;
            content: '';
            transform: rotate(-35deg);
        }
        .star-five:after {
            position: absolute;
            display: block;
            color: #ffd61a;
            top: 1.5px;
            left: -52.5px;
            width: 0px;
            height: 0px;
            border-right: 50px solid transparent;
            border-bottom: 35px solid #ffd61a;
            border-left: 50px solid transparent;
            transform: rotate(-70deg);
            content: '';
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Detailseite von <?php echo $item['name']; ?></h1>

            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Amount</th>
                </tr>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['amount']; ?></td>
                </tr>
            </table>

            <h2>Bewertung</h2>

            <strong>Bewertung: <?php echo round($rating['average'], 1) ?>/5</strong> (<?php echo $rating['count']; ?> Bewertungen)<br />

            <a href="/rate?itemId=<?php echo $item['id']; ?>&rating=1"><div class="star-five"></div></a>
            <a href="/rate?itemId=<?php echo $item['id']; ?>&rating=2"><div class="star-five"></div></a>
            <a href="/rate?itemId=<?php echo $item['id']; ?>&rating=3"><div class="star-five"></div></a>
            <a href="/rate?itemId=<?php echo $item['id']; ?>&rating=4"><div class="star-five"></div></a>
            <a href="/rate?itemId=<?php echo $item['id']; ?>&rating=5"><div class="star-five"></div></a>

            <h2>Kommentare</h2>

            <?php
                foreach ($comments as $comment) {
                    $date = new DateTime();
                    $date->setTimestamp($comment['timestamp'] + (3600 * 1));
                    ?>
                    <div class="comment">
                        <span><strong><?php echo $comment['username'];?></strong> schreibt am <?php echo $date->format("d.m.Y") ?> um <?php echo $date->format("H:i"); ?>:</span><br />
                        <p>
                            <?php echo $comment['comment']; ?>
                        </p>
                    </div>
                    <?php
                }
            ?>

            <form action="/comment/add" method="post">
                <input type="hidden" name="itemId" value="<?php echo $item['id']; ?>">
                <div class="form-group">
                    <label for="comment">Neuer Kommentar hinzufügen</label>
                    <textarea type="text" class="form-control" id="comment" name="comment" placeholder="Schreiben Sie hier Ihren Kommentar"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kommentar hinzufügen</button>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>