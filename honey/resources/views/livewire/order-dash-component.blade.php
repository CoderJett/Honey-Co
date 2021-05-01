@if(Auth::user()->user_type == 'Admin')

<div class="main">
<div class="main-content">
    <h2 class="dash-title">Manage Orders</h2>
    @if(Session::has('order_items'))
            <br>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               
               <table class="Tabmin">
                  <tr>
                     <th>{{ Session::get('order_items') }}  
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidde="true">&times;</span>
                        </button>    
                     </th>               
                  </tr>
               </table>
               
            </div>
         @endif
         
    <table class="Tabmin">
        <tr>
            <th>OR Number</th>
            <th>User Id</th>
            <th>Method</th>
            <th>Total Amount</th>
            <th>Payment Status</th>
            <th>Delivery Status</th>
            <th>Actions</th>

        </tr>
        
        @foreach ($all_in as $all)
        <tr>
            <td><a href="#" class="ORLINK" wire:click.prevent="flashOR('{{ $all->id }}')">{{ $all->or_number }}<a></td>
            <td><a href="userdash" class="ORLINK">{{ $all->user_id }}<a></td>
            <td>{{ $all->method }}</td>
            <td>₱{{ $all->total_amount }}</td>
            <td>{{ $all->payment_status }}</td>
            <td>{{ $all->delivery_status }} </td>
            <td>  
               <div class = "xActionx">
               <a href="#" wire:click.prevent="forDelivery('{{ $all->id }}')">
                  <i class="fas fa-truck"></i> For Delivery
               </a>   
               <br> 
               <a href="#" wire:click.prevent="Delivered('{{ $all->id }}')">  
                  <i class="fas fa-flag-checkered"></i> Delivered
               </a> 
               <br>
               <a href="#" wire:click.prevent="CancelOrder('{{ $all->id }}')">
                  @if(Session::has('flash_items'))
                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('flash_items') }}  
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidde="true">&times;</span>
                                 </button> 
                     </div>
                  @endif
                   <i class="fas fa-times"></i> Remove Order
               </a>   
               <div>
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