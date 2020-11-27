<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <title>Hello, world!</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-danger">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://getbootstrap.com//docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30"
                    class="d-inline-block align-top" alt="">
                Bootstrap
            </a>
        </div>
    </nav>
    <section class="mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-12">
                    <h5 class="text-center">Pencarian Dosen</h5>
                </div>
                <div class="col-sm-6 my-4">
                    <form action="<?php echo base_url() ?>Welcome/check" method="post">
                        <div class="input-group mb-3">
                            <select id="js-example-basic-single" name="user" class="form-control" required>
                                <option>Pilih</option>
                                <?php foreach ($select->result() as $row): ?>
                                <option value="<?php echo $row->id_dosen; ?>"
                                    <?php if($row->id_dosen == $data_id ) { echo "selected"; } else { " "; }?>>
                                    <?php echo $row->nama_dosen; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-sm btn-primary"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="row">
                        <?php if(isset($_POST["user"])) { ?>
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table">
                                        <tr>
                                            <td>Total Sitasi</td>
                                            <td><?= $total_sitasi ?></td>
                                        </tr>
                                    </table>
                                    <table class="table">
                                        <tr>
                                            <th>Tahun</th>
                                            <th>Jumlah</th>
                                        </tr>
                                        <?php foreach($scores as $key => $score) {  ?>
                                        <tr>
                                            <td><?= trim($years[$key]->plaintext) ?></td>
                                            <td><?= trim($score->plaintext)?></td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" id="myInput" class="form-control" onkeyup="myFunction()"
                                placeholder="Pecarian Berdasarkan Judul">
                            <ul id="myUL" style="list-style-type: none;">
                                <?php foreach($data_foreach as $key => $pub) {  $links = $pub->find('a');
                                    foreach ($links as $link) {
                                        $datalink = str_replace("amp;","",$link->href);
                                } ?>
                                <li class="my-3">
                                    <a href="#" class="d-none"><?=trim($pub->find(".gsc_a_at", 0)->plaintext)?></a>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h4 class="card-title">
                                                        <?=trim($pub->find(".gsc_a_at", 0)->plaintext)?></h4>
                                                    <h5 class="card-subtitle text-muted">
                                                        <?= trim($pub->find(".gs_gray", 0)->plaintext) ?></h5>
                                                    <h6 class="text-muted">
                                                        <?= trim($pub->find(".gs_gray", 1)->plaintext)?></h6>
                                                    <p class="card-text"><?= $pub->find(".gsc_a_h", 0)->plaintext; ?>
                                                    </p>
                                                    <a href="<?= $datalink ?>" target="_blank"
                                                        class="card-link"><?=$pub->find(".gsc_a_ac", 0)->plaintext ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#js-example-basic-single').select2({
                minimumInputLength: 1,
            });
        })
    </script>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('myInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName('li');

            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>