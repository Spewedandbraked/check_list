<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
                <h1>{{ $list->title }}</h1><br><h6>{{ $list->description }}</h6>
                <table>
                    <tr>
                        <th style="width: 75%;"></th><!-- empty -->
                        @foreach ($options as $option)
                            <th>{{ $option->content }}</th>
                        @endforeach
                    </tr>
                    @foreach ($questions as $question)
                    <tr>
                        <th style="width: 75%;">{{ $question->content }}</th>
                        @foreach ($options as $option)
                            <th></th>
                        @endforeach
                    </tr>
                    @endforeach
                </table>
    
    <style>
    @font-face {
        font-family: "Dojo Sans Serif";
        font-style: normal;
        font-weight: normal;
        src: url(http://example.com/fonts/dojosans.ttf) format('truetype');
      }
      * {
        font-family: "Dojo Sans Serif", "DejaVu Sans", sans-serif;
      }
      
    td, th {
      text-align: left;
    }
    table {
        width: 100%;
        margin-bottom: 20px;
        border: 1px solid #dddddd;
        border-collapse: collapse; 
    }
    th {
        font-weight: bold;
        padding: 5px;
        background: #efefef;
        border: 1px solid #dddddd;
    }
    td {
        border: 1px solid #dddddd;
        padding: 5px;
    }
    </style>
</body>
</html>