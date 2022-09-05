<!DOCTYPE html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<html>

<style>
    body {
        background-color:#D04B2D;
      }
</style>

<body>

<h1 class="text-center ">PrestaRock</h1>
    <div class="container ">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                    <thead>
                    </thead>
                    <tbody>
                        @foreach($partitionedData as $groupIndex => $values)
                            <tr>
                                <th scope="row">Group {{ $groupIndex + 1 }}</th>
                                    @foreach (range(0, $maximumColumnCount) as $index)
                                        <td>{{ $values[$index] ?? '' }}</td>
                        @endforeach

                                <td>Sum: {{ array_sum($values) }}</td>
                            </tr>
                        @endforeach
                     </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>