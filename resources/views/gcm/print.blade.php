<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <footer>
        <table class="footer-table">
            <tr>
                <td class="left">
                    <strong>Impresso por:</strong> {{ Auth::user()->nome }}
                    &nbsp;|&nbsp;
                    {{ now()->format('d/m/Y H:i') }}
                </td>
                <td class="right">
                    <span class="page-counter"></span>
                </td>
            </tr>
        </table>
    </footer>
</body>

</html>