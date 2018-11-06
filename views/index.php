<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <h1>Dashboard</h1>
    <form action="/" method="post">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="from">From</label>
                <input type="date" name="from" class="form-control" id="from" value="<?= $this['from']?>" placeholder="Date From">
            </div>
            <div class="form-group col-md-4">
                <label for="from">To</label>
                <input type="date" name="to" class="form-control" id="to" value="<?= $this['to']?>" placeholder="Date To">
            </div>
        </div>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </form>
    <br>
    <table class="table">
        <tr>
            <td>Orders</td>
            <td>Revenue</td>
            <td>Customers</td>
        </tr>
        <tr>
            <td><?= $this['orders'] ?></td>
            <td><?= $this['revenue'] ?></td>
            <td><?= $this['customers'] ?></td>
        </tr>
    </table>
</div>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script id="daily-stat">var stat = <?= json_encode($this['daily']) ?></script>
<script src="/script.js"></script>
</body>
</html>