<?php include('includes/header.php') ?>
<?php include('db/conection.php') ?>


<div class="display_none">


<div class="search_container">
    <form action="db/busqueda.php" method="GET">
        <input type="text" name="query" autofocus placeholder="Buscar  DNI">
        <input type="submit" value="Buscar">
    </form>
</div>

<input class="input_hiden" type="text" id="codigo" placeholder="Enfoca este input y usa el lector">

</div>
<?php include('includes/footer.php') ?>