<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        $parking_filter = ($_GET['if_parking'] ?? 'off');
        $min_vote = intval($_GET['min_vote']); 

        $filtered_hotels = [];
        foreach($hotels as $hotel){
            if($hotel['vote'] >= $min_vote){
                $filtered_hotels[] = $hotel;
            }
        }
        if($parking_filter == 'on'){
            foreach($filtered_hotels as $i => $hotel){
                if(!$hotel['parking']){
                    array_splice($filtered_hotels, $i, 1);
                }
            }
        }
    ?>

    <div class="container">

        <h1 class="text-center">HOTEL HOMEPAGE</h1>

        <form class="d-flex align-items-center justify-content-start gap-3 mb-4" action="./index.php" method="get">
            <div>
                <label for="if_parking">FILTRA PER PARCHEGGIO</label>
                <input type="checkbox" id="if_parking" name="if_parking" <?php echo ($parking_filter == 'on' ? 'checked' : '') ?>>
            </div>
            <div>
                <label for="min_vote">VOTO MINIMO:</label>
                <select name="min_vote" id="min_vote">
                    <?php 
                        for($i = 1; $i<=5; $i++){
                            echo "<option value='$i'" . ($min_vote == $i ? 'selected' : '') . ">$i</option>";
                        }
                    ?>
                    
                </select>
            </div>    
            <button class="btn btn-outline-primary" type="submit">AGGIORNA</button>

        </form>
        
        <?php if(count($filtered_hotels) != 0) { ?>
            <table class="table text-center">
                <thead>
                    <tr class="table-info">
                        <th scope="col">HOTEL</th>
                        <?php foreach ($filtered_hotels as $hotel) { ?>
                            <th scope="col">
                                <?php echo $hotel['name']; ?>
                            </th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="table-info" scope="row">Descrizione</th>
                        <?php foreach ($filtered_hotels as $hotel) { ?>
                            <td>
                                <?php echo $hotel['description']; ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th class="table-info" scope="row">Parcheggio</th>
                        <?php foreach ($filtered_hotels as $hotel) { ?>
                            <td>
                                <?php echo ($hotel['parking'] ? 'SÌ' : 'NO'); ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th class="table-info" scope="row">Voto</th>
                        <?php foreach ($filtered_hotels as $hotel) { ?>
                            <td>
                                <?php echo $hotel['vote'] ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th class="table-info" scope="row">Distanza dal centro</th>
                        <?php foreach ($filtered_hotels as $hotel) { ?>
                            <td>
                                <?php echo $hotel['distance_to_center'] ?>
                            </td>
                        <?php } ?>
                    </tr>
                </tbody>
        </table>
    <?php }else{ ?>
        <h2>NESSUN HOTEL TROVATO</h2>
    <?php } ?>

    </div>

    

</body>
</html>