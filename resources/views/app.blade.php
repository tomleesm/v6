<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <title>App.blade</title>
    </head>
    <body>
        <?php
            /***
            $c1 = new \stdClass;
            $c1->id = 1;
            $c1->title = 'A';

            $c2 = new \stdClass;
            $c2->id = 2;
            $c2->title = 'B';

            $c3 = new \stdClass;
            $c3->parents = [ $c1, $c2 ];
            $c3->id = 3;
            $c3->title = 'C';

            ***/

            $c1 = new \stdClass;
            $c1->id = 1;
            $c1->title = 'A';

            $c2 = new \stdClass;
            $c2->id = 2;
            $c2->title = 'B';
            $c2->parent = $c1;

            $c3 = new \stdClass;
            $c3->id = 3;
            $c3->title = 'C';
            $c3->parent = $c2;
        ?>
        {{ Breadcrumbs::render('category', $c3) }}
    </body>
</html>
