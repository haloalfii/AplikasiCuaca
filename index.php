<!DOCTYPE html>
<html lang="en">

<?php
include "head.php";
?>

<body id="page-top">
    <!-- Navigation-->
    <?php
    include "sidebar.php";
    ?>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Weather
                    <span class="text-primary">Apps</span>
                </h1>
                <div class="subheading mb-5">
                    Simple Apps By Alfian Luthfi
                    <a href="https://github.com/haloalfii">https://github.com/haloalfii</a>
                </div>
                <div class="social-icons">
                    <a class="social-icon" href="https://www.instagram.com/haloalfii/?hl=en"><i class="fab fa-instagram"></i></a>
                    <a class="social-icon" href="https://twitter.com/haloalfii"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="cuaca">
            <div class="resume-section-content">
                <div class="container p-3 my-3 text-center">
                    <div class="alert alert-primary" role="alert" id="sc"></div>
                    <h2>Input kan nama <span class="text-primary">kota</span> anda</h2>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="weather" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <button type="submit" class="btn btn-primary" type="button" id="send">Kirim</button>
                    </div>

                    <p id="location" class="display-4"></p>
                    <p id="temp" class="display-4"></p>
                    <img height="200" />
                    <h3></h3>
                    <p>
                        <span id="min"></span><span id="max"></span>
                    <div class="alert alert-danger" role="alert" id="sd"></div>
                    </p>
                </div>

            </div>
        </section>
        <hr class="m-0" />
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    api = 'https://api.openweathermap.org/data/2.5/';
    key = 'c0bb134f4f5de9db1fa5355e31ad892c';

    $(document).ready(function() {
        $("#sd").text("Data Kosong");
        $("#sd").show();
        $("#sc").hide();
        $("#send").click(function() {
            let weather = $("#weather").val();
            $.ajax({
                url: api + 'weather?q=' + weather + '&appid=' + key + '&units=metric',
                success: function(res) {
                    // console.log(JSON.stringify(res));
                    let temp = res.main.temp;

                    $('#location').html(weather);
                    $('#temp').html(res.main.temp + '&deg;C');
                    $('#min').html(res.main.temp_min + '&deg;C <strong>Min</strong>');
                    $('#max').html(res.main.temp_max + '&deg;C <strong>Max</strong>');
                    let icon = res.weather[0].icon;
                    $('img').attr('src', 'http://openweathermap.org/img/wn/' + icon + '@2x.png');
                    $('h3').text(res.weather[0].main + ' - ' + res.weather[0].description);

                    $("#sc").text("Cuaca: " + weather + " Berhasil ditemukan");
                    $("#sc").show();

                    $("#sd").hide();
                },
                error: function() {
                    $("#sc").text("Cuaca: " + weather + " Tidak Berhasil ditemukan");
                    $("#sc").show();
                }
            });
        });
    });
</script>