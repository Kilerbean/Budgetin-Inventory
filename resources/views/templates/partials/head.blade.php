<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
<title>Dashboard - Tabler - .</title>
<!-- CSS files -->
<link href="{{ asset('dist/css/tabler.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet"/>
<link href="{{ asset('dist/css/demo.min.css?1684106062') }}" rel="stylesheet"/>
<style>
  @import url('https://rsms.me/inter/inter.css');
  :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
  }
  body {
      font-feature-settings: "cv03", "cv04", "cv11";
  }
</style><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<style>
  .custom-hr {
    border: none;
    border-top: 2px solid #770101;
    margin: 10px 0;
  }
</style>

<style>
  hr.red-line {
      border: none;
      border-top: 2px solid red;
  }
</style>
<style>
  .table-container {
      display: flex;
      flex-direction: row;
  }

  .table-column {
      flex: 1;
      padding: 10px;
  }

  table {
      border-collapse: collapse;
      width: 100%;
 
  }

  th, td {
 
      padding: 8px;
      text-align: left;
  }

  th {
      background-color: lightgrey;
  }
</style>


{{-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> --}}



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-Eo2Oh7p7GfgKDwphQC3jYjIYLjzgcv3CzH3cFyVRK2f5XGNsY43y5HJwprX0wDmk" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.6.1/js/dataTables.colReorder.min.js"></script>
    <script type="text/javascript">
        $(function() {
            var table = $('#listlow,#listlowss').DataTable({
                
            });
        });
        
    </script>