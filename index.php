<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>

    <style>
        table, th, td{
            border: 1px solid;
        }

        table{
            width: 80%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    
<h2>Empleados</h2>

<form action="" method="post">
    <label for="campo">Buscar:</label>

    <input type="text" name="campo" id="campo">
</form>

<p></p>

<table>
    <thead>
        <th>Num. empleado</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Fecha nacimiento</th>
        <th>Fecha Ingreso</th>
        <th></th>
        <th></th>

        <tbody id="content"></tbody>
    </thead>
</table>

<script>

    getData();

    document.getElementById("campo").addEventListener("keyup", getData);

    function getData(){
        let input = document.getElementById("campo").value;
        let content = document.getElementById("content")
        let url = "load.php";
        let formaData= new FormData();
        formaData.append('campo', input)

        fetch(url, {
        method: "POST",
        body: formaData
        }).then(response => response.json())
        .then(data => {
        content.innerHTML = data
        }).catch(err => console.log(err))
        }

    

</script>

</body>
</html>