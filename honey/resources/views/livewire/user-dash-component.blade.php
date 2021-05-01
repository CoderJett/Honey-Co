@if(Auth::user()->user_type == 'Admin')

<div class="main">
<div class="main-content">
    <h2 class="dash-title">Manage Users</h2>
    <table class="Tabmin">
    <tr>
        <th>User Id </th>
        <th>Customer Name</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Zip code</th>
        <th>Delete</th>
            

    </tr>
        
    @foreach ($users as $user )
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->address }}, {{ $user->city }}</td>
        <td>{{ $user->zipcode }}</td>
        <td>                        
            <a href="#" wire:click.prevent="delete('{{ $user->id }}')">
                <i class="fa fa fa-trash-alt" ></i> Delete
            </a>   
        </td>
    </tr>
    @endforeach



       

</table>
</div>
</div>

@else

<head>
    <meta charset="utf-8">
    <title>Error</title>
    
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    </head>
 
    <body>
    <div class="main">
    <div class="error-content">
        <h1 class="error-title">
            <i class = "fas fa-info-circle"></i>
            Cannot securely connect to this page
        </h1>
    
        <p class="error-msg">You are unauthorized to access this page.  <br>
            It is not safe for you to be here please go back. <br><br>
        Try this: 
        </p>
        <li class="link"><a href="dashboard">Go back to the homepage</a></li>
        
        
    </div>
    </div>
    
    
    
    
    </body>


@endif