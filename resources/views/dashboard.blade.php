<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Corona Counts</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">        
    </head>
    <body>
        <div>
		<?php //print_r($cases);?>
		Total Number of Cases in Last month: </br>
		Total Number of Cases in Last Week: </br>
		Total Number of Cases in Last day: </br>
        </div>
		<table border = "1">
			<tr>
				<td>Id</td>
				<td>Total Affected</td>
				<td>Total Death</td>
				<td>Total Recovered</td>
			</tr>
			@foreach ($cases as $case)
				<tr>
					<td>{{ $case->id }}</td>
					<td>{{ $case->affected }}</td>
					<td>{{ $case->death }}</td>
					<td>{{ $case->recovered }}</td>
				</tr>
			@endforeach
		</table>
    </body>
</html>
