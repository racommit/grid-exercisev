<?php
// variabel penampung nilai acak
$angka = [];

function random()
{
    global $angka;
    // variabel menampung nilai random rand(1,100)
    global $acak;

    if (sizeof($angka) == 0) {
        array_push($angka, $acak);
    } else if (!in_array($acak, $angka)) {
        array_push($angka, $acak);
    } else {
        // Jika angka sudah ada dalam array, lakukan sesuatu (opsional)
        // Misalnya, Anda bisa melakukan pengulangan untuk mendapatkan angka baru.
        $acak = rand(1, 100);
        random();
    }
}

if (sizeof($angka) >= 0) {
    for ($k = 1; $k <= 100; $k++) {
        $hasil = 0;
        $acak = rand(1, 100);
        random();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HI, GRID</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="https://github.com/racommit/grid-exercisev/blob/main/api/img/icon.png" type="image/x-icon">
    <style>
        body {
            position: relative;
            background-color: #EBE3D5;
            text-align: center;
        }

        .daftar {
            /* width:100%; */
            border-bottom: 1px solid grey;
            padding: 50px 20px;
        }

        input {
            border: none;
            padding: 2px 10px;
        }

        table {
            margin: 50px auto;
        }

        td {
            width: 20px;
            text-align: center;
        }

        button,
        #tombol {
            padding: 10px 30px;
            background-color: blue;
            outline: none;
            border-radius: 10px;
            color: white;
            border: none;
            box-shadow: 2px 1px 2px 2px grey;
            display: block;
            margin-bottom: 100px;
        }

        button:active,
        #tombol:active {
            box-shadow: none;
        }

        h1,
        #mundur {
            text-align: center;
            display: block;
            margin: 10px auto;
        }

        #kelas1 {
            margin-top: 20px;
            padding: 20px;
            outline: nona;
        }

        form {
            margin-top: 10px;
        }

        form input {
            /* text-align: center; */
            padding: 10px 10px;
            margin: 10px;
        }

        form label {
            text-align: left;
        }

        .catatan {
            margin: 10px 50px 5px 50px;
            /* padding:30px 30px 5px 30px; */
            color: black;
            text-align: center;
        }
        th,td {
                padding: 10px;
                /* Set your desired padding value */
                /* border: 1px solid #ddd; */
                /* text-align: left; */
            }
         .penjelasan {
            margin: 10px;
            margin-bottom: 50px;
            display:block;
            text-align: justify;
        }

        .judul{
            text-align: left;
        }
        .judul h3{
            margin-bottom: 1px;
        }  
        /* Tambahkan styling responsif menggunakan media query */
        @media (max-width: 600px) {


            th, td {
                padding: 5px;
                /* Set your desired padding value */
                /* border: 1px solid #ddd; */
                /* text-align: left; */
            }



            /* Tambahkan styling tambahan sesuai kebutuhan */
        }
    </style>
</head>

<body>


   <div class="judul">
<h3>CONCENTRATION GRID EXERCISE</h3>
        V1.8.7
        <hr>
</div>        
    <!-- form biodata -->
    <div class="daftar" id="daftar">
        
        <form id="biodata">
            <input type="text" id="nama1" placeholder="Nama Lengkap"><br>

            <input type="radio" id="gender1" value="Wanita" name="gender">Wanita
            <input type="radio" id="gender2" value="Pria" name="gender">Pria <br>

            <select id="kelas1" style="margin-bottom:30px;">
                <option value="1 Elektronika A">1 Elektronika A</option>
                <option value="1 Elektronika B">1 Elektronika B</option>
                <option value="2 Elektronika A">2 Elektronika A</option>
                <option value="2 Elektronika B">2 Elektronika B</option>
                <option value="3 Elektronika">3 Elektronika</option>
            </select><br>

            <label for="sarapan">Apakah kamu sudah sarapan pagi ini?</label><br>
            <input type="radio"id="sudah" value="Sudah"  name="sarapan">Sudah
            <input type="radio"id="belum" value="Belum" name="sarapan" style="margin-bottom:30px;">Belum <br>

            <label for="kos">Apakah kamu tinggal di Kost</label><br>
            <input type="radio"id="ya" value="ya"  name="kos">ya
            <input type="radio"id="tidak" value="tidak" name="kos" style="margin-bottom:50px;">tidak <br>

            
        </form>

        <div class="penjelasan">
            Aturan main: <br>
                Kamu diberi waktu selama 1 menit (60 detik), untuk klik angka dari 1-100 secara urut pada tabel, setiap angka yang benar dan salah akan dihitung beserta kecepatan klik yang kamu lakukan, data hasil akan ditampilkan kemudian lakukan klik tombol kirim.
        </div>

        <span id="tombol" onclick="mulai()">MULAI</span>
    </div>
    <!-- form biodata -->


    <!-- tabel grid test -->

    <table border="1px" cellpadding="10" cellspacing="0">
        <h1>waktu anda</h1>
        <span id="mundur"></span>
        <?php for ($i = 1; $i <= 10; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= 10; $j++) {
                $index = ($i - 1) * 10 + $j - 1;
                echo "<td onclick=\"tangkapnilai(this,$angka[$index])\">$angka[$index]</td>";
            }

            echo '</tr>';
        }
        ?>
    </table>
    <!-- table grid test -->



    <!-- form hasil -->
    <form name="submit-to-google-sheet" id="hasil">
        <label for="nama">Nama player:</label><br>
        <input name="nama" type="text" placeholder="nama" required><br>

        <label for="gender">Gender:</label><br>
        <input name="gender" type="text" placeholder="gender" required id="gender"><br>

        <label for="kelas">Kelas:</label><br>
        <input name="kelas" type="text" placeholder="kelas" required><br>
       
        <label for="kos">Anak kos</label><br>
        <input name="kos" type="text" placeholder="Anak kos" required id="hasilkos"><br>

        <label for="gender">Kondisi sarapan:</label><br>
        <input name="sarapan" type="text" placeholder="sarapan" required id="sarapan"><br>

        <label for="nama">Jumlah Benar:</label><br>
        <input name="jumlah_benar" type="text" placeholder="jumlah_benar" required><br>

        <label for="nama">Jumlah Salah:</label><br>
        <input name="jumlah_salah" type="text" placeholder="jumlah_salah" required><br>

        <label for="nama">Angka terakhir kamu:</label><br>
        <input name="angka_terakhir" type="text" placeholder="angka_terakhir" required><br>

        <label for="nama">Perolehan klik tercepat:</label><br>
        <input name="cepat" type="text" placeholder="klik_tercepat" required><br>

        <div class="catatan">

        </div>

        <span id="tombol" onclick="reset()">RESET</span>
        <button type="submit" id="id">KIRIM</button>
    </form>
    <!-- form hasil -->




    <?php
    echo "<script>
        
        var benar = 0;
        var salah = 0;
        </script>"
    ?>

    <script>
        document.querySelector("table").style.visibility = "hidden";
        document.querySelector("h1").style.visibility = "hidden";
        document.querySelector("#mundur").style.visibility = "hidden";


        // variabel menampung waktu mundur
        var mundur;
        document.querySelector("#hasil").style.display = "none";

        // variabel menampung isi biodata
        var nama;
        var gender;
        var kelas;
        var sarapan;
        var kos;


        mulai = () => {
            var radioButtons = document.getElementsByName("gender");
            // Mengecek apakah setidaknya satu radio button terpilih
            var isAnyChecked = Array.from(radioButtons).some(radio => radio.checked);

            var radioButtons2 = document.getElementsByName("sarapan");
            // Mengecek apakah setidaknya satu radio button terpilih
            var isAnyChecked2 = Array.from(radioButtons2).some(radio => radio.checked);

            var radioButtons3 = document.getElementsByName("kos");
            // Mengecek apakah setidaknya satu radio button terpilih
            var isAnyChecked3 = Array.from(radioButtons3).some(radio => radio.checked);

            if (document.querySelector("#nama1").value == "" || !isAnyChecked || document.querySelector("#kelas1").value == "" || !isAnyChecked2) {
                alert("isi biodata dengan benar");
                return false;
            }
            document.querySelector("table").style.visibility = "visible";
            document.querySelector("h1").style.visibility = "visible";
            document.querySelector("#mundur").style.visibility = "visible";
            document.querySelector("#biodata").style.display = "none";
            document.querySelector("#tombol").style.display = "none";
            nama = document.querySelector("#nama1").value;
            gender = document.querySelector("input[name='gender']:checked").value;
            kelas = document.querySelector("#kelas1").value;
            sarapan = document.querySelector("input[name='sarapan']:checked").value;
            kos = document.querySelector("input[name='kos']:checked").value;
            
            hitungMundur();
        }

        mundur = 60; // 1 menit
        document.getElementById("mundur").innerHTML = "anda memiliki waktu " + mundur + " detik";


        var nilaiDiTangkap = null;
        var nilaiDiTangkapAkhir = null;
        var waktuKlikSebelumnya = null;
        var waktuAwal = null;
        var selisihWaktu;
        var selisihWaktuCepat = 0;
        var selisihBaru;

        // fungsi permainan
        function tangkapnilai(elem, nilai) {

            nilaiDiTangkap = nilai;
            var waktuSekarang = new Date().getTime();
            console.log(nilaiDiTangkap, nilaiDiTangkapAkhir);


            if (nilaiDiTangkap == 1 && waktuAwal == null) {

                benar = 1;
               
                waktuAwal = new Date().getTime();
                nilaiDiTangkapAkhir = nilaiDiTangkap;
                elem.style.backgroundColor = "rgba(0,0,0,0.4)";
                elem.style.color = "rgba(255,255,255,0.5)";
                console.log(nilaiDiTangkap + 'benar');
                if (waktuKlikSebelumnya !== null) {
                    selisihWaktu = waktuSekarang - waktuKlikSebelumnya;
                    console.log("Selisih waktu antara klik sebelumnya dan sekarang1: " + (selisihWaktu / 1000) + " detik");

                    selisihWaktuCepat = selisihWaktu;
                }
            } else if (nilaiDiTangkap < 1 || (nilaiDiTangkap - nilaiDiTangkapAkhir) == 1 && mundur > 0) {
                benar++;
                nilaiDiTangkapAkhir = nilaiDiTangkap;
                elem.style.backgroundColor = "rgba(0,0,0,0.4)";
                elem.style.color = "rgba(255,255,255,0.5)";
                console.log(nilaiDiTangkap + 'benar');
                if (waktuKlikSebelumnya !== null) {
                    selisihWaktu = waktuSekarang - waktuKlikSebelumnya;
                    console.log("Selisih waktu antara klik sebelumnya dan sekarang2: " + (selisihWaktu / 1000) + " detik");
                    selisihBaru = selisihWaktu;

                    if (selisihBaru < selisihWaktuCepat || selisihWaktuCepat == 0) {
                        selisihWaktuCepat = selisihWaktu / 1000;
                        console.log("waktu tercepat saat ini " + selisihWaktuCepat)
                    }
                }

                waktuKlikSebelumnya = waktuSekarang;
            } else if ((nilaiDiTangkap - nilaiDiTangkapAkhir) > 1 && mundur > 0) {
                salah++;
                elem.style.backgroundColor = "red";
                setTimeout(function() {
                    elem.style.backgroundColor = "";
                }, 2000);
                console.log(nilaiDiTangkap + 'salah');
            }
            if (mundur == 0) {

                document.getElementsByTagName("tr").disabled = true;
            }
        }

        reset = () => {
            // console.log("reset berfungsi");
            nilaiDiTangkapAkhir = null;
            waktuSekarang = null;
            waktuKlikSebelumnya = null;
            waktuAwal = null;
            mundur = 60;
            // for (var i = 0; i < data.length; i++) {
            //     data[i].style.backgroundColor = "";
            //     data[i].style.color = "black";
            //     data[i].onclick = function() {
            //         tangkapnilai(this, parseInt(this.innerHTML));
            //     };
            // }
            salah = 0;
            benar = 0;
            location.reload(true);
            window.location.replace(window.location.href);
        }

        hitungMundur = () => {
            document.getElementById("mundur").innerHTML = "anda memiliki waktu " + mundur;

            var hitungInterval = setInterval(function() {
                if (mundur > 0) {
                    mundur--;
                    document.getElementById("mundur").innerHTML = ("waktu anda tersisa " + mundur + " detik");
                } else {
                    console.log("jumlah nilai yang benar " + benar);
                    console.log("jumlah nilai yang salah " + salah);
                    console.log("terakhir nilai benar " + nilaiDiTangkapAkhir);
                    clearInterval(hitungInterval);
                    document.getElementById("mundur").innerHTML = "SELESAI!";
                    document.querySelector("input[name='nama']").value = nama;
                    document.querySelector("input[id='gender']").value = gender;
                    document.querySelector("input[name='kelas']").value = kelas;
                    document.querySelector("input[id='hasilkos']").value = kos;
                    document.querySelector("input[id='sarapan']").value = sarapan;
                    document.querySelector("input[name='jumlah_benar']").value = benar;
                    document.querySelector("input[name='jumlah_salah']").value = salah;
                    document.querySelector("input[name='angka_terakhir']").value = nilaiDiTangkapAkhir;
                    document.querySelector("input[name='cepat']").value = selisihWaktuCepat + " detik";
                    document.querySelector("input[name='nama']").readOnly = true;
                    document.querySelector("input[id='gender']").readOnly = true;
                    document.querySelector("input[name='kelas']").readOnly = true;
                    document.querySelector("input[id='hasilkos']").readOnly = true;
                    document.querySelector("input[id='sarapan']").readOnly = true;
                    document.querySelector("input[name='jumlah_benar']").readOnly = true;
                    document.querySelector("input[name='jumlah_salah']").readOnly = true;
                    document.querySelector("input[name='angka_terakhir']").readOnly = true;
                    document.querySelector("input[name='cepat']").readOnly = true;
                    document.querySelector("table").style.display = "none";
                    document.querySelector("#hasil").style.display = "block";
                     document.querySelector(".penjelasan").style.display = "none";

                    if (benar < 5) {
                        document.querySelector(".catatan").innerHTML = "Konsentrasi kamu sangat kurang, Sepertinya kamu perlu sarapan dengan baik";
                    } else if (benar < 10) {
                        document.querySelector(".catatan").innerHTML = "Konsentrasi kamu kurang, Sepertinya kamu perlu sarapan dengan baik";
                    } else if (benar < 15) {
                        document.querySelector(".catatan").innerHTML = "Konsentrasi kamu cukup, Mari tingkatkan lagi";
                    } else if (benar < 20) {
                        document.querySelector(".catatan").innerHTML = "Konsentrasi kamu Baik, Pertahankan!";
                    } else if (benar > 20) {
                        document.querySelector(".catatan").innerHTML = "WOW! Konsentrasi kamu Sangat Baik, Pertahankan!";
                    } else {
                        document.querySelector(".catatan").innerHTML = "Maaf kami gagal mendeskripsikan";
                    }

                    document.getElementById('id').style.visibility = "hidden";
                    document.getElementById('id').click();

                }
            }, 1000);
        }

        const scriptURL = 'https://script.google.com/macros/s/AKfycbx1Dv0cOyL-e0Sn7496XIHB7gCsVoESQSFdNQJmFF2v2QUD-jr-99XApAEcqQj1JHuI/exec'
        const form = document.forms['submit-to-google-sheet']

        form.addEventListener('submit', e => {
            e.preventDefault()
            fetch(scriptURL, {
                    method: 'POST',
                    body: new FormData(form)
                })
                .then(response => console.log('Success!', response))
                .catch(error => console.error('Error!', error.message))
        })
    </script>


</body>

</html>
