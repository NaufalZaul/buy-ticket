<?php

    $destinations = [
        [
            "bus" => "Harapan Jaya",
            "destination"=> "solo"
        ],
        [
            "bus" => "Sumber Kencana",
            "destination"=> "jakarta"
        ],
        [
            "bus" => "Sumber Rejeki",
            "destination"=> "surabaya"
        ]
    ];

    $sitCode = ["A1B1","C1D1","A2B2","C2D2","A3B3","C3D3","A4B4","C4D4","A5B5","C5D5" ];

    function timeUP(){
        echo "berakhir pada tanggal " .date("Y-m-d h:i:s A");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>buy.id</title>

    <script src="https://kit.fontawesome.com/676d1da154.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="header-top">
        <form action="./index.php" method="POST">
            <button type="submit">
                <i class="fas fa-home"></i>
            </button>
        </form>
        <h1 class="header-booking">Pesan Tiket</h1>
    </div>

    <div class="top">
        <div class="image-top">
            <img src="./image/pexels-quang-nguyen-vinh-2178175.jpg" alt="">
        </div>
        <!-- PEMESANAN -->
        <div class="form-top">
            <form action="" method="post" class="booking">
                <!-- <label for="id">id :</label> -->
                <input type="hidden" name="id" id="id">

                <label for="name">Nama :</label>
                <input type="text" name="name" id="name" placeholder="Nama" autofocus required>

                <label for="bus">Jenis :</label>
                <input type="text" name="bus" id="bus" placeholder="Travel, Bus, Taksi" required>
                
                <label for="destination">Tujuan :</label>
                <input type="text" name="destination" id="destination" placeholder="Madiun" required>
                
                <label for="date">Tanggal :</label>
                <input type="date" name="date" id="date" required>
                
                <label for="time">Waktu :</label>
                <input type="time" name="time" id="time" required>
                                
                <button type="submit" name="accept">Pesan</button>
            </form>
        </div>
    </div>


    <!-- CETAK TIKET -->
    <?php if( isset($_POST["accept"]) ) : ?>
        <h1 class="print-header">Silahkan Cetak Tiket Dibawah Ini.</h1>
        <p class="attention">*Segera cetak kartu sebelum <?= timeUP()?></p>
        <div class="ticket">
            <main class="top-ticket">
                <div class="top-header">
                <i class="fas fa-shuttle-van"></i>
                </div>
                <div class="top-body">    
                    <p> <span>Penumpang:</span> <?= $_POST["name"]; ?> </p> 
                    <p> <span>Tanggal :</span> <?= $_POST["date"]; ?> </p>
                    <p> <span>Waktu :</span> <?= $_POST["time"]; ?> </p> 
                    <p> <span>Tujuan :</span> <?= $_POST["destination"]; ?> </p>   
                </div>
            </main>
            <main class="bottom-ticket">
                <div class="main-left">
                    <h2>ID Penumpang</h2>
                    <h1> <?= $_POST["id"]; ?> 123123</h1>
                </div>
                <div class="main-right">
                <?php for($a = 0; $a < 3; $a++) : ?>
                    <?php if(strtolower( $_POST["destination"] ) === $destinations[$a]["destination"]) : ?>
                        <p>
                            <span>Bus :</span> <?= $destinations[$a]["bus"]; ?>
                        </p>    
                    <?php endif;?>
                <?php endfor; ?>
                    <p> <span>Tempat duduk :</span> <?= $sitCode[$a]; ?> </p>  
                </div>
            </main>

        </div>
        <?php echo "
                <script>
                        alert('Silahkan cetak tiket dibawah!');
                </script>
                " 
        ?>
    <?php endif;?> 
</body>

</html>