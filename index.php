<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./style/style.css">
    <title>HOTEL HOMEPAGE</title>
</head>
<body>

    <?php 
        $hotels = [
            [
                'name' => 'Hotel Belvedere',
                'description' => 'Hotel Belvedere Descrizione',
                'parking' => true,
                'vote' => 4,
                'distance_to_center' => 10.4
            ],
            [
                'name' => 'Hotel Futuro',
                'description' => 'Hotel Futuro Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 2
            ],
            [
                'name' => 'Hotel Rivamare',
                'description' => 'Hotel Rivamare Descrizione',
                'parking' => false,
                'vote' => 1,
                'distance_to_center' => 1
            ],
            [
                'name' => 'Hotel Bellavista',
                'description' => 'Hotel Bellavista Descrizione',
                'parking' => false,
                'vote' => 5,
                'distance_to_center' => 5.5
            ],
            [
                'name' => 'Hotel Milano',
                'description' => 'Hotel Milano Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 50
            ],
        ];
    ?>

    <div class="container">

        <h1>HOTEL HOMEPAGE</h1>

        <table class="table text-center">
            <thead>
                <tr>
                    <th scope="col">HOTEL</th>+
                    <?php foreach ($hotels as $hotel) { ?>
                        <th scope="col">
                            <?php echo $hotel['name'] ?>
                        </th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Descrizione</th>
                    <?php foreach($hotels as $hotel) { ?>
                        <td>
                            <?php echo $hotel['description'] ?>
                        </td>
                    <?php } ?>
                </tr>
                <tr>
                    <th scope="row">Parcheggio</th>
                    <?php foreach($hotels as $hotel) { ?>

                        <td>
                            <?php echo ($hotel['parking'] ? 'SÌ' : 'NO') ?>
                        </td>

                    <?php } ?>
                </tr>
                <tr>
                    <th scope="row">Voto</th>
                    <?php foreach($hotels as $hotel) { ?>

                        <td>
                            <?php echo $hotel['vote'] ?>
                        </td>

                    <?php } ?>
                </tr>
                <tr>
                    <th scope="row">Distanza dal centro</th>
                    <?php foreach($hotels as $hotel) { ?>

                        <td>
                            <?php echo $hotel['distance_to_center'] ?>
                        </td>

                    <?php } ?>
                </tr>
            </tbody>
    </table>

    </div>

    

</body>
</html>