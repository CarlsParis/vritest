
<?php include('includes/header.php') ?>
<?php include('db/conection.php') ?>
<div class="d-flex justify-conter-center align-items-center" style="min-height: 100vh;">

    <div class="container">
        <div class="search_container px-5">
            <div class="container px-5">
                <h3 class="text-center">Alumnos Premiados</h3>
                <br>
                <div class="container px-5">
                    <div class="container px-5">
                        <form class="row g-3" action="db/busqueda.php" method="GET">
                            <input class="form-control" type="text" min="1" max="8" id="dni" name="query" required autofocus placeholder="Buscar  DNI">
                            <input class="btn btn-primary" type="submit" value="Buscar">
                        </form>
                        <div class="img-center">
                        <img src="assets/media/vracad_preview.png" alt="" class="img-fluid">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    var input = document.getElementById('dni');
    input.addEventListener('input', function() {
        if (this.value.length > 8)
            this.value = this.value.slice(0, 8);
    })
</script>
<!-- 


<?php include('includes/footer.php') ?>