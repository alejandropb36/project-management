<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Form</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <!-- ############################################## -->
    <div class="page-header">
        <div class="page-title">
            Agregar proyecto
        </div>
    </div>
    <div class="row">
        <div class="col-lg-11 col-md-11 col-sd-11 col-xs-11 ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Captura de proyecto</h3>
                </div>
                <div class="card-body">

                    <form action=" {{route('projects.store')}} " method="POST">
                        @csrf

                        <div class="form-group ">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="name"  placeholder="Nombre del proyecto">
                        </div>

                        <div class="form-group ">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" name="description"  placeholder="Descripción del proyecto">
                        </div>

                        <div class="form-group row">
                            <label for="start_date" class="col-4 col-form-label">Fecha de inicio</label>
                            <div class="col-8">
                                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" name="start_date">
                            </div>
 
                        </div>

                        <div class="form-group row">

                            <label for="end_date" class="col-4 col-form-label">Fecha de termino (opcional)</label>
                            <div class="col-8">
                                <input class="form-control" type="date" name="end_date">
                            </div>
                        </div>
                        
                        <button class="btn btn-primary ml-auto" type="submit">Guardar</button>
                    </form>  
                        
                </div>
            </div>
        </div>
    </div>

    <!-- ############################################## -->


</body>
</html>

