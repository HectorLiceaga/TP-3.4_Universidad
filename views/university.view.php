<?php

class UniversityView
{

    private function encabezado()
    {
        $html = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <base href="' . BASE_URL . '">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <title>Universidad Theta</title>
        </head>
        <body >
    
        <nav class="navbar navbar-expand-lg navbar navbar-ligth  mb-3" style="background-color: #A9DFBF">
            <a class="navbar-brand" href=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index">Principal <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                    <a class="nav-link" href="add">Agregar <span class="sr-only">(current)</span></a>
                </ul>
            </div>
            </nav>
            <h2>Bienvenido a la Universidad THETA</h2>';
        return $html;
    }

    public function showCareer($career)
    {
        echo $this->encabezado();
        echo '<div class="container">';
        echo '<table class="table table-striped mt-3">
                     <thead class="thead-dark">
                        <tr>
                        <th scope="col">Carrera</th>
                        <th scope="col">Años</th>
                        <th scope="col">Materias</th>
                        </tr>
                    </thead>
                    <tbody>';
        foreach ($career as $carrera) {
            echo '<tr><td>' . $carrera->nombre . '</td><td>' . $carrera->cant_anios . '</td><td><a href="subject/' . $carrera->id_carrera . '">Ver</a></td>
                        </tr>';
        }
        echo '</table>  
                    <div class="container">
                        <h4>Carreras con duración menor a 3 años</h4>
                        <a href="minor3">Ver</a>
            </body>
        </html>';
    }
    public function showSubjects($subject, $career)
    {
        echo $this->encabezado();

        echo '<div class="container">';
        echo '<h3>' . $career->nombre . '</h3>';
        echo '<table class="table table-striped mt-3">
                 <thead class="thead-dark">
                    <tr>
                    <th scope="col">Materia</th>
                    <th scope="col">Profesor</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($subject as $materia) {
            echo '<tr><td>' . $materia->materia . '</td><td>' . $materia->profesor . '</td>
                    </tr>';
        }
        echo '</table>    
        </body>
    </html>';
    }

    public function showCareer3($career3)
    {
        var_dump($career3);
        echo $this->encabezado();
        echo '<div class="container">';
        echo '<h3>' . $career3->carrera . '</h3>';   
        echo '<table class="table table-striped mt-3">
        <thead class="thead-dark">
           <tr>
           <th scope="col">Materia</th>
           <th scope="col">Profesor</th>
           </tr>
       </thead>
       <tbody>';
foreach ($career3 as $materia) {
   echo '<tr><td>' . $materia->materia . '</td><td>' . $materia->profesor . '</td>
           </tr>';
}
echo '</table>
        </body>
    </html>';
    }
}
