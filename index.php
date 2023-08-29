<?php include('includes/header.php') ?>
<?php include('db/conection.php') ?>


<div class="display_none">


<div class="search_container">
    <form action="db/busqueda.php" method="GET">
        <input type="text" min="1" max="8" id="dni" name="query"  required autofocus placeholder="Buscar  DNI">
        <input type="submit" value="Buscar">
    </form>
</div>

<script>
    var input=  document.getElementById('dni');
input.addEventListener('input',function(){
  if (this.value.length > 8) 
     this.value = this.value.slice(0,8); 
})
</script>
<!-- 
<input class="input_hiden" type="text" id="codigo" placeholder="Enfoca este input y usa el lector"> -->

</div>
<?php include('includes/footer.php') ?>